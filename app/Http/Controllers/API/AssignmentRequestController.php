<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Entity;
use App\Models\Status;
use App\Models\Vehicle;
use App\Enums\StatusEnum;
use App\Models\AssignmentRequest;
use Illuminate\Http\JsonResponse;
use App\Models\InsurerRelationship;
use App\Http\Controllers\Controller;
use App\Models\RepairerRelationship;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\AssignmentRequest\AssignmentRequestResource;
use App\Http\Requests\AssignmentRequest\CreateAssignmentRequestRequest;
use App\Http\Requests\AssignmentRequest\UpdateAssignmentRequestRequest;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des demandes d'expertise
 *
 * APIs pour la gestion des demandes d'expertise
 */
class AssignmentRequestController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister toutes les demandes d'expertise
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $assignmentRequests = AssignmentRequest::with('expertFirm','assignmentType', 'expertiseType', 'status', 'deletedBy', 'client', 'vehicle', 'insurer', 'repairer', 'createdBy', 'updatedBy')
                                    // ->accessibleBy(auth()->user())
                                    ->useFilters()
                                    ->latest('created_at')
                                    ->dynamicPaginate();

        return AssignmentRequestResource::collection($assignmentRequests);
    }

    /**
     * Créer une demande d'expertise
     *
     * @authenticated
     */
    public function store(CreateAssignmentRequestRequest $request): JsonResponse
    {
        $insurer = Entity::find(InsurerRelationship::where('id', $request->insurer_relationship_id)->first()?->insurer_id);
        $repairer = Entity::find(RepairerRelationship::where('id', $request->repairer_relationship_id)->first()?->repairer_id);

        $now = Carbon::now();
        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;

        $assignmentRequest = AssignmentRequest::create([
            'reference' => 'REQ'.$today,
            'expert_firm_id' => $request->expert_firm_id,
            'client_id' => $request->client_id,
            'vehicle_id' => $request->vehicle_id,
            'insurer_id' => $insurer->id,
            'repairer_id' => $repairer->id,
            // 'assignment_type_id' => $request->assignment_type_id,
            // 'expertise_type_id' => $request->expertise_type_id,
            'policy_number' => $request->policy_number,
            'claim_number' => $request->claim_number,
            'claim_date' => $request->claim_date,
            'expertise_place' => $request->expertise_place,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);
        
        $files = [];
        if($request->hasfile('photos'))
        {
            $count = 0;
            if($request->file('photos') && $request->hasfile('photos')){
                foreach($request->file('photos') as $file)
                {
                    $count = $count + 1;
                    $name = 'IMG_BP'.$today.'_'.$count.'.png';
                    $file->move(public_path("storage/photos/assignment-request/{$assignmentRequest->reference}"), $name);

                    $photo = Photo::create([
                        'name' => $name,
                        'assignment_request_id' => $assignmentRequest->id,
                        'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                        'created_by' => auth()->user()->id,
                        'updated_by' => auth()->user()->id,
                    ]);
                }
            }
        }

        return $this->responseCreated('AssignmentRequest created successfully', new AssignmentRequestResource($assignmentRequest));
    }

    /**
     * Ajouter des photos à une demande d'expertise
     *
     * @authenticated
     */
    public function addPhotos(AddPhotosToAssignmentRequestRequest $request, $id): JsonResponse
    {
        $assignmentRequest = AssignmentRequest::where('id', $request->assignment_request_id)// ->accessibleBy(auth()->user())
                                            ->firstOrFail();

        $now = Carbon::now();
        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;

        $files = [];
        if($request->hasfile('photos'))
        {
            $count = 0;
            if($request->file('photos') && $request->hasfile('photos')){
                foreach($request->file('photos') as $file)
                {
                    $count = $count + 1;
                    $name = 'IMG_REQ'.$today.'_'.$count.'.png';
                    $file->move(public_path("storage/photos/assignment-request/{$assignmentRequest->reference}"), $name);

                    $photo = Photo::create([
                        'name' => $name,
                        'assignment_request_id' => $assignmentRequest->id,
                        'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                        'created_by' => auth()->user()->id,
                        'updated_by' => auth()->user()->id,
                    ]);
                }
            }
        }

        return $this->responseCreated('Photos added successfully', null);
    }

    /**
     * Afficher une demande d'expertise
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $assignmentRequest = AssignmentRequest::findOrFail(AssignmentRequest::keyFromHashId($id));

        return $this->responseSuccess(null, new AssignmentRequestResource($assignmentRequest->load('expertFirm','assignmentType', 'expertiseType', 'status', 'deletedBy', 'client', 'vehicle', 'insurer', 'repairer', 'createdBy', 'updatedBy')));
    }

    /**
     * Mettre à jour une demande d'expertise
     *
     * @authenticated
     */
    public function update(UpdateAssignmentRequestRequest $request, $id): JsonResponse
    {
        $assignmentRequest = AssignmentRequest::findOrFail(AssignmentRequest::keyFromHashId($id));

        $assignmentRequest->update($request->validated());

        return $this->responseSuccess('AssignmentRequest updated Successfully', new AssignmentRequestResource($assignmentRequest));
    }

    /**
     * Accepter la demande d'expertise
     *
     * @authenticated
     */
    public function accept($id): JsonResponse
    {
        $assignmentRequest = AssignmentRequest::findOrFail(AssignmentRequest::keyFromHashId($id));

        $assignmentRequest->update([
            'status_id' => Status::where('code', StatusEnum::ACCEPTED)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);

        if($assignmentRequest->claim_number && Assignment::where('claim_number', $assignmentRequest->claim_number)->where(function($query){
            $query->where('status_id', Status::where('code', StatusEnum::OPENED)->first()?->id)
                ->orWhere('status_id', Status::where('code', StatusEnum::REALIZED)->first()?->id)
                ->orWhere('status_id', Status::where('code', StatusEnum::PENDING_FOR_REPAIRER_INVOICE)->first()?->id)
                ->orWhere('status_id', Status::where('code', StatusEnum::PENDING_FOR_REPAIRER_INVOICE_VALIDATION)->first()?->id)
                ->orWhere('status_id',  Status::where('code', StatusEnum::IN_EDITING)->first()?->id)
                ->orWhere('status_id', Status::where('code', StatusEnum::EDITED)->first()?->id)
                ->orWhere('status_id', Status::where('code', StatusEnum::VALIDATED)->first()?->id);
        })->count() > 0){
            return $this->responseUnprocessable('Le numéro de sinistre existe déjà pour un dossier ouvert, réalisé, rédigé ou validé');
        }
        
        $expert_firm = Entity::find($assignmentRequest->expert_firm_id);
        $insurer = Entity::find($assignmentRequest->insurer_id);
        $repairer = Entity::find($assignmentRequest->repairer_id);

        $now = Carbon::now();
        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;

        $year = substr($annee, -2);
        $month = date("m");
        $suffix = $month.'-'.$year.'-'. strtoupper($expert_firm->suffix);
        $reference = 'D'.$today;
        
        $last_assignment = Assignment::where('reference_updated_at', 'like', Carbon::now()->format('Y-m').'%')->where(['expert_firm_id' => $expert_firm->id, 'assignment_type_id' => $request->assignment_type_id]);
        
        if(AssignmentTypeEnum::INSURER->value && $request->assignment_type_id == AssignmentType::where('code', AssignmentTypeEnum::INSURER)->first()?->id){
            $last_assignment = $last_assignment->where(['insurer_id' => $insurer->id])->latest('reference_updated_at')->first();
        } else {
            $last_assignment = $last_assignment->latest('reference_updated_at')->first();
        }

        if($last_assignment){
            $prefix = explode("-", $last_assignment->reference)[0];
            $number = preg_match_all('/\d+/', $prefix, $matches);
            $number = $matches[0][0];
            $number = $number + 1;
            $prefix = preg_split('/\d+/', $prefix);
            if(mb_strlen($prefix[0]) == 1){
                $prefix = $prefix[0][0];
            } else {
                $prefix = $prefix[0];
            }
            $length = mb_strlen($number);
            if($length == 1){
                $reference = $prefix.'0000'.$number.'-'.$suffix;
            } else if($length == 2){
                $reference = $prefix.'000'.$number.'-'.$suffix;
            } else if($length == 3){
                $reference = $prefix.'00'.$number.'-'.$suffix;
            } else if($length == 4){
                $reference = $prefix.'0'.$number.'-'.$suffix;
            } else {
                $reference = $prefix.$number.'-'.$suffix;
            }
            if(Assignment::where('reference', $reference)->exists()){
                $assignment = Assignment::where('reference', $reference)->first();
                
                $prefix = explode("-", $assignment->reference)[0];
                $number = preg_match_all('/\d+/', $prefix, $matches);
                $number = $matches[0][0];
                $number = $number + 1;
                $prefix = preg_split('/\d+/', $prefix);
                if(mb_strlen($prefix[0]) == 1){
                    $prefix = $prefix[0][0];
                } else {
                    $prefix = $prefix[0];
                }
                $length = mb_strlen($number);
                if($length == 1){
                    $reference = $prefix.'0000'.$number.'-'.$suffix;
                } else if($length == 2){
                    $reference = $prefix.'000'.$number.'-'.$suffix;
                } else if($length == 3){
                    $reference = $prefix.'00'.$number.'-'.$suffix;
                } else if($length == 4){
                    $reference = $prefix.'0'.$number.'-'.$suffix;
                } else {
                    $reference = $prefix.$number.'-'.$suffix;
                }
            }
        } else {
            if($request->assignment_type_id == AssignmentType::where('code', AssignmentTypeEnum::INSURER)->first()?->id){
                $reference = $insurer->prefix.'00001'.'-'.$suffix;
            }

            if(AssignmentTypeEnum::PARTICULAR && $request->assignment_type_id == AssignmentType::where('code', AssignmentTypeEnum::PARTICULAR)->first()?->id){
                $reference = AssignmentReferencePrefixEnum::PARTICULAR->value.'00001'.'-'.$suffix;
            }
    
            if(AssignmentTypeEnum::TAXI->value && $request->assignment_type_id == AssignmentType::where('code', AssignmentTypeEnum::TAXI)->first()?->id){
                $reference = AssignmentReferencePrefixEnum::TAXI->value.'00001'.'-'.$suffix;
            }
    
            if(AssignmentTypeEnum::EVALUATION->value && $request->assignment_type_id == AssignmentType::where('code', AssignmentTypeEnum::EVALUATION)->first()?->id){
                $reference = AssignmentReferencePrefixEnum::EVALUATION->value.'00001'.'-'.$suffix;
            }

            if(AssignmentTypeEnum::AGAINST_EXPERTISE->value && $request->assignment_type_id == AssignmentType::where('code', AssignmentTypeEnum::AGAINST_EXPERTISE)->first()?->id){
                $reference = AssignmentReferencePrefixEnum::AGAINST_EXPERTISE->value.'00001'.'-'.$suffix;
            }
        }

        $vehicle = Vehicle::with('vehicleGenre', 'vehicleEnergy')->find($request->vehicle_id);

        $assignment = Assignment::create([
            'reference' => $reference,
            'expert_firm_id' => $expert_firm->id,
            'vehicle_id' => $request->vehicle_id ?? null,
            'insurer_id' => $insurer ? $insurer->id : null,
            'additional_insurer_id' => $additional_insurer ? $additional_insurer->id : null,
            'repairer_id' => $repairer ? $repairer->id : null,
            'client_id' => $request->client_id ?? null,
            'assignment_type_id' => $request->assignment_type_id,
            'expertise_type_id' => $request->expertise_type_id,
            'document_transmitted_id' => json_encode($request->document_transmitted_id),
            'assured_value' => $request->assured_value,
            'policy_number' => $request->policy_number,
            'claim_number' => $request->claim_number,
            'claim_date' => $request->claim_date,
            'expertise_date' => $request->expertise_date,
            'seen_before_work_date' => $request->expertise_date,
            'expertise_place' => $request->expertise_place,
            'damage_declared' => $request->damage_declared,
            'point_noted' => $request->point_noted,
            'received_at' => $request->received_at,
            'vehicle_mileage' => $request->vehicle_mileage,
            'status_id' => Status::where('code', StatusEnum::OPENED)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
            'reference_updated_by' => auth()->user()->id,
            'reference_updated_at' => Carbon::now(),
        ]);

        if($request->vehicle_mileage){
            $vehicle = Vehicle::where('id',$request->vehicle_id)->first();
            $vehicle->mileage = $request->vehicle_mileage;
            $vehicle->save();
        }

        try {
            dispatch(new SendOpenedAssignmentNotificationJob($assignment));
            dispatch(new GenerateExpertiseSheetPdfJob($assignment));
        } catch (\Exception $e) {
            Log::error($e);
        }

        return $this->responseSuccess('Demandée d\'expertise acceptée avec succès', new AssignmentRequestResource($assignmentRequest));
    }

    /**
     * Supprimer une demande d'expertise
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $assignmentRequest = AssignmentRequest::findOrFail(AssignmentRequest::keyFromHashId($id));

        $assignmentRequest->update([
            'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
            'deleted_at' => now(),
            'deleted_by' => auth()->user()->id,
        ]);

        return $this->responseDeleted();
    }

   
}
