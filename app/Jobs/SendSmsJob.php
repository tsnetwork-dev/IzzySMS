<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Posts;
use App\Http\Controllers\Api;

class SendSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //$this->disparar();

        echo "Tarefa enviada";
        
    }

    protected function disparar()
    {
        /**
        $telefone= "51985046706";
        $texto = "Teste de Job";
        
        $obs = "Teste de Job com Queue";

        $sms = new SmsController();

        //$sms->enviar($telefone,$texto,$obs);

        exit;*/

       // $sms = SmsController::teste();
        
    }
}
