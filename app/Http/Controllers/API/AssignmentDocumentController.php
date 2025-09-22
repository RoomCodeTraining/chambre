<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssignmentDocument\UpdateAssignmentDocumentRequest;
use App\Http\Requests\AssignmentDocument\CreateAssignmentDocumentRequest;
use App\Http\Resources\AssignmentDocument\AssignmentDocumentResource;
use App\Models\AssignmentDocument;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des documents des dossiers
 *
 * APIs pour la gestion des documents des dossiers
 */
class AssignmentDocumentController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Liste des documents des dossiers
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $assignmentDocuments = AssignmentDocument::with('assignment', 'document_transmitted')->useFilters()->dynamicPaginate();

        return AssignmentDocumentResource::collection($assignmentDocuments);
    }

    /**
     * Afficher un document
     *
     * @authenticated
     */
    public function show(AssignmentDocument $assignmentDocument): JsonResponse
    {
        return $this->responseSuccess(null, new AssignmentDocumentResource($assignmentDocument->load('assignment', 'document_transmitted')));
    }

   
}
