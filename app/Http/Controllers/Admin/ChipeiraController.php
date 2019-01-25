<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Chipeira;

class ChipeiraController extends Controller
{
    public function index()
    {
        $chipeiras = Chipeira::orderBy('id','asc')->paginate(10);
        
        return view('admin.chipeira.index',compact('chipeiras'));
    }

    public function adicionar()
    {
        return view('admin.chipeira.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $chipeira = new Chipeira();

        $chipeira->Modelo = $dados['model'];
        $chipeira->ip = $dados['ip'];
        $chipeira->Serial=$dados['serial'];
        $chipeira->Portas=$dados['portas'];

        $chipeira->save();

        \Session::flash('chipeira',[
            'msg'=>'Chipeira Cadastrada com Sucesso !!!',
            'class'=>'green white-text',
            ]);

        return redirect()->route('admin.chipeira');

    }

    public function editar($id)
    {
        $chipeira = Chipeira::find($id);

        return view('admin.chipeira.editar', compact('chipeira'));
    }

    public function atualizar(Request $request,$id)
    {
        $chipeira = Chipeira::find($id);
        $dados = $request->all();

        //$chipeira->Modelo = $dados['model'];
        //$chipeira->ip = $dados['ip'];
        //$chipeira->Serial=$dados['serial'];
        //$chipeira->Portas=$dados['portas'];


        $chipeira->update($dados);
        \Session::flash('mensagem',[
        'msg'=>'Usuário Atualizado com Sucesso !!!',
        'class'=>'blue white-text',
        ]);

        return redirect()->route('admin.chipeira');

    }
}
