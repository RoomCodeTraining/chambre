<?php

namespace App\Jobs;

use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Photo;
use App\Models\Shock;
use App\Models\QrCode;
use App\Models\Status;
use App\Models\Payment;
use App\Models\Receipt;
use App\Enums\StatusEnum;
use App\Models\OtherCost;
use App\Models\PhotoType;
use App\Enums\ProfileEnum;
use App\Models\Assignment;
use App\Enums\PhotoTypeEnum;
use App\Models\Ascertainment;
use App\Models\ExpertiseType;
use Illuminate\Bus\Queueable;
use App\Models\ArticleRequest;
use App\Models\AssignmentType;
use App\Enums\ExpertiseTypeEnum;
use NumberToWords\NumberToWords;
use App\Enums\AssignmentTypeEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;

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
        // ✅ Supprimer la limite de temps (par défaut 30s)
        set_time_limit(120); // ou 0 pour illimité, mais déconseillé en prod

        // ✅ Augmenter la limite mémoire (optionnel si ton PDF est lourd)
        ini_set('memory_limit', '512M');
        
        $assignment = Assignment::with('experts', 'generalState', 'claimNature', 'technicalConclusion', 'documentTransmitted', 'assignmentType', 'expertiseType', 'status', 'vehicle', 'insurer', 'additionalInsurer', 'repairer', 'client', 'directedBy')
                        ->where('assignments.id', $this->_assignment->id)
                        ->first();

        // $total_shock_work_obsolescence_amount_excluding_tax = Shock::where('assignment_id', $assignment->id)->sum('shock_work_obsolescence_amount_excluding_tax');
        // $total_shock_work_obsolescence_amount_tax = Shock::where('assignment_id', $assignment->id)->sum('shock_work_obsolescence_amount_tax');
        // $total_shock_work_obsolescence_amount = Shock::where('assignment_id', $assignment->id)->sum('shock_work_obsolescence_amount');
        // $total_shock_work_recovery_amount_excluding_tax = Shock::where('assignment_id', $assignment->id)->sum('shock_work_recovery_amount_excluding_tax');
        // $total_shock_work_recovery_amount_tax = Shock::where('assignment_id', $assignment->id)->sum('shock_work_recovery_amount_tax');
        // $total_shock_work_recovery_amount = Shock::where('assignment_id', $assignment->id)->sum('shock_work_recovery_amount');
        // $total_shock_work_discount_amount_excluding_tax = Shock::where('assignment_id', $assignment->id)->sum('shock_work_discount_amount_excluding_tax');
        // $total_shock_work_discount_amount_tax = Shock::where('assignment_id', $assignment->id)->sum('shock_work_discount_amount_tax');
        // $total_shock_work_discount_amount = Shock::where('assignment_id', $assignment->id)->sum('shock_work_discount_amount');
        // $total_shock_work_new_amount_excluding_tax = Shock::where('assignment_id', $assignment->id)->sum('shock_work_new_amount_excluding_tax');
        // $total_shock_work_new_amount_tax = Shock::where('assignment_id', $assignment->id)->sum('shock_work_new_amount_tax');
        // $total_shock_work_new_amount = Shock::where('assignment_id', $assignment->id)->sum('shock_work_new_amount');
        // $total_workforce_amount_excluding_tax = Shock::where('assignment_id', $assignment->id)->sum('workforce_amount_excluding_tax');
        // $total_workforce_amount_tax = Shock::where('assignment_id', $assignment->id)->sum('workforce_amount_tax');
        // $total_workforce_amount = Shock::where('assignment_id', $assignment->id)->sum('workforce_amount');
        // $total_paint_product_amount_excluding_tax = Shock::where('assignment_id', $assignment->id)->sum('paint_product_amount_excluding_tax');
        // $total_paint_product_amount_tax = Shock::where('assignment_id', $assignment->id)->sum('paint_product_amount_tax');
        // $total_paint_product_amount = Shock::where('assignment_id', $assignment->id)->sum('paint_product_amount');
        // $total_small_supply_amount_excluding_tax = Shock::where('assignment_id', $assignment->id)->sum('small_supply_amount_excluding_tax');
        // $total_small_supply_amount_tax = Shock::where('assignment_id', $assignment->id)->sum('small_supply_amount_tax');
        // $total_small_supply_amount = Shock::where('assignment_id', $assignment->id)->sum('small_supply_amount');
        // $total_amount_excluding_tax = Shock::where('assignment_id', $assignment->id)->sum('amount_excluding_tax');
        // $total_amount_tax = Shock::where('assignment_id', $assignment->id)->sum('amount_tax');
        // $total_amount = Shock::where('assignment_id', $assignment->id)->sum('amount');

        $shocks = Shock::with(['shockPoint', 
                                'shockWorks' => function($query) {
                                    $query->orderBy('position', 'asc');
                                }, 'shockWorks.supply', 'workforces' => function($query) {
                                    $query->orderBy('position', 'asc');
                                }, 'workforces.workforceType'])
                    ->where('assignment_id', $assignment->id)
                    ->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
                    ->orderBy('position', 'asc')
                    ->get();

        $receipts = Receipt::with('receiptType')
                    ->where('assignment_id', $assignment->id)
                    ->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
                    ->orderBy('id', 'asc')
                    ->get();

        $other_costs = OtherCost::with('otherCostType')
                    ->where('assignment_id', $assignment->id)
                    ->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)
                    ->orderBy('id', 'asc')
                    ->get();

        $ascertainments = Ascertainment::with('ascertainmentType')
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

        $cover_photo = Photo::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->where('is_cover', 1)->where('assignment_id', $assignment->id)->first();

        $photos_before_works_path = Photo::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->where('is_cover', '!=', 1)->where('assignment_id', $assignment->id)->where('photo_type_id', PhotoType::where('code', PhotoTypeEnum::BEFORE)->first()->id)->get();
        $photos_before_works = [];
        foreach($photos_before_works_path as $photos_before_work){
            if(file_exists(public_path("storage/photos/report/".$assignment->reference."/".$photos_before_work->name))){
                $photos_before_works[] = public_path("storage/photos/report/".$assignment->reference."/".$photos_before_work->name);
            }
        }

        $photos_during_works_path = Photo::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->where('is_cover', '!=', 1)->where('assignment_id', $assignment->id)->where('photo_type_id', PhotoType::where('code', PhotoTypeEnum::DURING)->first()->id)->get();
        $photos_during_works = [];
        foreach($photos_during_works_path as $photos_during_work){
            if(file_exists(public_path("storage/photos/report/".$assignment->reference."/".$photos_during_work->name))){
                $photos_during_works[] = public_path("storage/photos/report/".$assignment->reference."/".$photos_during_work->name);
            }
        }
        $photos_after_works_path = Photo::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->where('is_cover', '!=', 1)->where('assignment_id', $assignment->id)->where('photo_type_id', PhotoType::where('code', PhotoTypeEnum::AFTER)->first()->id)->get();
        $photos_after_works = [];
        foreach($photos_after_works_path as $photos_after_work){
            if(file_exists(public_path("storage/photos/report/".$assignment->reference."/".$photos_after_work->name))){
                $photos_after_works[] = public_path("storage/photos/report/".$assignment->reference."/".$photos_after_work->name);
            }
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

        $path = base_path('public/images/logo_eg.jpg');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/'.$type.';base64,'.base64_encode($data);

        $path_check_icon = base_path('public/images/check-icon.png');
        $type_check_icon = pathinfo($path_check_icon, PATHINFO_EXTENSION);
        $data_check_icon = file_get_contents($path_check_icon);
        $check_icon = 'data:image/'.$type_check_icon.';base64,'.base64_encode($data_check_icon);

        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('fr');

        if($assignment->expertise_type_id == ExpertiseType::where('code', ExpertiseTypeEnum::EVALUATION)->first()->id || $assignment->assignment_type_id == AssignmentType::where('code', AssignmentTypeEnum::EVALUATION)->first()->id){
            $pdf = PDF::loadView('expertise_report/evaluation/index',compact('assignment','shocks','receipts','other_costs','logo','check_icon','qr_code','cover_photo','photos_before_works','photos_during_works','photos_after_works','numberTransformer','evaluations','ascertainments','total_payment'));
        } else {
            $pdf = PDF::loadView('expertise_report/standard/index',compact('assignment','shocks','receipts','other_costs','logo','check_icon','qr_code','cover_photo','photos_before_works','photos_during_works','photos_after_works','numberTransformer','evaluations','ascertainments','total_payment'));
        }
        $pdf->set_option('isHtml5ParserEnabled', false);
        $pdf->set_option('isRemoteEnabled', true);
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->save(public_path("storage/expertise_report/".$assignment->reference.".pdf"));
        $pdf->setBasePath($_SERVER['DOCUMENT_ROOT']);

        // Recherche de la page de l'élément "note-expert" dans le document généré par Dompdf
        // On suppose que $dompdf est déjà instancié et rendu
        // $targetPage contient maintenant le numéro de page de l'élément "note-expert"


        // $dompdf = $pdf->getDomPDF(); // on récupère l'instance Dompdf sans écraser $pdf
        // $dompdf->render();

        // // Canvas et hauteur
        // $canvas = $dompdf->getCanvas();
        // $pageHeight = $canvas->get_height();

        // $targetPage = null;

        // // Récupérer l'arbre des frames
        // $tree = $dompdf->getTree();
        // $root = $tree->get_root();

        // // Parcours récursif des frames
        // $iterator = new RecursiveIteratorIterator(
        //     new RecursiveArrayIterator([$root]),
        //     RecursiveIteratorIterator::SELF_FIRST
        // );

        // foreach ($iterator as $frame) {
        //     if ($frame instanceof \Dompdf\Frame) {
        //         $node = $frame->get_node();
        //         if ($node->nodeType === XML_ELEMENT_NODE && $node->hasAttribute("id")) {
        //             if ($node->getAttribute("id") === "note-expert") {
        //                 $box = $frame->get_containing_block();
        //                 $yPos = $box["y"];
        //                 $targetPage = intval($yPos / $pageHeight) + 1;
        //                 break;
        //             }
        //         }
        //     }
        // }

        // dd("Page de #note-expert :", $targetPage);



    }
}
