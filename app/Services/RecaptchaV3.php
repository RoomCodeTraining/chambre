<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RecaptchaV3
{
    /**
     * @var string
     */
    protected $secret;

    /**
     * @var string
     */
    protected $origin;

    /**
     * @var string
     */
    protected $locale;

    public function __construct()
    {
        $this->secret = config('services.google.recaptcha.secret');
        $this->origin = config('services.google.recaptcha.origin') ?? 'https://www.google.com/recaptcha';
        $this->locale = config('app.locale');
    }

    /*
     * Verify the given token and retutn the score.
     * Returns false if token is invalid.
     * Returns the score if the token is valid.
     *
     * @param $token
     */
    public function verify($token, $action = null)
    {
        $response = Http::asForm()->post("{$this->origin}/api/siteverify", [
            'secret' => $this->secret,
            'response' => $token,
            'remoteip' => request()->getClientIp(),
        ]);

        $body = $response->json();

        if (! isset($body['success']) || $body['success'] !== true) {
            return false;
        }

        if ($action && (! isset($body['action']) || $action != $body['action'])) {
            return false;
        }

        return isset($body['score']) ? $body['score'] : false;
    }
}
