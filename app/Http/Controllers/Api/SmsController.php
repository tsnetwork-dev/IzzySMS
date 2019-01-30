<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Console\Commands;

use App\Posts;
use App\Jobs;

class SmsController extends Controller
{
    public function teste()
    {
        echo "TESTE TESTE TESTE TESTE";
    }

    public function index()
    {
        SendSmsjob::dispatch();
    }

    public function lista()
    {
        $result = new SendSms();
        return $result;

    }

    public function enviar($fone,$mensagem,$obs)
    {
    	$Sms = new Posts();

        //Dados recebidos do Formulários
        $porta = rand(0,31);
        $chipeira = 2;

        $Sms->destino = $fone;
        $Sms->mensagem = $mensagem;
        $Sms->enviado = Now();
        $Sms->obs = "Mensagem enviada pelo Gestor, Usuário: ".$obs;
        $Sms->porta = $porta;
        $Sms->chipeira = $chipeira;

        //Dados para envio do SMS

        $telefone = $Sms->destino;
        $texto = $Sms->mensagem;


        //Comunicando com o Equipamento.

        $nome="";

        $curl = curl_init();


        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://192.168.1.31/api/send_sms",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n\t\"text\":\"$texto\",\n\t\"param\":\n\t[\n\t\t{\n\t\t\t\"number\":\"$telefone\",\n\t\t\t\"text_param\":[\"$nome\"],\n\t\t\t\"user_id\":1\n\t\t\t\n\t\t}\n\n\t],\n\t\"port\":[$porta]\n\t\n\t\n\t\n}",
            CURLOPT_HTTPHEADER => array(
            "authorization: Basic YWRtaW46YWRtaW4=",
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: 22ae4f31-d957-1529-7c5a-dcca04bc693b"
            ),
        ));

        $response = json_decode(curl_exec($curl),true);
        $err = curl_error($curl);

        curl_close($curl);

        $codigo = $response['error_code'];
        $time_after = date("Y-m-d H:i:s",time()-50);

        sleep(20);

        $curlRet = curl_init();

			curl_setopt_array($curlRet, array(
			  CURLOPT_URL => "http://192.168.1.31/api/query_sms_result",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "{\n\t\n\t\"number\":[\"$telefone\"],\n\t\"time_after\": \"$time_after\",\n\t\"port\":[$porta]\n\t\n}",
			  CURLOPT_HTTPHEADER => array(
			    "Authorization: Basic YWRtaW46YWRtaW4=",
			    "Content-Type: application/json",
			    "Postman-Token: 10578edf-4a73-4a97-82f8-a20f82268180",
			    "cache-control: no-cache"
			  ),
			));

			$retorno = curl_exec($curlRet);
			$errRet = curl_error($curlRet);

			curl_close($curlRet);


			$result = json_decode($retorno);

			if(Empty($result->result[0])){
				$Sms->status = "ERRO";
				$entrega =  "ERRO";
				$Sms->entrega = Now();
			}else{

				$entrega = $result->result[0]->status;
				$Sms->status =$result->result[0]->status;
				$dtentrega = $result->result[0]->time;
				$Sms->entrega = $dtentrega;
			}




        $Sms->save();


        return $entrega;




    }
}
