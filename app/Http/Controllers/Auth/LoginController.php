<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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

    protected function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);

        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if ($user && in_array($user->status, [1, 3])) {
            return $this->guard()->attempt($credentials, $request->filled('remember'));
        }

        return false;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = \App\Models\User::where('email', $request->email)->first();

        if ($user && !in_array($user->status, [1, 3])) {
            throw ValidationException::withMessages([
                $this->username() => ['Your account is not approved for login.'],
            ]);
        }
    }
}
