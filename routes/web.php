<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/packages', function () {
    return view('packages');
})->name('packages');

Route::get('/about-us', function () {
    return view('about');
})->name('about');

Route::get('/login', function () {
    return view('login');
})->name('auth.login');

Route::get('/set-locale/{lang}', function ($lang) {
    if (!in_array($lang, ['en', 'id'])) {
        abort(400);
    }

    session(['locale' => $lang]);
    app()->setLocale($lang);

    return redirect()->back();
})->name('set.locale');


