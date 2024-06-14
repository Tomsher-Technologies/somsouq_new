<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontEnd\HomeController;


Route::get('/', [HomeController::class, 'index']);
