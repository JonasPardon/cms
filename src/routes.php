<?php

use Illuminate\Support\Facades\Route;
use JonasPardon\Cms\Http\Controllers\ApiController;

Route::group(['prefix' => 'api'], function () {
   Route::get('/{entity}/{definer?}', [ApiController::class, 'get']);
});
