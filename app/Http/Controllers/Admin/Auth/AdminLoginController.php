<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Constants\Message;
use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\AdminPasswordChangeRequest;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * class AdminLoginController
 */
class AdminLoginController extends BaseController
{
    use AuthenticatesUsers;

    protected string $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    public function showLoginForm(): View
    {
        return view('admin.auth.login');
    }

    public function login(Request $request): View|RedirectResponse
    {
        if (auth('admin')->attempt($request->only(['email', 'password']))) {
            return to_route('admin.dashboard');
        }

        return back()->with('error', 'Email or Password Invalid');
    }

    public function changePassword(): View
    {
        return view('admin.auth.change-password');
    }

    public function updatePassword(AdminPasswordChangeRequest $request): JsonResponse|RedirectResponse
    {
        try {
            if (! Hash::check(data_get($request->all(), 'current_password'), currentUser()->password)) {
                return back()->with('error', Message::ADMIN_MESSAGE['PASSWORD_NOT_MATCH']);
            }

            currentUser()->update([
                'password' => data_get($request->all(), 'new_password'),
                'remember_token' => Str::random(60),
            ]);

            Auth::logoutOtherDevices(data_get($request->all(), 'new_password'));

            return back()->with('success', Message::ADMIN_MESSAGE['PASSWORD_CHANGE']);
        } catch (Exception $error) {
            return back()->with('error', $error->getMessage());
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        auth('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('admin.showLoginForm');
    }
}
