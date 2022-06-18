<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new user session if the login is valid.
     *
     * @param  LoginRequest $request
     * 
     * @return Illuminate\Http\RedirectResponse
     */

    public function login(LoginRequest $request): RedirectResponse
    {
        $route_login = redirect()->route('login');

        if (auth()->attempt($request->validated() + ['status' => 1])) return redirect()->route('dashboard.home');

        return $route_login->with('error', 'Email dan Password salah atau Akun anda telah dinonaktifkan');
    }
}
