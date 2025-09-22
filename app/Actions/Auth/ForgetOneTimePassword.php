<?php

namespace App\Actions\Auth;

use Tzsk\Otp\Facades\Otp;

class ForgetOneTimePassword
{
    public function execute(string $key): string
    {
        return Otp::forget($key);
    }
}
