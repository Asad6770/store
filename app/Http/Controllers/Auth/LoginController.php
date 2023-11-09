<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'user_name' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('user_name' => $input['user_name'], 'password' => $input['password'])))
        {
            if (auth()->user()->roles == 'admin') {
                return redirect()->route('admin.home');
            }else if (auth()->user()->roles == 'superadmin') {
                return redirect()->route('superadmin.home');
            }else{
                return redirect()->route('home');
            }
        }else{
            return view('auth.login')
                ->with('error','User Name And Password Are Wrong.');
        }

    }
}
