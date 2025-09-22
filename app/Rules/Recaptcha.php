<?php

namespace App\Rules;

use App\Services\RecaptchaV3;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Recaptcha implements ValidationRule
{
    public function __construct(
        public string $action,
        public float $minScore = 0.5
    ) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! config('services.google.recaptcha.enabled')) {
            return;
        }

        $score = (new RecaptchaV3)->verify($value, $this->action);

        if (! $score || $score < $this->minScore) {
            $fail("La requête est suspecte ou malformée. Le score de la requête ($score) est inférieur au score minimum autorisé ($this->minScore).");
        }
    }
}
