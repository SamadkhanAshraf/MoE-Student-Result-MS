<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        // Let's get the route param by name to get the User object value
        $user = request()->route('user');

        return [
            'name' => 'required',
            'email' => 'required|email|string|unique:users,email,'.$user->id,
            'username' => 'required|unique:users,username,'.$user->id,
            'phone' => 'nullable|unique:users,phone,'.$user->id,
            'position' => 'nullable|string|min:2',
            'userType' => 'required',
            'userService'=>'required',
            'profileImage' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024',
            'coverImage' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:1024',
            'address' => 'nullable|string|min:3',
            'password' => 'nullable|min:8',
            'password_confirmation' => 'nullable|same:password',
            'role' => 'required',
        ];

        // return [
        //     'name' => 'required',
        //     'email' => 'required|email:rfc,dns|unique:users,email,'.$user->id,
        //     'username' => 'required|unique:users,username,'.$user->id,
        //     'role' => 'required'
        // ];
    }
}
