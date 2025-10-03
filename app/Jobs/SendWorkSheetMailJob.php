<?php

namespace App\Jobs;

use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Photo;
use App\Models\Shock;
use App\Models\QrCode;
use App\Models\Status;
use App\Enums\RoleEnum;
use App\Models\Receipt;
use App\Enums\StatusEnum;
use App\Enums\ProfileEnum;
use App\Models\Assignment;
use Illuminate\Bus\Queueable;
use App\Models\ArticleRequest;
use App\Mail\SendWorkSheetMail;
use NumberToWords\NumberToWords;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class SendWorkSheetMailJob implements ShouldQueue
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
        $assignment = Assignment::with('vehicle','vehicle.brand','vehicle.vehicleModel','vehicle.color','client')
                        ->where('assignments.id', $this->assignment->id)
                        ->first();                        

        $file = public_path("storage/work_sheet/".$assignment->reference.".pdf");

        $photos = Photo::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->get()->pluck('name');

        $photos_path = [];
        foreach($photos as $photo){
            if(file_exists(public_path("storage/photos/work-sheet/".$assignment->reference."/".$photo))){
                $photos_path[] = public_path("storage/photos/work-sheet/".$assignment->reference."/".$photo);
            }
        }

        $user_emails = User::whereIn('current_role_id', Role::whereIn('name', [RoleEnum::ADMIN->value, RoleEnum::CEO->value, RoleEnum::EXPERT_MANAGER->value, RoleEnum::EXPERT->value])->get()->pluck('id'))->get()->pluck('email');
        
        // Normalise les emails en une liste de chaînes
		$emails = [];
		if (is_string($assignment->emails) && trim($assignment->emails) !== '') {
			$decoded = json_decode($assignment->emails, true);
			if (json_last_error() === JSON_ERROR_NONE) {
				if (is_array($decoded)) {
					foreach ($decoded as $item) {
						if (is_string($item)) {
							$emails[] = $item;
						} elseif (is_array($item) && isset($item['email']) && is_string($item['email'])) {
							$emails[] = $item['email'];
						}
					}
				} elseif (is_string($decoded)) {
					$emails[] = $decoded;
				}
			} else {
				// fallback: liste séparée par des virgules
				$emails = array_filter(array_map('trim', explode(',', $assignment->emails)));
			}
		}

		// Vérifier si le nom de domaine des emails existe
		$valid_emails = [];
		foreach ($emails as $email) {
			if (!is_string($email) || $email === '') {
				continue;
			}
			$parts = explode('@', $email);
			if (count($parts) == 2) {
				$domain = $parts[1];
				// Vérifie l'existence du domaine via DNS (MX ou A)
				if (checkdnsrr($domain, 'MX') || checkdnsrr($domain, 'A')) {
					$valid_emails[] = $email;
				}
			}
		}
		$emails = $valid_emails;
        $nb_email = count($emails);

        if($file &&  $nb_email > 0){
            try {
                Mail::to($emails)->cc($user_emails)->send(new SendWorkSheetMail($file,$assignment,$photos_path));
                // Mail::to('brahimafane06@gmail.com')->send(new SendWorkSheetMail($file,$assignment,$photos_path));
            } catch (\Exception $e) {
                Log::error($e);
            }
        }
    }
}
