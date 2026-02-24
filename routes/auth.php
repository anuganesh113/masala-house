<?php

use App\Http\Controllers\User\Auth\UserForgotPasswordController;
use App\Http\Controllers\User\Auth\UserLoginController;
use App\Http\Controllers\User\Auth\UserRegisterController;
use App\Http\Controllers\User\Auth\UserResetPasswordController;
use App\Http\Controllers\User\UserDashboardController;


Route::group(['as' => 'user.', 'prefix' => 'user'], function () {

    Route::group(['middleware' => ['guest']], function () {

        /********************************** Login Controller Route ********************************/
        Route::controller(UserLoginController::class)->group(function () {
            Route::get('login', 'showLoginForm')->name('showLoginForm');
            Route::post('login', 'login')->name('login');
        });

        /********************************** Login Controller Route ********************************/
        Route::controller(UserRegisterController::class)->group(function () {
            Route::get('register', 'showRegistrationForm')->name('showRegistrationForm');
            Route::post('register', 'register')->name('register');
        });

        /********************************** ForgotPassword Controller Route ********************************/
        Route::controller(UserForgotPasswordController::class)->group(function () {
            Route::get('password/reset', 'showLinkRequestForm')->name('showLinkRequestForm');
            Route::post('password/email', 'sendResetLinkEmail')->name('sendResetLinkEmail');
        });

        /********************************** ResetPassword Controller Route ********************************/
        Route::controller(UserResetPasswordController::class)->group(function () {
            Route::get('password/reset/{token}', 'showResetForm')->name('showResetForm');
            Route::post('password/reset', 'reset')->name('reset');
        });

    });

    Route::group(['middleware' => ['auth']], function () {

        /********************************** Login Controller Route ********************************/
        Route::controller(UserLoginController::class)->group(function () {
            Route::post('logout', 'logout')->name('logout');
            Route::get('change-password', 'changePassword')->name('change.password');
            Route::post('change-password', 'updatePassword')->name('update.password');
        });
    });

    //Route::group(['middleware' => 'auth'], function () {

        /********************************** User DashboardController Route ********************************/
        Route::controller(UserDashboardController::class)->group(function () {
            Route::get('dashboard', 'dashboard')->name('dashboard');
        });
    //});
});
