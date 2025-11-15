<?php

namespace App\Jobs;

use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Photo;
use App\Models\Shock;
use App\Models\Entity;
use App\Models\QrCode;
use App\Models\Status;
use App\Models\Receipt;
use App\Enums\StatusEnum;
use App\Enums\ProfileEnum;
use App\Models\Assignment;
use Illuminate\Bus\Queueable;
use App\Models\ArticleRequest;
use NumberToWords\NumberToWords;
use App\Jobs\SendWorkSheetMailJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateWorkSheetPdfJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;

    public $maxExceptions = 1;

    public $backoff = [20, 40, 60];

    public $timeout = 300;

    public $deleteWhenMissingModels = true;

    public bool $workSheetEstablished;

    /**
     * Create a new job instance.
     */
    public function __construct(public Assignment $_assignment, bool $workSheetEstablished)
    {
        $this->workSheetEstablished = $workSheetEstablished;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $assignment = Assignment::with('expertFirm','generalState', 'technicalConclusion', 'documentTransmitted', 'assignmentType', 'expertiseType', 'status', 'vehicle', 'insurer', 'additionalInsurer', 'repairer', 'client', 'directedBy', 'workSheetEstablishedBy', 'workSheetRemark', 'reportRemark')
                        ->where('assignments.id', $this->_assignment->id)
                        ->first();

        $shocks = Shock::select('shocks.*')->with(['shockPoint', 
                                'shockWorks' => function($query) {
                                    $query->orderBy('position', 'asc');
                                }, 'shockWorks.supply', 'workforces' => function($query) {
                                    $query->orderBy('position', 'asc');
                                }, 'workforces.workforceType'])
                    ->where('assignment_id', $assignment->id)
                    ->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
                    ->orderBy('position', 'asc')
                    ->get();

        // $qr_code = QrCode::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->first();
        // $qr_code = null;

        $logoEntity = Entity::select('logo')->find($assignment->expertFirm->id);

        $logo = $logoEntity && $logoEntity->logo
        ? image_to_base64(public_path("storage/logos/{$logoEntity->logo}"))
        : null;

        $path_check_icon = base_path('public/images/check-icon.png');
        $type_check_icon = pathinfo($path_check_icon, PATHINFO_EXTENSION);
        $data_check_icon = file_get_contents($path_check_icon);
        $check_icon = 'data:image/'.$type_check_icon.';base64,'.base64_encode($data_check_icon);

        if($assignment->workSheetEstablishedBy && $assignment->workSheetEstablishedBy->signature) {
            $path_signature = public_path('storage/signature/'.$assignment->workSheetEstablishedBy->signature);
        } else {
            $path_signature = base_path('public/images/wbg.png');
        }

        $type_signature = pathinfo($path_signature, PATHINFO_EXTENSION);
        $data_signature = file_get_contents($path_signature);
        $signature = 'data:image/'.$type_signature.';base64,'.base64_encode($data_signature);

        $path_qr_code = base_path('public/images/qr_code.png');
        $type_qr_code = pathinfo($path_qr_code, PATHINFO_EXTENSION);
        $data_qr_code = file_get_contents($path_qr_code);
        $qr_code = 'data:image/'.$type_qr_code.';base64,'.base64_encode($data_qr_code);

        $path_wbg = base_path('public/images/wbg.png');
        $type_wbg = pathinfo($path_wbg, PATHINFO_EXTENSION);
        $data_wbg = file_get_contents($path_wbg);
        $wbg = 'data:image/'.$type_wbg.';base64,'.base64_encode($data_wbg);

        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('fr');

        $pdf = PDF::loadView('work_sheet/index',compact('assignment','shocks','logo','check_icon','qr_code','signature','wbg','numberTransformer'));
        $pdf->set_option('isHtml5ParserEnabled', false);
        $pdf->set_option('isRemoteEnabled', true);
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->save(public_path("storage/work_sheet/".$assignment->reference.".pdf"));
        $pdf->setBasePath($_SERVER['DOCUMENT_ROOT']);

        if(!$this->workSheetEstablished){
            dispatch(new SendWorkSheetMailJob($assignment));
        }
    }
}
