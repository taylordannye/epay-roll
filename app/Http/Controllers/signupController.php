<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class signupController extends Controller
{
    public function showSignupPage()
    {
        return view('auth.signup');
    }

    public function authorizeUserSignup(Request $request) {
        $request->validate([
            'email' => [
                'required',
                'email',
            ],
        ]);
    }
}
