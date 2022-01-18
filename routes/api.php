<?php

use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    function () {
        return response()->json(
            [
                'version' => app()->version(),
            ]
        );
    }
);

Route::group(
    [
        'prefix' => 'auth'
    ],
    function () {
        Route::post('login', 'AuthController@login');
        Route::get('logout', 'AuthController@logout');
        Route::get('refresh', 'AuthController@refresh');
        Route::get('me', 'AuthController@me');
        Route::post('register', 'AuthController@register');
    }
);

Route::group(
    [
        'middleware' => 'auth:api'
    ],
    function () {
        Route::patch('user/profile', 'UserController@profile');
    }
);
