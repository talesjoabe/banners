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

// Página Inicial
Route::get('/', 'BannerController@home');

// Banners
Route::resource('banners', 'BannerController');

//Banners Itens
Route::get('banners/itens/{banner}', 'BannerItensController@createForm');
Route::post('banners/itens/{banner}', 'BannerItensController@createItem');
Route::get('ativar/{banner}', 'BannerController@ativar');
Route::delete('delete/bannerItem/{bannerItens}', 'BannerItensController@deleteBannerItem');