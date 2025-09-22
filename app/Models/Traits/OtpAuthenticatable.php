<?php

namespace App\Models\Traits;

trait OtpAuthenticatable
{
    public function otpKey(): string
    {
        return $this->hashId;
    }
}
