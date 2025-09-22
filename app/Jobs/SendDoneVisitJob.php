<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Spent;
use App\Models\Visit;
use App\Models\Broker;
use App\Models\Client;
use App\Models\Insurer;
use App\Enums\StatusEnum;
use App\Enums\ProfileEnum;
use Illuminate\Bus\Queueable;
use App\Mail\SendDoneVisitMail;
use App\Mail\Spent\SendSpentMail;
use App\Models\SpentSpentCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class SendDoneVisitJob implements ShouldQueue
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

        $message = "Nous vous remercions pour votre visite.\nPour toutes informations ou suggestions, contactez le 0797392121 ou le 0554800914 ou encore le 0707170040.";

        try {
            $response = Http::get('https://apis.letexto.com/v1/messages/send?from=BCA-CI&to=225'.$client->phone.'&content='.$message.'&token=4ce1c71132f24418faf2ee0394afc1f4');
        } catch (\Exception $e) {
            Log::error($e);
        }

        if($visit->client_from_type_id == 1){

            $insurer = Insurer::where('name', $visit->client_from)->first();

            if($insurer->email){

                try {
                    Mail::to($insurer->email)->send(new SendDoneVisitMail($visit->load('client','reason')));
                } catch (\Exception $e) {
                    Log::error($e);
                }

            }

        }

        if($visit->client_from_type_id == 2){

            $broker = Broker::where('name', $visit->client_from)->first();

            if($broker->email){
        
                try {
                    Mail::to($broker->email)->send(new SendDoneVisitMail($visit->load('client','reason')));
                } catch (\Exception $e) {
                    Log::error($e);
                }
            }
            
        }
    }
}
