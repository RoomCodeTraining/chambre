<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;

class UnusedPassword implements ValidationRule
{
    protected $user;

    /**
     * Create a new rule instance.
     *
     * UnusedPassword constructor.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Option is off
        if (! config('security.password_history')) {
            return;
        }

        if (! $this->user instanceof User) {
            if (is_numeric($this->user)) {
                $this->user = User::find($this->user);
            } else {
                $this->user = User::firstWhere('email', $this->user);
            }
        }

        if (! $this->user || $this->user === null) {
            $fail('Aucun utilisateur trouvé');
        }

        $histories = $this->user
            ->passwordHistories()
            ->take(config('security.password_history'))
            ->orderBy('id', 'desc')
            ->get();

        foreach ($histories as $history) {
            if (Hash::check($value, $history->password)) {
                $fail(__("Vous ne pouvez pas réutiliser l'un de vos :num derniers mots de passe.", [
                    'num' => config('security.password_history'),
                ]));
            }
        }
    }
}
