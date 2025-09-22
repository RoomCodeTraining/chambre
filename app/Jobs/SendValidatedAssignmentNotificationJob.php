<?php

namespace App\Jobs;

use App\Models\User;
use App\Enums\RoleEnum;
use App\Models\Assignment;
use Illuminate\Bus\Queueable;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\SendValidatedAssignmentNotificationMail;
use Illuminate\Support\Facades\Log;

class SendValidatedAssignmentNotificationJob implements ShouldQueue
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
    public function __construct(public Assignment $assignment)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $assignmentExist = $this->assignment;

        $assignment = Assignment::with('vehicle','client')->where('id', $assignmentExist->id)->first();

        $message = "Bonjour, les travaux d'expertise pour votre véhicule immatriculé ".$assignment->vehicle->license_plate." sont terminés. Vous pouvez passer dans nos locaux pour la récupération.";

        if($assignment->client->phone_1){
            try {
                $response = Http::get('https://apis.letexto.com/v1/messages/send?from=BCA-CI&to=225'.$assignment->client->phone_1.'&content='.$message.'&token=4ce1c71132f24418faf2ee0394afc1f4');
            } catch (\Exception $e) {
                Log::error($e);
            }
        }

        if($assignment->client->email){
            $user_emails = User::where('current_role_id', Role::whereIn('name', [RoleEnum::ADMIN, RoleEnum::CEO, RoleEnum::EXPERT_MANAGER, RoleEnum::EXPERT])->first()->id)->get()->pluck('email');
            try {
                Mail::to($assignment->client->email)->cc($user_emails)->send(new SendValidatedAssignmentNotificationMail($assignment));
            } catch (\Exception $e) {
                Log::error($e);
            }
        }
    }
}
