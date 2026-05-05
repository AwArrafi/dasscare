<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/petunjuk', function () {
    return view('test.petunjuk');
});

Route::get('/tes/{step}', [TestController::class, 'index']);
Route::post('/tes/{step}', [TestController::class, 'submit'])->name('tes.submit');
