<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Chip;
use App\Chipeira;

class ChipController extends Controller
{
    //

    public function index($id)
    {
        $chips = DB::table('chips')->where('Chipeira_id',$id)->where('Habilitado',true)->get();
        $chipeira = Chipeira::find($id);
        return view('admin.chip.index',compact('chips','chipeira'));
    }

    public function habilitar($id)
    {
        $chips = DB::table('chips')->where('Chipeira_id',$id)->where('Habilitado',false)->get();
        $chipeira = Chipeira::find($id);
        return view('admin.chip.habilitar',compact('chips','chipeira'));
    }

    public function adicionar($id)
    {
        $chips = DB::table('chips')->where('Chipeira_id',$id)->get();
        $chipeira = Chipeira::find($id);
        return view('admin.chip.adicionar',compact('chips','chipeira'));

    }

    public function editar($id)
    {

        $chip = Chip::find($id);
        return view('admin.chip.editar', compact('chip'));
    }

    public function salvar(Request $request, $id)
    {

        $dados =  $request->all();
        $chip = new Chip();
        $chipeira = $id;

        $chip->Porta = $dados['porta'];
        $chip->operadora = $dados['operadora'];
        $chip->IMEI = $dados['IMEI'];
        $chip->IMSI = $dados['IMSI'];
        $chip->diario = $dados['diario'];
        $chip->mensal = $dados['mensal'];
        $chip->Chipeira_id = $chipeira;

        $chip->save();

        \Session::flash('chip',[
            'msg'=>'Chip Cadastrado com Sucesso !!!',
            'class'=>'green white-text',
            ]);

        return redirect()->route('admin.chip',$id );



    }

    public function atualizar(Request $request,$id)
    {
        $chip = Chip::find($id);
        $dados = $request->all();

        $chip->update($dados);
        \Session::flash('mensagem',[
        'msg'=>'Chip Atualizado com Sucesso !!!',
        'class'=>'blue white-text',
        ]);

        return redirect()->route('admin.chip',$id);

    }
}
