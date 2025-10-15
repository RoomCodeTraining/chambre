<?php

namespace App\Http\Controllers\API;

use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use App\Models\DocumentTransmitted;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Resources\DocumentTransmitted\DocumentTransmittedResource;
use App\Http\Requests\DocumentTransmitted\CreateDocumentTransmittedRequest;
use App\Http\Requests\DocumentTransmitted\UpdateDocumentTransmittedRequest;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des documents transmis
 *
 * APIs pour la gestion des documents transmis
 */
class DocumentTransmittedController extends Controller
{
    use ApiResponse;
    public function __construct()
    {

    }

    /**
     * Lister tous les documents transmis
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $documentTransmitteds = DocumentTransmitted::useFilters()->dynamicPaginate();

        return DocumentTransmittedResource::collection($documentTransmitteds);
    }

    /**
     * Ajouter un document transmis
     *
     * @authenticated
     */
    public function store(CreateDocumentTransmittedRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->label));

        $documentTransmitted = DocumentTransmitted::create([
            'code' => $code,
            'label' => $request->label,
            'description' => $request->description,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('DocumentTransmitted created successfully', new DocumentTransmittedResource($documentTransmitted));
    }

    /**
     * Afficher un document transmis
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $documentTransmitted = DocumentTransmitted::findOrFail(DocumentTransmitted::keyFromHashId($id));

        return $this->responseSuccess(null, new DocumentTransmittedResource($documentTransmitted));
    }

    /**
     * Mettre à jour un document transmis
     *
     * @authenticated
     */
    public function update(UpdateDocumentTransmittedRequest $request, $id): JsonResponse
    {
        $documentTransmitted = DocumentTransmitted::findOrFail(DocumentTransmitted::keyFromHashId($id));

        $documentTransmitted->update([
            'label' => $request->label,
            'description' => $request->description,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('Document transmis mis à jour avec succès', new DocumentTransmittedResource($documentTransmitted));
    }

    /**
     * Supprimer un document transmis
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $documentTransmitted = DocumentTransmitted::findOrFail(DocumentTransmitted::keyFromHashId($id));

        // $documentTransmitted->delete();

        return $this->responseDeleted();
    }

   
}
