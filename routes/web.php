<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('ai-agent/talk', [AIController::class, 'talkAgent']);
Route::get('ai-agent/video', [AIController::class, 'videoTrans']);
