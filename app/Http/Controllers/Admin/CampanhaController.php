<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Khill\Lavacharts\Lavacharts;
use App\Campanha;
use App\Credor;
use App\Arquivo;
use App\Telefone;
use App\Posts;
use App\Chipeira;
use App\Chip;
use App\Jobs\SendSmsJob;

class CampanhaController extends Controller
{

    public function index()
    {
        $campanhas = DB::table('campanhas')
                    ->select('campanhas.id','campanhas.Data','campanhas.cd_credor','campanhas.nome_campanha','campanhas.dt_envio',DB::raw('count(telefones.campanha_id) as Total'))
                    ->leftJoin('telefones','campanhas.id','=','telefones.campanha_id')
                    ->groupBy('telefones.campanha_id','campanhas.id')
                    ->orderBy('campanhas.Data','desc')
                    ->paginate(10);
        return view('admin.campanha.index',compact('campanhas'));
    }

    public function campanha($id)
    {

        $mensagens = DB::table('posts')
                        ->where('campanha_id',$id)
                        ->count();

        $telefones = DB::table('telefones')
                        ->where('campanha_id',$id)
                        ->paginate(36);

        $entregues = DB::table('posts')
                        ->wherein('status',array('Ok','DELIVERED'))
                        ->where('campanha_id',$id)
                        ->count();

        $erro = DB::table('posts')
                        ->wherein('status',array('FALIED','ERRO','400'))
                        ->where('campanha_id',$id)
                        ->count();

        $lava = new Lavacharts;

       $grafico = $lava->DataTable();

       $grafico->addStringColumn('Detalhes da Campanha')
                ->addNumberColumn('Enviadas')
                ->addNumberColumn('Erros')
               ->addNumberColumn('Entregues')
               ->addRow(['Mensagens',$mensagens,$erro,$entregues]);

        $lava->ColumnChart('Campanha', $grafico, [
            'title' => 'Detalhes da Campanha',
            'legend' => [
                'position' => 'top'
            ],
            'bar'=>[
                'color'=>'silver'
            ],
            'is3D'   => true
        ]);

        return view ('admin.campanha.campanha',compact('lava','telefones'))->with('id',$id);
    }

    public function status($id)
    {
     $campanha = Campanha::find($id);
     $telefones = DB::table('telefones')
                    ->select('posts.destino', 'posts.campanha_id',DB::raw('count(posts.destino) as Total '))
                    ->leftJoin('posts','telefones.telefone','=','posts.destino')
                    ->where('posts.campanha_id',$id)
                    ->where('telefones.campanha_id',$id)
                    ->groupBy('posts.destino','posts.campanha_id')
                    ->paginate(20);

    return view('admin.campanha.status', compact('campanha','telefones'));

    }

    public function detalhe($fone,$campanha)
    {
        $telefones = DB::table('posts')
                          ->where('destino',$fone)
                          ->where('campanha_id',$campanha)
                          ->paginate(20);

        return view('admin.campanha.detalhes',compact('telefones'));
    }

    public function detalheErro($fone,$campanha)
    {
        $telefones = DB::table('posts')
                          ->where('destino',$fone)
                          ->where('campanha_id',$campanha)
                          ->where('status','FAILED')
                          ->orwhere('status','ERRO')
                          ->orwhere('status','400')
                          ->paginate(20);
        return view('admin.campanha.detalhes',compact('telefones'));
    }

    public function detalheEntregue($fone,$campanha)
    {
        $telefones = DB::table('posts')
                          ->where('destino',$fone)
                          ->where('campanha_id',$campanha)
                          ->where('status','DELIVERED')
                          ->orwhere('status','OK')
                          ->paginate(20);

        return view('admin.campanha.detalhes',compact('telefones'));
    }

    public function nova()
    {
        $credores= Credor::all();
        $campanha= Campanha::all();

        return view('admin.campanha.nova', compact('credores'));
    }



