<?php

namespace App\Jobs;

use App\Models\User;
use App\Mail\Auth\Otp;
use App\Models\AppSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendOtpMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;

    public $maxExceptions = 1;

    public $backoff = [20, 40, 60];

    public $timeout = 300;

    public $deleteWhenMissingModels = true;


    /**
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {
        // 
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $expiry_minutes = AppSetting::where('code', '2_fa_expiry_minutes')->first()->value;
        try {
            Mail::to(strtolower($this->user->email))->send(new Otp($this->user, $expiry_minutes));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
