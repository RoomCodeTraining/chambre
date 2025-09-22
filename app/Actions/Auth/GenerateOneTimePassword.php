<?php

namespace App\Actions\Auth;

use Tzsk\Otp\Facades\Otp;

class GenerateOneTimePassword
{
    public function execute(string $secret): string
    {
        return Otp::generate($secret);
    }
}
