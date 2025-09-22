<?php

namespace App\Rules;

use App\Models\SlipFormatInsurerIntermediary;
use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class UniqueSlipFormatInsurerIntermediary implements ValidationRule
{
    /**
     * All the data under validation.
     *
     * @var array<string, mixed>
     */
    protected array $data = [];

    public function __construct(protected User $user, protected $insurer_id) {}

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        preg_match('/slip_formats\.(\d+)\.\w+/', $attribute, $matches);
        $index = $matches[1];

        $slip_format = SlipFormatInsurerIntermediary::where([
                'insurer_id' => $this->insurer_id,
                'slip_format_id' => Arr::get($this->data[$index], 'slip_format_id'),
                'intermediary_id' => $this->user->entity_id,
            ])->first();

        if ($slip_format) {
            $fail("La clé {$slip_format->slip_format_id} est déjà matchée pour cette compagnie d'assurance.");
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
