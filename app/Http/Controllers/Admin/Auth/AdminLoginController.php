<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Auth;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_HOME;

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
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

     /**
     * Show the login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login',[
            'title' => 'Admin Login',
            'loginRoute' => 'admin.login',
            'forgotPasswordRoute' => 'admin.password.request',
        ]);
    }

    private function validator(Request $request)
    {

        //validation rules.
        $rules = [
            'email'    => 'required|email|exists:admins|min:6|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'email.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }

    private function loginFailed(){
        return redirect()
            ->back()
            ->withInput()
            ->with('status', 'These credentials do not match our records.');
    }

    public function login(Request $request)
    {
//        dd(11);
        $this->validator($request);

        if($this->guard()->attempt($request->only('email','password'),$request->filled('remember'))){
            //Authentication passed...
            $user = $this->guard()->user();

            if($user->user_type == "admin" || $user->user_type == "staff"){
                return redirect()->route('admin.dashboard');
            }else{
                $this->guard()->logout();

//                $request->session()->invalidate();

//                $request->session()->regenerateToken();
                return back()->with('status', 'Permission Denied!');
            }

        }

        //Authentication failed...
        return $this->loginFailed();
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

//        $request->session()->invalidate();

//        $request->session()->regenerateToken();

        return redirect()
            ->route('admin.login')
            ->with('status','Admin has been logged out!');
    }

}
