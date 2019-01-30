<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Posts;
use App\Enviado;
use App\Http\Controllers\Api;

class SendSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $tel;
    protected $msg;
    protected $ip;
    protected $port;
    protected $chipeira;
    protected $msg_id;
    private $response;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($fone,$mensagem,$ip,$porta,$chipeira,$msg_id)
    {
        //
        $this->tel = $fone;
        $this->msg = $mensagem;
        $this->ip = $ip;
        $this->port = $porta;
        $this->chipeira = $chipeira;
        $this->msg_id = $msg_id;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $enviado= new Enviado();
        $telefone = $this->tel;
        $texto =  $this->msg;
        $ip = $this->ip;
        $porta = $this->port;
        $nome = "";
        $chipeira = $this->chipeira;
        $msg_id = $this->msg_id;


        $curl = curl_init();


        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://".$ip."/api/send_sms",
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

        $curlRet = curl_init();

			curl_setopt_array($curlRet, array(
			  CURLOPT_URL => "http://".$ip."/api/query_sms_result",
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
				$Processamento = "ERRO";
            }else{
                $Processamento = $result->result[0]->status;
            }
            $Dados = Posts::find($msg_id);
            $Dados->obs = $Processamento;
            $Dados->entrega = Now();
            $Dados->update();


    }

    public function getResponse()
    {
        return $this->response;
    }


}
