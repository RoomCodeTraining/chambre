<?php

namespace App\Jobs;

use PDF;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Shock;
use App\Models\QrCode;
use App\Models\Status;
use App\Models\Payment;
use App\Enums\StatusEnum;
use App\Enums\ProfileEnum;
use App\Models\Assignment;
use App\Models\WorkforceType;
use Illuminate\Bus\Queueable;
use App\Models\ArticleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateExpertiseSheetPdfJob implements ShouldQueue
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
        $assignment = Assignment::with('generalState', 'technicalConclusion', 'documentTransmitted', 'assignmentType', 'expertiseType', 'status', 'vehicle', 'insurer', 'additionalInsurer', 'repairer', 'client')
                        // ->join('entities as insurers', 'assignments.insurer_id', '=', 'insurers.id')
                        // ->join('entities as repairers', 'assignments.repairer_id', '=', 'repairers.id')
                        // ->join('clients', 'assignments.client_id', '=', 'clients.id')
                        // ->join('assignment_types', 'assignments.assignment_type_id', '=', 'assignment_types.id')
                        // ->join('expertise_types', 'assignments.expertise_type_id', '=', 'expertise_types.id')
                        // ->join('vehicles', 'assignments.vehicle_id', '=', 'vehicles.id')
                        // ->join('brands', 'brands.id', '=', 'vehicles.brand_id')
                        // ->join('vehicle_models', 'vehicle_models.id', '=', 'vehicles.vehicle_model_id')
                        // ->join('colors', 'colors.id', '=', 'vehicles.color_id')
                        // ->join('general_states', 'assignments.general_state_id', '=', 'general_states.id')
                        // ->join('technical_conclusions', 'assignments.technical_conclusion_id', '=', 'technical_conclusions.id')
                        // ->join('document_transmitteds', 'assignments.document_transmitted_id', '=', 'document_transmitteds.id')
                        // ->join('statuses', 'assignments.status_id', '=', 'statuses.id')
                        // ->join('users as directed_by', 'assignments.directed_by', '=', 'directed_by.id')
                        // ->join('users as realized_by', 'assignments.realized_by', '=', 'realized_by.id')
                        // ->join('users as created_by', 'assignments.created_by', '=', 'created_by.id')
                        // ->join('users as updated_by', 'assignments.updated_by', '=', 'updated_by.id')
                        // ->join('users as deleted_by', 'assignments.deleted_by', '=', 'deleted_by.id')
                        // ->join('users as closed_by', 'assignments.closed_by', '=', 'closed_by.id')
                        // ->select('assignments.*', 
                        //     'vehicles.license_plate as vehicle_license_plate', 'vehicles.usage as vehicle_usage', 'vehicles.type as vehicle_type', 'vehicles.option as vehicle_option', 'vehicles.mileage as vehicle_mileage', 'vehicles.serial_number as vehicle_serial_number', 'vehicles.first_entry_into_circulation_date as vehicle_first_entry_into_circulation_date', 'vehicles.fiscal_power as vehicle_fiscal_power', 'vehicles.energy as vehicle_energy', 'vehicles.nb_seats as vehicle_nb_seats', 
                        //     'insurers.name as insurer_name', 'insurers.telephone as insurer_telephone', 'insurers.email as insurer_email', 'insurers.address as insurer_address',
                        //     'repairers.name as repairer_name', 'repairers.telephone as repairer_telephone', 'repairers.email as repairer_email', 'repairers.address as repairer_address',
                        //     'clients.name as client_name', 'clients.phone_1 as client_phone_1', 'clients.phone_2 as client_phone_2', 'clients.email as client_email', 'clients.address as client_address',
                        //     'statuses.label as status_label', 'statuses.code as status_code',
                        //     'brands.id as vehicle_brand_id', 'brands.label as vehicle_brand_label', 
                        //     'vehicle_models.id as vehicle_model_id', 'vehicle_models.label as vehicle_model_label', 
                        //     'colors.id as vehicle_color_id', 'colors.label as vehicle_color_label',
                        //     'general_states.label as general_state_label', 'general_states.code as general_state_code',
                        //     'technical_conclusions.label as technical_conclusion_label', 'technical_conclusions.code as technical_conclusion_code',
                        //     'document_transmitteds.label as document_transmitted_label', 'document_transmitteds.code as document_transmitted_code',
                        //     'assignment_types.label as assignment_type_label', 'assignment_types.code as assignment_type_code',
                        //     'expertise_types.label as expertise_type_label', 'expertise_types.code as expertise_type_code',
                        //     'statuses.label as status_label', 'statuses.code as status_code',
                        //     'directed_by.name as directed_by_name', 'directed_by.email as directed_by_email', 'directed_by.telephone as directed_by_telephone',
                        //     'realized_by.name as realized_by_name', 'realized_by.email as realized_by_email', 'realized_by.telephone as realized_by_telephone',
                        //     'created_by.name as created_by_name', 'created_by.email as created_by_email', 'created_by.telephone as created_by_telephone',
                        //     'updated_by.name as updated_by_name', 'updated_by.email as updated_by_email', 'updated_by.telephone as updated_by_telephone',
                        //     'deleted_by.name as deleted_by_name', 'deleted_by.email as deleted_by_email', 'deleted_by.telephone as deleted_by_telephone',
                        //     'closed_by.name as closed_by_name', 'closed_by.email as closed_by_email', 'closed_by.telephone as closed_by_telephone',
                        // )
                        ->where('assignments.id', $this->_assignment->id)
                        ->first();

        $workforce_types = WorkforceType::where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->get();

        $payment = Payment::where('assignment_id', $assignment->id)->where('status_id', Status::where('code', StatusEnum::ACTIVE)->first()->id)->first();

        $logo = Entity::where('id', $assignment->expert_firm_id)->first();
        $logo = $logo
        ? image_to_base64(public_path("storage/logos/{$logo->logo}"))
        : null;

        $path_check_icon = base_path('public/images/check-icon.png');
        $type_check_icon = pathinfo($path_check_icon, PATHINFO_EXTENSION);
        $data_check_icon = file_get_contents($path_check_icon);
        $check_icon = 'data:image/'.$type_check_icon.';base64,'.base64_encode($data_check_icon);

        $pdf = PDF::loadView('expertise_sheet/index',compact('assignment','logo','check_icon','workforce_types','payment'));
        $pdf->set_option('isHtml5ParserEnabled', false);
        $pdf->set_option('isRemoteEnabled', true);
        $pdf->setOptions(['defaultFont' => 'sans-serif']);
        $pdf->save(public_path("storage/expertise_sheet/".$assignment->reference.".pdf"));
        $pdf->setBasePath($_SERVER['DOCUMENT_ROOT']);
    }
}
