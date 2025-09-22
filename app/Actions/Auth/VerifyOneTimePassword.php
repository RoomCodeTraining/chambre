<?php

namespace App\Actions\Auth;

use Tzsk\Otp\Facades\Otp;

class VerifyOneTimePassword
{
    public function execute(string $code, string $key): bool
    {
        return Otp::match($code, $key);
    }
}
