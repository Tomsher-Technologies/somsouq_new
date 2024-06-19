<?php

namespace App\Http\Controllers\frontEnd\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\LoginRequest;
use App\Http\Requests\Front\RegistrationRequest;
use App\Models\User;
use Artisan;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

final class AuthController extends Controller
{

    /**
     * User login with username or email address
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function loginWithEmail(LoginRequest $request)
    {
        try {
            if ($request->authenticate()){
                return response()->json([
                    'message' => 'Your are logged in successfully',
                    'success' => true,
                    'is_login' => true
                ]);
            } else {
                return response()->json([
                    'error' => 'Invalid email and password!',
                    'success' => true,
                    'is_login' => false
                ]);
            }
        }catch (\Exception $exception){
            return response()->json([
                'error' => $exception->getMessage(),
                'success' => true,
                'is_login' => false
            ]);
        }
    }

    /**
     * Store user functionality
     *
     * @param RegistrationRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registration(RegistrationRequest $request)
    {
        try {
            $this->create(data: $request->all());

            return response()->json([
                'message' => 'Registration successfully completed',
                'success' => true,
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'error' => $exception->getMessage(),
                'success' => false,
            ]);
        }
    }

    /**
     * Create user here
     *
     * @param array $data
     * @return mixed
     */
    protected function create(array $data): mixed
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'state_id' => $data['state_id'],
            'city_id' => $data['city_id'],
            'phone_number' => $data['phone_number'],
            'place_of_birth' => $data['place_of_birth'],
            'date_of_birth' => $data['date_of_birth'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
