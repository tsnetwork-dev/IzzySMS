<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/',['as'=>'site.home', function () {
    return view('site.home');
}]);
*/

Route::get('/admin/login',['as'=>'admin.login', function(){
    return view('admin.login.index');
}]);


Route::group(['prefix'=>'api'],function(){

    Route::group(['prefix'=>'envio'],function(){
        
       Route::get('',['uses'=>'Api\SmsController@index']);
       Route::get('{fone}/{mensagem}/{obs}',['uses' => 'Api\SmsController@enviar']);
    });
});

Route::group(['prefix'=>'homologa'],function(){
    Route::group(['prefix'=>'chipeira'], function(){
        Route::get('',['uses'=>'Admin\CampanhaController@consultaChipeira']);
    });
});






Route::middleware(['auth'])->group(function(){

    //ROTAS PARA ACESSO PRINCIPAL
        /*
        Route::get('/',['as'=>'admin.principal', function(){
            return view('admin.principal.index');
        }]);*/

        Route::get('/',[
            'as'=>'admin.principal', 
            'uses'=>'Admin\PrincipalController@index'
        ]);


        Route::get('/admin/login/sair',[
            'as'=>'admin.login.sair',
            'uses'=>'Admin\UsuarioController@login'
            ]);


        //ROTAS PARA ACESSO AOS USUÁRIOS

        Route::get('/admin/usuarios',[
            'as'=>'admin.usuarios',
            'uses'=>'Admin\UsuarioController@index'
            ]);

        Route::get('/admin/usuarios/adicionar',[
            'as'=>'admin.usuarios.adicionar',
            'uses'=>'Admin\UsuarioController@adicionar'
            ]);
        Route::post('/admin/usuarios/salvar',[
            'as'=>'admin.usuarios.salvar',
            'uses'=>'Admin\UsuarioController@salvar'
            ]);

        Route::get('/admin/usuarios/editar/{id}',[
            'as'=>'admin.usuarios.editar',
            'uses'=>'Admin\UsuarioController@editar'
            ]);

        Route::put('/admin/usuarios/atualizar/{id}',[
            'as'=>'admin.usuarios.atualizar',
            'uses'=>'Admin\UsuarioController@atualizar'
            ]);



            //ROTAS DE MENSAGENS

            Route::get('/admin/posts',[
                'as'=>'admin.posts',
                'uses'=>'Admin\PostsController@index'
                ]);

            Route::get('/admin/posts/nova',[
                'as'=>'admin.posts.nova',
                'uses'=>'Admin\PostsController@nova'
                ]);
            Route::post('/admin/posts/enviar',[
                'as'=>'admin.posts.enviar',
                'uses'=>'Admin\PostsController@enviar'
                ]);



            //ROTAS DE CREDORES

            Route::get('/admin/credor',[
                'as'=>'admin.credor',
                'uses'=>'Admin\CredorController@index'
                ]);

            Route::get('/admin/credor/novo',[
                'as'=>'admin.credor.novo',
                'uses'=>'Admin\CredorController@novo'
                ]);
            Route::post('/admin/credor/salvar',[
                'as'=>'admin.credor.salvar',
                'uses'=>'Admin\CredorController@salvar'
                ]);
            Route::post('/admin/credor/localizar',[
                'as'=>'admin.credor.localizar',
                'uses'=>'Admin\CredorController@localizar'
                ]);


            // ROTA CAMPANHAS

            Route::get('/admin/campanha',[
                'as'=>'admin.campanha',
                'uses'=>'Admin\CampanhaController@index'
                ]);

            Route::get('/admin/campanha/nova',[
                'as'=>'admin.campanha.nova',
                'uses'=>'Admin\CampanhaController@nova'
                ]);

            Route::get('/admin/campanha/envio/{id}',[
                'as'=>'admin.campanha.envio',
                'uses'=>'Admin\CampanhaController@envio'
                ]);

            Route::get('/admin/campanha/enviar/{id}',[
                'as'=>'admin.campanha.enviar',
                'uses'=>'Admin\CampanhaController@enviar'
                ]);

            Route::post('/admin/campanha/salvar',[
                'as'=>'admin.campanha.salvar',
                'uses'=>'Admin\CampanhaController@salvar'
                ]);

            //ROTAS PARA CADASTRO DAS CHIPEIRAS

            Route::get('/admin/chipeiras',[
                'as'=>'admin.chipeira',
                'uses'=>'Admin\ChipeiraController@index'
                ]);
            Route::get('/admin/chipeira/adicionar',[
                'as'=>'admin.chipeira.adicionar',
                'uses'=>'Admin\ChipeiraController@adicionar'
                ]);
            Route::post('/admin/chipeira/salvar',[
                'as'=>'admin.chipeira.salvar',
                'uses'=>'Admin\ChipeiraController@salvar'
                ]);
            Route::get('/admin/chipeira/editar/{id}',[
                'as'=>'admin.chipeira.editar',
                'uses'=>'Admin\ChipeiraController@editar'
                ]);
            Route::put('/admin/chipeira/atualizar/{id}',[
                'as'=>'admin.chipeira.atualizar',
                'uses'=>'Admin\ChipeiraController@atualizar'
                ]);

                //ROTAS PARA CADASTRO DE CHIPS
            Route::get('/admin/chip/{id}',[
                'as'=>'admin.chip',
                'uses'=>'Admin\ChipController@index'
                ]);
            Route::get('/admin/chip/adicionar/{id}',[
                'as'=>'admin.chip.adicionar',
                'uses'=>'Admin\ChipController@adicionar'
                ]);

            Route::get('/admin/chip/habilitar/{id}',[
                'as'=>'admin.chip.habilitar',
                'uses'=>'Admin\ChipController@habilitar'
                ]);

            Route::post('/admin/chip/salvar/{id}',[
                'as'=>'admin.chip.salvar',
                'uses'=>'Admin\ChipController@salvar'
                ]);
            Route::get('/admin/chip/editar/{id}',[
                'as'=>'admin.chip.editar',
                'uses'=>'Admin\ChipController@editar'
                ]);
            Route::put('/admin/chip/atualizar/{id}',[
                'as'=>'admin.chip.atualizar',
                'uses'=>'Admin\ChipController@atualizar'
                ]);






    });






Route::post('/admin/login',['as'=>'admin.login','uses'=>'Admin\UsuarioController@login']);


