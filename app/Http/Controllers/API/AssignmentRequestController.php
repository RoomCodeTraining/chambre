<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Photo;
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
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\AssignmentRequest\AssignmentRequestResource;
use App\Http\Requests\AssignmentRequest\CreateAssignmentRequestRequest;
use App\Http\Requests\AssignmentRequest\UpdateAssignmentRequestRequest;
use App\Http\Requests\AssignmentRequest\AddPhotosToAssignmentRequestRequest;

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
                                    ->accessibleBy(auth()->user())
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
        $expert_firm_id = Entity::find(InsurerRelationship::where('id', $request->insurer_relationship_id)->first()?->expert_firm_id);
        $insurer = Entity::find(InsurerRelationship::where('id', $request->insurer_relationship_id)->first()?->insurer_id);
        $repairer = Entity::find(RepairerRelationship::where('id', $request->repairer_relationship_id)->first()?->repairer_id);

        $now = Carbon::now();
        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;

        $assignmentRequest = AssignmentRequest::create([
            'reference' => 'REQ'.$today,
            'expert_firm_id' => $expert_firm_id,
            'client_id' => $request->client_id,
            'vehicle_id' => $request->vehicle_id,
            'insurer_id' => $insurer->id,
            'repairer_id' => $repairer->id,
            'policy_number' => $request->policy_number,
            'claim_number' => $request->claim_number,
            'claim_date' => $request->claim_date,
            'expertise_place' => $request->expertise_place,
            'status_id' => Status::where('code', StatusEnum::PENDING)->first()->id,
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
        $assignmentRequest = AssignmentRequest::where('id', AssignmentRequest::keyFromHashId($id))// ->accessibleBy(auth()->user())
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
        $assignmentRequest = AssignmentRequest::accessibleBy(auth()->user())->findOrFail(AssignmentRequest::keyFromHashId($id));

        return $this->responseSuccess(null, new AssignmentRequestResource($assignmentRequest->load('expertFirm','assignmentType', 'expertiseType', 'status', 'deletedBy', 'client', 'vehicle', 'insurer', 'repairer', 'createdBy', 'updatedBy', 'photos')));
    }

    /**
     * Mettre à jour une demande d'expertise
     *
     * @authenticated
     */
    public function update(UpdateAssignmentRequestRequest $request, $id): JsonResponse
    {
        $assignmentRequest = AssignmentRequest::accessibleBy(auth()->user())->findOrFail(AssignmentRequest::keyFromHashId($id));

        $assignmentRequest->update($request->validated());

        return $this->responseSuccess('AssignmentRequest updated Successfully', new AssignmentRequestResource($assignmentRequest));
    }

    /**
     * Rejeter la demande d'expertise
     *
     * @authenticated
     */
    public function reject($id): JsonResponse
    {
        $assignmentRequest = AssignmentRequest::accessibleBy(auth()->user())->findOrFail(AssignmentRequest::keyFromHashId($id));

        if($assignmentRequest->status_id == Status::where('code', StatusEnum::PENDING)->first()->id){
            $assignmentRequest->update([
                'status_id' => Status::where('code', StatusEnum::REJECTED)->first()->id,
                'updated_by' => auth()->user()->id,
            ]);
        } else {
            return $this->responseUnprocessable('La demande d\'expertise n\'est pas en attente.', null);
        }

        return $this->responseSuccess('Demandée d\'expertise rejetée avec succès', new AssignmentRequestResource($assignmentRequest));
    }

    /**
     * Annuler la demande d'expertise
     *
     * @authenticated
     */
    public function cancel($id): JsonResponse
    {
        $assignmentRequest = AssignmentRequest::accessibleBy(auth()->user())->findOrFail(AssignmentRequest::keyFromHashId($id));

        if($assignmentRequest->status_id == Status::where('code', StatusEnum::PENDING)->first()->id){
            $assignmentRequest->update([
                'status_id' => Status::where('code', StatusEnum::CANCELLED)->first()->id,
                'updated_by' => auth()->user()->id,
            ]);
        } else {
            return $this->responseUnprocessable('La demande d\'expertise n\'est pas en attente.', null);
        }

        return $this->responseSuccess('Demandée d\'expertise annulée avec succès', new AssignmentRequestResource($assignmentRequest));
    }

    /**
     * Supprimer une demande d'expertise
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $assignmentRequest = AssignmentRequest::accessibleBy(auth()->user())->findOrFail(AssignmentRequest::keyFromHashId($id));

        // $assignmentRequest->update([
        //     'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
        //     'deleted_at' => now(),
        //     'deleted_by' => auth()->user()->id,
        // ]);

        return $this->responseDeleted();
    }

   
}
