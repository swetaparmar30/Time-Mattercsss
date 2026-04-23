<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // set false if you want restrict access
    }

    public function rules(): array
    {
        return [
            'first_name'   => ['required', 'string', 'max:255'],
            'last_name'    => ['required', 'string', 'max:255'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone'        => ['required', 'string', 'max:20', 'unique:users,phone'],
            'name'         => ['required', 'string', 'max:255'],
            'role'         => ['required', 'string', 'in:independent-contractor,temporary-employee,vendor'],
            'password'     => ['required', 'confirmed', Password::defaults()],
            'termsAccepted'=> ['accepted'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Please enter your first name.',
            'last_name.required'  => 'Please enter your last name.',
            'name.required'       => 'Please enter your Company name.',
            'email.required'      => 'Please enter your email address.',
            'email.email'         => 'Please enter a valid email address.',
            'email.unique'        => 'This email is already registered.',
            'phone.required'      => 'Please enter your phone number.',
            'phone.unique'        => 'This phone number is already registered.',
            'role.required'       => 'Please select your role.',
            'role.in'             => 'Please select a valid role.',
            'password.required'   => 'Please enter your password.',
            'password.confirmed'  => 'Your password confirmation does not match.',
            'termsAccepted.accepted' => 'Please accept terms and conditions.',
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => 'first name',
            'last_name'  => 'last name',
            'email'      => 'email address',
            'phone'      => 'phone number',
            'role'       => 'role',
        ];
    }
}