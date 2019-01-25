<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Campanha;
use App\Credor;
use App\Arquivo;
use App\Telefone;
use App\Posts;
use App\Chipeira;
use App\Chip;

class CampanhaController extends Controller
{

    public function index()
    {
        $campanhas = Campanha::orderBy('Data','desc')->paginate(10);
        return view('admin.campanha.index',compact('campanhas'));
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

        $this->index();

    }

    public function envio($id)
    {
       
        $campanha = Campanha::find($id);
        $telefones = DB::table('telefones')->where('campanha_id',$id)->get();


        return view('admin.campanha.envio', compact('campanha','telefones'));

    }

    public function enviar($id)
    {
        $telefones = DB::select('select * from public.telefones where campanha_id = ?',[$id]);
        $campanha = Campanha::find($id);


        foreach ($telefones as $telefone){
            //$arrtxt= $telefone->mensagem;
            $mensagem = new Posts();
            $texto = trim($telefone->mensagem);

            $msg = "";
            $fone = $telefone->telefone;

            $data="{\n\t\"text\":\"$texto\",\n\t\"param\":\n\t[\n\t\t{\n\t\t\t\"number\":\"$fone\",\n\t\t\t\"text_param\":[\"$msg\"],\n\t\t\t\"user_id\":1\n\t\t\t\n\t\t}\n\n\t]
            \n\t\n}";

            $curl = curl_init();
            curl_setopt($curl,CURLOPT_URL,"http://192.168.1.31/api/send_sms");
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
            curl_setopt($curl,CURLOPT_ENCODING,"");
            curl_setopt($curl,CURLOPT_MAXREDIRS,10);
            curl_setopt($curl,CURLOPT_TIMEOUT,30);
            curl_setopt($curl,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
            curl_setopt($curl,CURLOPT_CUSTOMREQUEST,"POST");
            curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
            curl_setopt($curl,CURLOPT_HTTPHEADER,array(
            "authorization: Basic YWRtaW46YWRtaW4=",
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: 22ae4f31-d957-1529-7c5a-dcca04bc693b"
            ));

            $response = json_decode(curl_exec($curl),true);
            $err = curl_error($curl);

            curl_close($curl);

            $codigo = $response['error_code'];


            $mensagem->destino = $fone;
            $mensagem->mensagem = $texto;
            $mensagem->enviado = Now();
            $mensagem->status ="Ok";
            $mensagem->campanha_id = $id;

            $mensagem->save();

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
