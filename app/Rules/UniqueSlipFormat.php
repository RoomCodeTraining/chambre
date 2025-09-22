<?php

namespace App\Rules;

use App\Models\SlipFormat;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class UniqueSlipFormat implements ValidationRule
{
    /**
     * All the data under validation.
     *
     * @var array<string, mixed>
     */
    protected array $data = [];

    public function __construct(protected User $user) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        preg_match('/slip_formats\.(\d+)\.\w+/', $attribute, $matches);
        $index = $matches[1];

        $slip_format = SlipFormat::where([
                'insurer_id' => $this->user->entity_id,
                'name' => Arr::get($this->data[$index], 'name'),
            ])->first();

        if ($slip_format) {
            $fail("La clé {$slip_format->slip_format_id} est déjà utilisée par votre compagnie d'assurance.");
        }
    }

    /**
     * Set the data under validation.
     *
     * @param  array<string, mixed>  $data
     */
    public function setData(array $data): static
    {
        $this->data = $data;

        return $this;
    }
}
