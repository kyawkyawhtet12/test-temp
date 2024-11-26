<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function(){
    if(windows_os()){
        echo "This is window machine";
    }else{
        echo "This is not";
    }
});
