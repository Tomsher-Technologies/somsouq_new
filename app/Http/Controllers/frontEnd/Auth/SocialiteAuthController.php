<?php

namespace App\Http\Controllers\frontEnd\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Artisan;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

final class SocialiteAuthController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectTo(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleCallback(string $provider)
    {
        try {
            $getUser = Socialite::driver($provider)->user();
            $findUser = User::where('email', $getUser->email)->first();

            if ($findUser){
                $this->guard()->login($findUser);
                return redirect()->route('home');
            }else{
                $deletedUser = User::withTrashed()->where('email', $getUser->email)->first();
                if ($deletedUser) {
                    $deletedUser->restore();
                } else {
                    $this->guard()->login($this->create(data: $getUser, provider: $provider));
                }
                return redirect()->route('home');
            }

        }catch (\Exception $exception){
            dd($exception->getMessage());
        }
    }

    /**
     * create new user
     * @param object $data
     * @return mixed
     */
    protected function create(object $data, string $provider)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'login_by' => $provider,
//            'password' => Hash::make('123456'),
        ]);
    }

//    public function logout(Request $request)
//    {
//       Auth::logout();
//       Session::forget('location');
//       $request->session()->invalidate();
//       $request->session()->regenerateToken();
//       $request->session()->flush();
//
//        return redirect()->route('home');
//    }

    public function logout(Request $request)
    {
        $locale =  Session::get('locale');
        $this->guard()->logout();

//        $request->session()->invalidate();
//        $request->session()->flush();

        return $this->loggedOut($request, $locale) ?: redirect('/');
    }

    protected function loggedOut(Request $request, $locale)
    {
        Session::put('locale',$locale);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('web');
    }
}
