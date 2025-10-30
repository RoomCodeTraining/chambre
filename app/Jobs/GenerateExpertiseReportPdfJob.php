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
use App\Models\Payment;
use App\Models\Receipt;
use App\Enums\StatusEnum;
use App\Models\OtherCost;
use App\Models\PhotoType;
use App\Enums\ProfileEnum;
use App\Models\Assignment;
use RecursiveArrayIterator;
use App\Enums\PhotoTypeEnum;
use App\Models\Ascertainment;
use App\Models\ExpertiseType;
use Illuminate\Bus\Queueable;
use App\Models\ArticleRequest;
use App\Models\AssignmentType;
use RecursiveIteratorIterator;
use App\Enums\ExpertiseTypeEnum;
use NumberToWords\NumberToWords;
use App\Enums\AssignmentTypeEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateExpertiseReportPdfJob implements ShouldQueue
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
    public function __construct(public Assignment $_assignment)
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

        $assignment = Assignment::with('generalState', 'claimNature', 'technicalConclusion', 'documentTransmitted', 'assignmentType', 'expertiseType', 'status', 'vehicle', 'insurer', 'additionalInsurer', 'repairer', 'client', 'directedBy')
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

        $receipts = Receipt::select('receipts.*')->with('receiptType')
                    ->where('assignment_id', $assignment->id)
                    ->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
                    ->orderBy('id', 'asc')
                    ->get();

        $other_costs = OtherCost::select('other_costs.*')->with('otherCostType')
                    ->where('assignment_id', $assignment->id)
                    ->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
                    ->orderBy('id', 'asc')
                    ->get();

        $ascertainments = Ascertainment::select('ascertainments.*')->with('ascertainmentType')
                    ->where('assignment_id', $assignment->id)
                    ->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
                    ->orderBy('id', 'asc')
                    ->get();

        $evaluations = json_decode($assignment->evaluations);

        $total_payment = Payment::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->sum('amount');

        // $qr_code = QrCode::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->first();
        // $qr_code = null;
        
        $path_qr_code = base_path('public/images/qr_code.png');
        $type_qr_code = pathinfo($path_qr_code, PATHINFO_EXTENSION);
        $data_qr_code = file_get_contents($path_qr_code);
        $qr_code = 'data:image/'.$type_qr_code.';base64,'.base64_encode($data_qr_code);

        // if($qr_code_model){
        //     $path_qr_code = base_path('public/storage/qr_codes/'.$qr_code_model->qr_code);
        //     if (file_exists($path_qr_code)) {
        //         $path_qr_code = base_path('public/storage/qr_codes/'.$qr_code_model->qr_code);
        //         $type_qr_code = pathinfo($path_qr_code, PATHINFO_EXTENSION);
        //         $data_qr_code = file_get_contents($path_qr_code);
        //         $qr_code = 'data:image/'.$type_qr_code.';base64,'.base64_encode($data_qr_code);
        //     }            
        // }

        // $cover_photo = Photo::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->where('is_cover', 1)->where('assignment_id', $assignment->id)->first();

        // Photo de couverture
        $cover_photo = Photo::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
        ->where('is_cover', 1)
        ->where('assignment_id', $assignment->id)
        ->first();

        $cover_photo = $cover_photo
        ? image_to_base64(public_path("storage/photos/report/{$assignment->reference}/{$cover_photo->name}"))
        : null;

        // Photos avant travaux
        $photos_before_works = [];
        $photos_before = Photo::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
                            ->where('is_cover', '!=', 1)
                            ->where('assignment_id', $assignment->id)
                            ->where('photo_type_id', PhotoType::where('code', PhotoTypeEnum::BEFORE)->first()->id)
                            ->get();

        foreach ($photos_before as $photo) {
            $photos_before_works[] = image_to_base64(public_path("storage/photos/report/{$assignment->reference}/{$photo->name}"));
        }

        // Photos pendant travaux
        $photos_during_works = [];
        $photos_during = Photo::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
                            ->where('is_cover', '!=', 1)
                            ->where('assignment_id', $assignment->id)
                            ->where('photo_type_id', PhotoType::where('code', PhotoTypeEnum::DURING)->first()->id)
                            ->get();

        foreach ($photos_during as $photo) {
            $photos_during_works[] = image_to_base64(public_path("storage/photos/report/{$assignment->reference}/{$photo->name}"));
        }

        // Photos après travaux
        $photos_after_works = [];
        $photos_after = Photo::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
                            ->where('is_cover', '!=', 1)
                            ->where('assignment_id', $assignment->id)
                            ->where('photo_type_id', PhotoType::where('code', PhotoTypeEnum::AFTER)->first()->id)
                            ->get();

        foreach ($photos_after as $photo) {
            $photos_after_works[] = image_to_base64(public_path("storage/photos/report/{$assignment->reference}/{$photo->name}"));
        }

        // $cover_photo = null;

        // if($photo){
        //     $path_cover_photo = base_path('public/storage/photos/'.$assignment->reference.'/'.$photo->name);
        //     if (file_exists($path_cover_photo)) {
        //         $path_cover_photo = base_path('public/storage/photos/'.$assignment->reference.'/'.$photo->name);
        //         $type_cover_photo = pathinfo($path_cover_photo, PATHINFO_EXTENSION);
        //         $data_cover_photo = file_get_contents($path_cover_photo);
        //         $cover_photo = 'data:image/'.$type_cover_photo.';base64,'.base64_encode($data_cover_photo);
        //     }            
        // }

        $logo = Entity::where('id', $assignment->expert_firm_id)->first()->logo;
        $logo = $logo
        ? image_to_base64(public_path("storage/logos/{$logo->logo}"))
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

        if($assignment->expertise_type_id == ExpertiseType::where('code', ExpertiseTypeEnum::EVALUATION)->first()->id || $assignment->assignment_type_id == AssignmentType::where('code', AssignmentTypeEnum::EVALUATION)->first()->id){
            $pdf = PDF::loadView('expertise_report/evaluation/index',compact('assignment','shocks','receipts','other_costs','logo','check_icon','qr_code','wbg','cover_photo','photos_before_works','photos_during_works','photos_after_works','numberTransformer','evaluations','ascertainments','total_payment'));
        } else {
            $pdf = PDF::loadView('expertise_report/standard/index',compact('assignment','shocks','receipts','other_costs','logo','check_icon','wbg','qr_code','cover_photo','photos_before_works','photos_during_works','photos_after_works','numberTransformer','evaluations','ascertainments','total_payment'));
        }
        $pdf->set_option('isHtml5ParserEnabled', false);
        $pdf->set_option('isRemoteEnabled', true);
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->save(public_path("storage/expertise_report/".$assignment->reference.".pdf"));
        $pdf->setBasePath($_SERVER['DOCUMENT_ROOT']);
    }
}
