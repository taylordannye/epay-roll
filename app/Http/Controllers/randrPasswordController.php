<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\passwordResetToken;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\passwordResetInstruction;
use App\Mail\resetPasswordInstructions;

class randrPasswordController extends Controller
{
    public $email;

    public function showForgotPasswordPage()
    {
        return view('auth.forgot-password');
    }

    public function sendPasswordResetInstructions(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                'exists:users,email',
            ],
        ]);

        $user = User::where('email', $request->email)->first();

        $existingToken = PasswordResetToken::where('email', $request->email)->first();

        // Check if an existing token is more than 4 hours old and delete it
        if ($existingToken) {
            $tokenCreatedAt = Carbon::parse($existingToken->created_at);
            $fourHoursAgo = now()->subHours(1);

            if ($tokenCreatedAt->lte($fourHoursAgo)) {
                $existingToken->delete();
            } else {
                return redirect(route('forgot-password'))->with('error', "There's a current operation in session, please use the previous link to reset your password or wait for 1 hours to reset it again.");
            }
        }

        $token = Str::random(64);

        $passwordResetToken = new PasswordResetToken();
        $passwordResetToken->email = $request->email;
        $passwordResetToken->token = $token;
        $passwordResetToken->created_at = now();
        $passwordResetToken->save();

        $actionLink = route('reset-password.post', ['token' => $token, 'email' => $request->email]);
        $time = Carbon::now();

        $mailData = [
            'action_link' => $actionLink,
            'user' => $user,
            'time' => $time,
        ];

        // try {
        //     Mail::to($request->email)->send(new resetPasswordInstructions($mailData));
        // } catch (\Exception $e) {
        //     $errorMessage = 'There was an issue sending the password reset instructions. Please try again later. Or try checking your network connection and try again.';
        //     return redirect()->back()->with('error', $errorMessage);
        // }

        echo ($actionLink);

        // return back()->with('success', "An email with the password reset instructions has been sent to your email address. Please check your Spams/Junk folder if not found in inbox.");
    }

    public function showResetPasswordPage(Request $request)
    {
        // Check if the token and email are valid
        $token = $request->input('token');
        $email = $request->input('email');

        $passwordResetToken = PasswordResetToken::where('email', $email)->first();

        if (!$passwordResetToken || $passwordResetToken->token !== $token) {
            return redirect(route('forgot-password'))->with('error', 'The password reset link is invalid or has expired. Please make sure you are using the correct link and try again. If the link has expired, you can request a new one.');
        }

        return view('auth.reset-password', ['email' => $email, 'token' => $token]);
    }

    public function resetPasswordHandler(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => [
                'required',
                'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            ],
        ]);

        // Find the user by email
        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return redirect(route('forgot-password'))->with('error', 'User not found.');
        }

        // Verify the token
        $passwordResetToken = PasswordResetToken::where('email', $user->email)->first();

        if (!$passwordResetToken || $passwordResetToken->token !== $request->input('token')) {
            return redirect(route('forgot-password'))->with('error', 'he password reset link is invalid or has expired. Please make sure you are using the correct link and try again. If the link has expired, you can request a new one.');
        }

        // Update the user's password
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Delete the used password reset token
        $passwordResetToken->delete();

        // Redirect to the login page with a success message
        return redirect(route('signin'))->with('success', 'Password reset successful. You can now log in with your new password.');
    }

    public function cancelPasswordReset()
    {
        echo ('You have successfully cancelled the password reset process, please return to the homepage.');
    }
}
