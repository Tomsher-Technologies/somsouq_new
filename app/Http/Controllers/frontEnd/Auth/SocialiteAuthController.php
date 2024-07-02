<?php

namespace App\Http\Controllers\frontEnd\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Artisan;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
                Auth::login($findUser);
                return redirect()->route('home');
            }else{
                Auth::login($this->create(data: $getUser, provider: $provider));
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

    public function logout(Request $request)
    {
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       $request->session()->flush();

        return redirect()->route('home');
    }
}
