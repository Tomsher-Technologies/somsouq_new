<?php

namespace App\Http\Requests\Front;

use App\Rules\AlphaSpaces;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
{
    protected $inputType;
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
        return [
            'email'    => 'required_without:username|email|string|exists:users,email',
            'username' => ['required_without:email','exists:users,username', new AlphaSpaces],
            'password' => 'required|string|min:6',
        ];
    }

    /**
     *
     * authenticate user by email or username
     * @return bool
     */
    public function authenticate(): bool
    {
       return Auth::attempt($this->only($this->inputType,'password'));
    }

    /**
     * find out email and username
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->inputType = filter_var($this->input('input_type'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $this->merge([$this->inputType => $this->input('input_type')]);
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
            'error' => $validator->errors()->toArray(),
        ]));
    }
}
