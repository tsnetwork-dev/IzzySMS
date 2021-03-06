<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mensage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\SendSmsJob;
class MensagemController extends Controller
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public function index()
    {

        $mensagem = Mensage::all();
        return view('admin.mensagem.index',compact('mensagem'));


    }

    public function nova()
    {
        return view('admin.mensagem.nova');
    }

    public function enviar(Request $request)
    {

        $dados = $request->all();

        $mensagem = new Mensage();

        //Dados recebidos do Formulários

        $mensagem->destino = $dados['destino'];
        $mensagem->mensagem = $dados['mensagem'];
        $mensagem->enviado = Now();

        //Dados para envio do SMS

        $telefone = $mensagem->destino;
        $texto = $mensagem->mensagem;


        //Comunicando com o Equipamento.

        $nome="";

        $curl = curl_init();


        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://192.168.1.30/api/send_sms",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\t\"text\":\"$texto\",\n\t\"param\":\n\t[\n\t\t{\n\t\t\t\"number\":\"$telefone\",\n\t\t\t\"text_param\":[\"$nome\"],\n\t\t\t\"user_id\":1\n\t\t\t\n\t\t}\n\n\t]\n\t\n}",
            CURLOPT_HTTPHEADER => array(
            "authorization: Basic YWRtaW46YWRtaW4=",
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: 22ae4f31-d957-1529-7c5a-dcca04bc693b"
            ),
        ));

        $this->dispatch(new SendSmsJob($curl));


        /**
        $response = json_decode(curl_exec($curl),true);
        $err = curl_error($curl);

        curl_close($curl);

        $codigo = $response['error_code'];

        if ($err) {
            $mensagem->status = "cURL Error #:" . $err;
          } else {
              if($codigo === 200 ||$codigo === 202){
                $mensagem->status ="Ok";

              }else{
                  $mensagem->status = (string)$codigo;
              }
          }


        $mensagem->save();

        \Session::flash('mensagem',[
            'msg'=>'SMS enviado com Sucesso !!!',
            'class'=>'green white-text',
            ]);**/

        return redirect()->route('admin.mensagem');

    }
}
