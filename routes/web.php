<?php

use App\Livewire\Auth\Login;
use App\Livewire\Empleado\Crear;
use App\Livewire\Empleado\Edit;
use App\Livewire\Empleado\Index as EmpleadoIndex;
use App\Livewire\Empleado\Salario;
use App\Livewire\Home\Index;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::get('/login', Login::class)
    ->middleware('guest')
    ->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', Index::class)
        ->name('home');

    Route::get('/empleados', EmpleadoIndex::class)
        ->name('empleados');
    Route::get('/empleados/{id_emp}/editar', Edit::class)
        ->name('empleados.editar');
    Route::get('/empleados/{id_emp}/ver', Edit::class)
        ->name('empleados.ver');
    Route::get('/empleados/{id_emp}/salario', Salario::class)
        ->name('empleados.salario');
    Route::get('/empleados/crear', Crear::class)
        ->name('empleados.crear');

    Route::get('/areas', Index::class)
        ->name('configuracion.areas');
    
    Route::get('/beneficios', Index::class)
        ->name('configuracion.beneficios');
    
    Route::get('/modalidad', Index::class)
        ->name('configuracion.modalidad');

    Route::get('/pagos', Index::class)
        ->name('configuracion.pagos');
});
