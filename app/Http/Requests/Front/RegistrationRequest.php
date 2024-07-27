<?php

namespace App\Http\Requests\Front;

use App\Rules\AlphaSpaces;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'username' => ['required', 'unique:users,username,NULL,id,deleted_at,NULL', new AlphaSpaces],
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
//            'email' => 'email|unique:users,email,NULL,id,deleted_at,NULL|string|nullable',
            'phone_number' => 'required',
            'account_type' => 'required',
        ];

        if ($this->request->get('sign_up_for') === 'company') {
            $rules['company_type'] = 'required';
            $rules['company_name'] = 'required';
            $rules['company_registration_number'] = 'required';
        }

        return $rules;
    }

    /**
     * Override the function
     * @param Validator $validator
     * @return mixed
     */
    public function failedValidation(Validator $validator): mixed
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors()->toArray(),
        ]));
    }
}
