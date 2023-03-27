<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request){
        //return $request;

        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);
        //return $credentials;
        if(Auth::attempt($credentials, $request->boolean('remember'))) {
            // login success
            $request->session()->regenerate();
            return redirect()->intended()->with('status', 'You are logged In!');
        }
        // login fail
        throw ValidationException::withMessages([
            'email' => __('auth_failed')
        ]);
    }
    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('status', 'You are logged out!');
    }
}
