<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Visit;
use App\Models\Client;
use App\Enums\StatusEnum;
use App\Enums\ProfileEnum;
use App\Mail\SendVisitMail;
use Illuminate\Bus\Queueable;
use App\Models\ArticleRequest;
use App\Models\PurchaseRequest;
use App\Mail\SendWelcomeVisitMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class SendWelcomeVisitJob implements ShouldQueue
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
    public function __construct(public Visit $visit)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $visitExist = $this->visit;

        $visit = Visit::where('id', $visitExist->id)->first();

        $client = Client::where('id', $visit->client_id)->first();

        $message = "Bonjour et bienvenue au Cabinet BCA-CI.\nVeuillez patienter un moment, pendant que nous traitons votre demande.\nNous vous remercions.";

        try {
            $response = Http::get('https://apis.letexto.com/v1/messages/send?from=BCA-CI&to=225'.$client->phone.'&content='.$message.'&token=4ce1c71132f24418faf2ee0394afc1f4');
        } catch (\Exception $e) {
            Log::error($e);
        }

        $emails = User::where('profil_id', 4)->select('email')->get()->pluck('email');

        try {
            Mail::to($emails)->send(new SendWelcomeVisitMail($visit->load('client','reason')));
        } catch (\Exception $e) {
            Log::error($e);
        }
    }
}
