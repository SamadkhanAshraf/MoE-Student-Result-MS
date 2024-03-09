<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|string|unique:users,email',
            'username' => 'required|unique:users,username',
            'phone' => 'nullable|unique:users,phone',
            'position' => 'nullable|string|min:2',
            'userType' => 'required',
            'userService'=>'required',
            'profileImage' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024',
            'coverImage' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024',
            'address' => 'nullable|string|min:3',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            // 'role' => 'required',
        ];
    }
}
