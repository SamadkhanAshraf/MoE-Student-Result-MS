<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function perform()
    {
        Session::flush();

        Auth::logout();
        return redirect('login');
    }

    public function lockScreen(){
        \Session::put('userEmail',\Auth::user()->email);
        \Session::put('userProfileImage',\Auth::user()->profile_image);
        Auth::logout();
        return view('admin.auth.lock-screen');

    }
}
