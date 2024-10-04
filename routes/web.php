<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index'] );

Route::get('/events/create', [EventController::class, 'create'] );

Route::get('/events/{id}', [EventController::class, 'show'] ); // rota que vai direcionar para o controller que fará as regras de direcionamento da página
                                                               // que estará dentro da função 'show'

Route::post('/events', [EventController::class, 'store']);

Route::get('/events/contacts', [EventController::class, 'contacts'] );



