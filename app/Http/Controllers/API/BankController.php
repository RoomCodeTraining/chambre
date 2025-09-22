<?php

namespace App\Http\Controllers\API;

use App\Models\Bank;
use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\Bank\BankResource;
use App\Http\Requests\Bank\CreateBankRequest;
use App\Http\Requests\Bank\UpdateBankRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des banques
 *
 * APIs pour la gestion des banques
 */
class BankController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les banques
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $banks = Bank::with('status:id,code,label', 'createdBy:id,name', 'updatedBy:id,name', 'deletedBy:id,name')
            ->useFilters()
            ->dynamicPaginate();

        return BankResource::collection($banks);
    }

    /**
     * Créer une nouvelle banque
     *
     * @authenticated
     */
    public function store(CreateBankRequest $request): JsonResponse
    {
        $code = strtolower(str_replace(' ', '', $request->name));

        $bank = Bank::create([
            'code' => $code,
            'name' => $request->name,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('Bank created successfully', new BankResource($bank));
    }

    /**
     * Afficher une banque
     *
     * @authenticated
     */
    public function show(Bank $bank): JsonResponse
    {
        return $this->responseSuccess(null, new BankResource($bank->load('status:id,code,label', 'createdBy:id,name', 'updatedBy:id,name', 'deletedBy:id,name')));
    }

    /**
     * Mettre à jour une banque
     *
     * @authenticated
     */
    public function update(UpdateBankRequest $request, $id): JsonResponse
    {
        $bank = Bank::findOrFail($id);
        $bank->update([
            'name' => $request->name,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('Bank updated Successfully', new BankResource($bank));
    }

    /**
     * Supprimer une banque
     *
     * @authenticated
     */
    public function destroy(Bank $bank): JsonResponse
    {
        // $bank->delete();

        return $this->responseDeleted();
    }

   
}
