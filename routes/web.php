<?php

use App\Http\Controllers\Web\RepositoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RepositoryController::class, 'index']);
