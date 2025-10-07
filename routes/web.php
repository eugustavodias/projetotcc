<?php

use App\Http\Controllers\CultosController;
use App\Http\Controllers\EstudosController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\FinanceiroController;
use App\Http\Controllers\MembrosController;
use App\Http\Controllers\MidiasController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::prefix('ibbb')->group(function () {
    Route::prefix('')->controller(HomeController::class)->as('log.')->group(function(){
        Route::get('membroslogin', 'login')->name('in');
        Route::get('logout', 'logout')->name('out');
        Route::post('authentication', 'authentication')->name('auth');
        Route::any('recuperar_senha', 'recuperar_senha')->name('recuperar_senha');
        Route::put('update_password/{user}', 'update_password')->name('update_password');
    });

    Route::get('/', function () {
        return view('inicial');
    })->name('ibbb');

    Route::get('/sobre', function () {
        return view('sobre');
    })->name('sobre');

    Route::controller(MembrosController::class)->as('membros.')->group(function(){
        Route::get('/listamembros', 'index')->name('index');
        Route::get('/cadastromembro', 'create')->name('create');
        Route::get('/fichamembroadm/{user}', 'edit')->name('edit');
        Route::get('/meusdados', 'meusdados')->name('meusdados');
        Route::get('/membrosdestroy/{user}', 'destroy')->name('destroy');
        Route::get('consulta_cep/{cep?}', "consulta_cep")->name('consulta_cep');
        Route::post('/membrosstore', 'store')->name('store');
        Route::put('/membrosupdate/{user}', 'update')->name('update');
    });

    Route::prefix('/cultos')->controller(CultosController::class)->as('cultos.')->group(function(){
        Route::get('/index', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{culto}', 'update')->name('update');
        Route::delete('/delete/{culto}', 'delete')->name('delete');
    });

    Route::prefix('/eventos')->controller(EventosController::class)->as('eventos.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::put('update/{evento}', 'update')->name('update');
        Route::post('store', 'store')->name('store');
        Route::delete('delete/{evento}', 'delete')->name('delete');
    });

    Route::prefix('/midias')->controller(MidiasController::class)->as('midias.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/{tipo_anexo}', 'index_by_type')->name('index_by_type');
        Route::post('store/{tipo_anexo}', 'store')->name('store');
        Route::put('update/{midia}', 'update')->name('update');
        Route::delete('delete/{midia}', 'delete')->name('delete');
    });

    Route::get('/materiais', function () {
        return view('materiais');
    });

    Route::prefix('/estudos')->controller(EstudosController::class)->as('estudos.')->group(function(){
        Route::get('/index', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{estudo}', 'update')->name('update');
        Route::delete('/delete/{estudo}', 'delete')->name('delete');
    });

    Route::prefix('/financeiro')->controller(FinanceiroController::class)->as('financeiros.')->group(function(){
        Route::get('/index', 'index')->name('index');
        Route::get('/download/{financeiro}', 'download')->name('download');
        Route::post('/store', 'store')->name('store');
        Route::delete('/delete/{financeiro}', 'delete')->name('delete');
    });

    Route::prefix('painel')->as('painel.')->group(function(){
        Route::get('/adm', function () {
            return view('paineladm');
        })->name('admin');
    
        Route::get('/membro', function () {
            return view('painelmembro');
        })->name('membro');
    });
});