    public function salvar(Request $request)
    {

        $dados = $request->all();
        $campanha= new Campanha;
        $arquivo = new Arquivo;

        //Dados para salvar campanha

        $campanha->Data = Now();
        $campanha->cd_credor = $dados['cd_credor'];
        $campanha->nome_campanha = $dados['campanha'];

        //Dados do arquivo

        $name =date('d-m-y');
        $path = 'campanhas'.DIRECTORY_SEPARATOR.$name;

        $arquivo->pasta = $path;

        $campanha->save();

        //SALVAR TELEFONES NA CAMPANHA;

        if(!is_dir($path)){
            mkdir($path,0755,true);
        }

        $file = $request->file('arquivo');
        if($file){
            $ext = $file->guessClientExtension();
            $filename= $name.'_'.$campanha->nome_campanha.'.'.$ext;
            $file->move($path,$filename);
            $arquivo->campanha_id = $campanha->id;
            $arquivo->nome_arquivo = $name;
        }


        $telefones = file($path.'/'.$filename);

        //Salvar Dados dos Telefones
        foreach ($telefones as $key=>$telefone) {
            $fonedados = explode(";",$telefone);

            $Fone = new Telefone;
            $Fone->campanha_id = $campanha->id;
            $Fone->telefone = $fonedados[0];
            $Fone->mensagem = $fonedados[1];

            if(empty($fonedados[2])){
                $fonedados[2]= NULL;
            }

            if(empty($fonedados[3])){
                $fonedados[3]= NULL;
            }
            $Fone->cpf_cnpj = $fonedados[2];
            $Fone->cd_devedor = $fonedados[3];
            $Fone->obs = $fonedados[4];


            $Fone->save();



        }

        return redirect()->route('admin.campanha');

    }

    public function envio($id)
    {

        $campanha = Campanha::find($id);
        $telefones = DB::table('telefones')->where('campanha_id',$id)->paginate(20);
        $total = json_decode(DB::table('telefones')
                    ->select(DB::raw('count(campanha_id) as total'))
                    ->where('campanha_id',$id)
                    ->get());

        $totais = $total[0];

        return view('admin.campanha.envio', compact('campanha','telefones','totais'));

    }

    public function enviar($id)
    {
        $telefones = DB::select('select * from public.telefones where campanha_id = ?',[$id]);
        $campanha = Campanha::find($id);


        foreach ($telefones as $telefone){

            $mensagem = new Posts();
            $CountChipeira = DB::table('chipeiras')->Count();
            $Equipamento =rand(0,$CountChipeira);
            $chipeira = Chipeira::Find($Equipamento);

            //$ip = trim($chipeira->ip);
            $texto = trim($telefone->mensagem);
            $porta = rand(0,31);

            $msg = "";
            $fone = $telefone->telefone;

            $mensagem->destino = $fone;
            $mensagem->mensagem = $texto;
            $mensagem->enviado = Now();
            $mensagem->status ="Ok";
            $mensagem->campanha_id = $id;
            $mensagem->chipeira = $Equipamento;
            $mensagem->porta = $porta;

            $mensagem->save();
        }
            $enviados = DB::table('posts')
                            ->where('campanha_id',$id)
                            ->where('chipeira','<>',Null)
                            ->where('porta','<>',Null)
                            ->get();

            foreach ($enviados as $enviado) {
                $Dados = Posts::find($enviado->id);
                $fone = $enviado->destino;
                $texto = $enviado->mensagem;
                $chipeira = DB::table('chipeiras')->select('ip')->where('id',$enviado->chipeira)->get();
                $ip = substr(json_encode($chipeira),8,12);
                $porta= $enviado->porta;
                $msg_id = $enviado->id;


                //echo $fone." - ".$texto." - ".$ip." - ".$porta." - ".$msg_id."<br>";

                $job = new SendSmsJob($fone,$texto,$ip,$porta,$enviado->chipeira,$msg_id);
                $retorno = $this->dispatch($job);


            }

            $campanha->dt_envio = Now();

            $campanha->update();


        \Session::flash('campanhas',[
            'msg'=>'Envio de SMS por campanha está sendo processado, aguarde a conclusão !!!',
            'class'=>'blue white-text',
            ]);

        return redirect()->route('admin.campanha.envio',$id);


    }

    public function consultaChipeira()
    {
        $chipeira =  DB::table('posts')
                                ->join('chipeiras','posts.chipeira','=','chipeiras.id')
                                ->select(DB::raw('count (posts.chipeira) as MSG'),'chipeira')
                                ->groupBy('chipeira')
                                ->orderBy('msg','asc')
                                ->get();

        $resultado = $chipeira;

        foreach ($resultado as $value) {
            echo"<pre>";
            print_r($value->msg);
        }


    }




}
