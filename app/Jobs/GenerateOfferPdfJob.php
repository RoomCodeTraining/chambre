<?php

namespace App\Jobs;

use App\Enums\AssignmentTypeEnum;
use App\Enums\ExpertiseTypeEnum;
use App\Enums\PhotoTypeEnum;
use App\Enums\ProfileEnum;
use App\Enums\RoleEnum;
use App\Enums\StatusEnum;
use App\Models\ArticleRequest;
use App\Models\Ascertainment;
use App\Models\Assignment;
use App\Models\AssignmentType;
use App\Models\Entity;
use App\Models\ExpertiseType;
use App\Models\Offer;
use App\Models\OfferShock;
use App\Models\OtherCost;
use App\Models\Payment;
use App\Models\Photo;
use App\Models\PhotoType;
use App\Models\QrCode;
use App\Models\Receipt;
use App\Models\Shock;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use NumberToWords\NumberToWords;
use PDF;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;
use Spatie\Permission\Models\Role;

class GenerateOfferPdfJob implements ShouldQueue
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
    public function __construct(public Offer $_offer)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        // Supprimer la limite de temps (par défaut 30s)
        set_time_limit(300); // ou 0 pour illimité, mais déconseillé en prod

        // Augmenter la limite mémoire (optionnel si ton PDF est lourd)
        ini_set('memory_limit', '2048M');

        $offer = Offer::with('comparison:id,assignment_id')
                        ->where('offers.id', $this->_offer->id)
                        ->first();

        $assignment = Assignment::with('expertFirm','generalState', 'claimNature', 'technicalConclusion', 'documentTransmitted', 'assignmentType', 'expertiseType', 'status', 'vehicle', 'insurer', 'additionalInsurer', 'repairer', 'client', 'directedBy')
                        ->where('assignments.id', $offer->comparison->assignment_id)
                        ->first();

        $shocks = OfferShock::select('offer_shocks.*')->with(['shockPoint', 
                        'offerShockWorks' => function($query) {
                            $query->orderBy('position', 'asc');
                        }, 'offerShockWorks.supply', 'offerWorkforces' => function($query) {
                            $query->orderBy('position', 'asc');
                        }, 'offerWorkforces.workforceType'])
            ->where('offer_id', $offer->id)
            ->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
            ->orderBy('position', 'asc')
            ->get();

        $ceo = User::where(['entity_id' => $assignment->expertFirm->id, 'current_role_id' => Role::where('name', RoleEnum::CEO->value)->first()->id, 'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id])->first(); 

        // $qr_code = QrCode::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->first();
        // $qr_code = null;
        
        $path_qr_code = base_path('public/images/qr_code.png');
        $type_qr_code = pathinfo($path_qr_code, PATHINFO_EXTENSION);
        $data_qr_code = file_get_contents($path_qr_code);
        $qr_code = 'data:image/'.$type_qr_code.';base64,'.base64_encode($data_qr_code);

        $logoEntity = Entity::select('logo')->find($assignment->expertFirm->id);

        $logo = $logoEntity && $logoEntity->logo
        ? image_to_base64(public_path("storage/logos/{$logoEntity->logo}"))
        : null;

        $path_check_icon = base_path('public/images/check-icon.png');
        $type_check_icon = pathinfo($path_check_icon, PATHINFO_EXTENSION);
        $data_check_icon = file_get_contents($path_check_icon);
        $check_icon = 'data:image/'.$type_check_icon.';base64,'.base64_encode($data_check_icon);

        $path_wbg = base_path('public/images/wbg.png');
        $type_wbg = pathinfo($path_wbg, PATHINFO_EXTENSION);
        $data_wbg = file_get_contents($path_wbg);
        $wbg = 'data:image/'.$type_wbg.';base64,'.base64_encode($data_wbg);

        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('fr');

        $is_sent = false;
        if($offer->status->code == StatusEnum::PENDING->value || $offer->status->code == StatusEnum::ACCEPTED->value || $offer->status->code == StatusEnum::REJECTED->value){
            $is_sent = true;
        }

        $pdf = PDF::loadView('offer/index',compact('offer','assignment','shocks','logo','check_icon','wbg','numberTransformer','is_sent'));
        $pdf->set_option('isHtml5ParserEnabled', false);
        $pdf->set_option('isRemoteEnabled', true);
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->save(public_path("storage/offer/".$offer->reference.".pdf"));
        $pdf->setBasePath($_SERVER['DOCUMENT_ROOT']);
    }
}
