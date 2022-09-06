<?php

use App\Http\Controllers\Api\RepositoryController;
use Illuminate\Support\Facades\Route;

Route::post('/repositories/{org}', [RepositoryController::class, 'store']);
