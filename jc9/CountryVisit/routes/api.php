<?php

use \Illuminate\Support\Facades\Route;

Route::get('visit', 'CountryVisitController@index');
Route::post('visit', 'CountryVisitController@store');
