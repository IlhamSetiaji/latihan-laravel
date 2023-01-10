<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\FindAccountByEmailRequest;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot-password');
    }

    public function findAccountByEmail(FindAccountByEmailRequest $findAccountByEmailRequest)
    {
        $payload = $findAccountByEmailRequest->validated();
        $status = Password::sendResetLink(
            request()->only('email')
        );
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with(['status' => __($status)]);
        }
        return redirect('/login')->withErrors(['email' => __($status)]);
    }

    public function resetPasswordForm(Request $request)
    {
        return view('auth.reset-password', ['token' => $request->token]);
    }

    public function resetPassword(ResetPasswordRequest $resetPasswordRequest)
    {
        $payload = $resetPasswordRequest->validated();
        $status = Password::reset(
            request()->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
