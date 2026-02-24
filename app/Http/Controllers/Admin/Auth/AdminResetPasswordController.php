<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Password;

class AdminResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected string $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    public function guard()
    {
        return Auth::guard('admin');
    }

    public function broker()
    {
        return Password::broker('admins');
    }

    public function showResetForm(Request $request)
    {

        $token = $request->route()->parameter('token');

        return view('admin.auth.reset')->with([
            'token' => $token,
            'email' => $request->email,
        ]);

    }
}
