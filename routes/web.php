<?php

use App\Http\Controllers\PersonalController;
use App\Http\Controllers\UserController;
use App\Models\Personal;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){
    $data = Personal::index();
    return response()->json($data);
});
