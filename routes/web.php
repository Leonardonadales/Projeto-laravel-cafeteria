<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view(view:'site.home');
}) ->name('site.home');


Route::get('/bebidas', function () {
    return view(view:'site.bebidas');
})  ->name('site.bebidas');;



Route::get('/salgados', function () {
    return view(view:'site.salgados');
})  ->name('site.salgados');;


Route::get('/cafes', function () {
    return view('site.Cafes');
}) ->name('site.Cafes');

Route::get('/meuspedidos', function () {
    return view(view: 'site.meuspedidos');
})  ->name('site.meuspedidos');


