<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return Inertia::render('Login.vue');
});

Route::get('/register', function () {
    return Inertia::render('Register.vue');
});

Route::get('/login', function () {
    return Inertia::render('Login.vue');
});

Route::get('/home', function () {
    return Inertia::render('Home.vue');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
});