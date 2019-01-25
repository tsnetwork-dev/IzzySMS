<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        $dados = $request->all();

        $email = $dados['email'];
        $password = $dados['password'];

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            \Session::flash('mensagem',[
                'msg'=>'Login Realizado com Sucesso !!!',
                'class'=>'green white-text',
                ]);
            return redirect()->route('admin.principal');
        }
        \Session::flash('mensagem',[
            'msg'=>'Erro!!! Confira seus Dados !!!',
            'class'=>'red white-text',
            ]);
        return redirect()->route('admin.login');

    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function index(){

        $usuarios = User::all();
        return view('admin.usuarios.index',compact('usuarios'));

    }

    public function adicionar(){
        return view('admin.usuarios.adicionar');
    }

    public function salvar(Request $request){

        $dados = $request->all();

        $usuario = new User();

        $usuario->name = $dados['name'];
        $usuario->email = $dados['email'];
        $usuario->password = bcrypt($dados['password']);

        $usuario->save();

        \Session::flash('mensagem',[
            'msg'=>'Usuário Cadastrado com Sucesso !!!',
            'class'=>'green white-text',
            ]);

        return redirect()->route('admin.usuarios');

    }

    public function editar($id)
    {
        $usuario = User::find($id);

        return view('admin.usuarios.editar', compact('usuario'));

    }

    public function atualizar(Request $request,$id)
    {
        $usuario = User::find($id);
        $dados = $request->all();
        if(isset($dados['password']) && strlen($dados['password'])> 5 )
        {
            $usuario->password = bcrypt($dados['password']);
        }else{
            unset($dados['password']);
           }

           $usuario->update($dados);
           \Session::flash('mensagem',[
            'msg'=>'Usuário Atualizado com Sucesso !!!',
            'class'=>'blue white-text',
            ]);

        return redirect()->route('admin.usuarios');

    }


}
