<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Support\Facades\DB;

class PrincipalController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')
                            ->select(DB::raw('count(*) as mensagens'),DB::raw('DATE(enviado) as data'))
                            ->groupBy('data')
                            ->orderBy('data','asc')
                            ->get();
        
        $lava = new Lavacharts;

        $mensagens = $lava->DataTable();

        $mensagens->addStringColumn('Dia')
                   ->addNumberColumn('Mensagens Diárias');
                   
                   foreach($posts as $post) {
                    $dia = date('d-M',strtotime($post->data));
                    $msg = $post->mensagens;

                    $mensagens->addRow([$dia, $msg]);
                       
                   }
                   

        $lava->AreaChart('Diario', $mensagens, [
            'title' => 'Mensagens por dia',
            'legend' => [
                'position' => 'in'
            ],
            'is3D'   => true
        ]);

        return view('admin.principal.index',compact('lava'));


    }
}
