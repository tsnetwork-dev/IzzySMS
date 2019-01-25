<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Credor;


class CredorController extends Controller
{
    public function index()
    {
        $credores = Credor::orderBy('cd_credor','desc')->paginate(10);
        return view('admin.credor.index',compact('credores'));
    }

    public function novo()
    {
        return view('admin.credor.nova');
    }

    public function salvar(Request $request)
    {
        $credor = new Credor();

        $credor->cd_credor = $request['cd_credor'];
        $credor->ds_credor = $request['ds_credor'];
        $credor->save;

        return redirect()->route('admin.credor');
    }

    public function localizar(Request $request)
    {
        $carteira = $request['credor'];

        if(isEmpty($carteira))
        {
            $credores = Credor::orderBy('cd_credor','desc')->paginate(10);
            return view('admin.credor.index',compact('credores'));
        }else{
            $credores = DB::table('credores')
                         ->where('ds_credor','like','%'.$carteira.'%')
                         ->orWhere('ds_credor','like','%'.$carteira.'%')
                         ->get();
        return view('admin.credor.index',compact('credores'));
        }


    }
}
