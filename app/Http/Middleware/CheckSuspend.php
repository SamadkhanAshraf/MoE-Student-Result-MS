<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSuspend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next) {
        // dd(auth()->check());
        if(\Auth::check() && (\Auth::user()->status == 0)){
            \Auth::logout();
            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login.show')->with('error', __('msg.Your Account is suspended, please contact the administrator'));

        }

        return $next($request);
    }
}
