<?php

namespace App\Enums;

use App\Concerns\UsefulEnums;

enum WebHooksEvents: string
{
    use UsefulEnums;

    case PRODUCTION_FULFILLED = 'production_fulfilled';

    public function label(): string
    {
        return match ($this) {
            self::PRODUCTION_FULFILLED => "Demande d'édition éffectuée",
        };
    }

    public static function all(): array
    {
        return collect(self::cases())->map(fn ($case) => [
            'name' => $case->value,
            'label' => $case->label(),
        ])->toArray();
    }
}
