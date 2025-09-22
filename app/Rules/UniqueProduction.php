<?php

namespace App\Rules;

use App\Models\Production;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueProduction implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $certificate = Production::whereJsonContains('extra_attributes->generated_by', $value)->exists();

        if ($certificate) {
            $fail("Cette demande d'édition déjà été traitée.");
        }
    }
}
