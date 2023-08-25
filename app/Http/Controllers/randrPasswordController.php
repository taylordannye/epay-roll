<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class randrPasswordController extends Controller
{
    public function showForgotPasswordPage() {
        return view('auth.forgot-password');
    }
}
