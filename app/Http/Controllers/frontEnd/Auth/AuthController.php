<?php

namespace App\Http\Controllers\frontEnd\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\LoginRequest;
use App\Http\Requests\Front\RegistrationRequest;
use App\Models\CompanyInfo;
use App\Models\User;
use Artisan;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                    'message' => trans('auth.login_in'),
                    'success' => true,
                    'is_login' => true
                ]);
            } else {
                return response()->json([
                    'error' => trans('auth.invalid_email_password'),
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
        DB::beginTransaction();
        try {
            $getDeletedUser = User::withTrashed()->where('username', $request->get('username'))->first();

            if ($getDeletedUser) {
                $getDeletedUser->restore();
            } else {
                $user = $this->create(data: $request->all());

                if ($user->sign_up_for === 'company') {
                    $companyInfo = new CompanyInfo();
                    $companyInfo->user_id = $user->id;
                    $companyInfo->company_type = $request->get("company_type");
                    $companyInfo->company_name = $request->get("company_name");
                    $companyInfo->save();
                }
            }

            DB::commit();
            return response()->json([
                'message' => trans('auth.registration_completed'),
                'success' => true,
            ]);
        }catch (\Exception $exception){
            DB::rollBack();
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
//            'email' => $data['email'],
            'state_id' => $data['state_id'],
            'city_id' => $data['city_id'],
            'phone_number' => $data['phone_number'],
            'sign_up_for' => $data['account_type'],
//            'place_of_birth' => $data['place_of_birth'],
//            'date_of_birth' => $data['date_of_birth'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
