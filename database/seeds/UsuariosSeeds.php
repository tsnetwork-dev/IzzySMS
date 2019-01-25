<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuariosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();

        $usuario->name = "MCA Tecnologia";
        $usuario->email = "desenvolvimento@blbpo.com.br";
        $usuario->password = bcrypt("@@blbpo2019");
        $usuario->save();

    }
}
