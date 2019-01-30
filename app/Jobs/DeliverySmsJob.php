<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use App\Posts;

class DeliverySmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id_msg;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //
        $this->id_msg = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $msg_id = $this->msg_id;

        $Post = Posts::find($msg_id);

        $telefone = $Post->destino;

        $Chipeira = Posts::find($Post->chipeira);
        $porta = $Post->porta;
        $ip = $Chipeirar->ip;


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

            $Post->status = $Processamento;
            $Post->entrega = Now();
            $Post->update();
    }
}
