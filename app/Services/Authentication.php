<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Mail;
use App\Mail\SendVerificationCode;

class Authentication
{
    public function generateTokenCode($user)
    {
        $expiry = now()->addMinutes(30);
        $code = (string) random_int(100000, 999999);
        $token = bin2hex(random_bytes(16));
        $url = route('verification', [
            'token' => $token,
            'email' => $user->email,
        ]);

        Cache::put('verification.'.$token, [
            'id' => $user->id,
            'code' => $code,
            'expiry' => $expiry,
        ], $expiry);

        Mail::to($user->email)->send(new SendVerificationCode($user, $code, $url, $expiry));

        return [
            'token' => $token,
            'url' => $url,
        ];
    }
}
