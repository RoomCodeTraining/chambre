<?php

namespace App\Http\Controllers\API;

use App\Models\Client;
use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\Client\ClientResource;
use App\Http\Requests\Client\CreateClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des clients
 *
 * APIs pour la gestion des clients
 */

class ClientController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les clients
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $clients = Client::with('createdBy:id,code,last_name,first_name', 'updatedBy:id,code,last_name,first_name')
                    ->useFilters()
                    ->latest('created_at')
                    ->dynamicPaginate();

        return ClientResource::collection($clients);
    }

    /**
     * Ajouter un client
     *
     * @authenticated
     */
    public function store(CreateClientRequest $request): JsonResponse
    {
        $phone_1 = str_replace(' ', '', $request->phone_1);
        if(!$phone_1){
            $client = Client::create([
                'name' => $request->name,
                'email' => strtolower($request->email),
                'phone_1' => $phone_1,
                'phone_2' => $request->phone_2,
                'address' => $request->address,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
        } else {
            $exist = Client::select("*")
                ->where('name', $request->name)
                ->where('phone_1', $phone_1)
                ->count();

            if($exist > 0){

                $client = Client::select("*")
                    ->where('name', $request->name)
                    ->where('phone_1', $phone_1)
                    ->first();

                $client->update([
                    'name' => $request->name,
                    'email' => strtolower($request->email),
                    'phone_1' => $phone_1,
                    'phone_2' => $request->phone_2,
                    'address' => $request->address,
                    'updated_by' => auth()->user()->id,
                ]);

            } else{
                $client = Client::create([
                    'name' => $request->name,
                    'email' => strtolower($request->email),
                    'phone_1' => $phone_1,
                    'phone_2' => $request->phone_2,
                    'address' => $request->address,
                    'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                    'created_by' => auth()->user()->id,
                    'updated_by' => auth()->user()->id,
                ]);
            }
        }

        return $this->responseCreated('Client created successfully', new ClientResource($client));
    }

    /**
     * Afficher un client
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $client = Client::findOrFail(Client::keyFromHashId($id));

        return $this->responseSuccess(null, new ClientResource($client));
    }

    /**
     * Mettre à jour un client
     *
     * @authenticated
     */
    public function update(UpdateClientRequest $request, $id): JsonResponse
    {
        $client = Client::findOrFail(Client::keyFromHashId($id));

        $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_1' => $request->phone_1,
            'phone_2' => $request->phone_2,
            'address' => $request->address,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('Client updated Successfully', new ClientResource($client));
    }

    /**
     * Supprimer un client
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $client = Client::findOrFail(Client::keyFromHashId($id));

        // $client->delete();

        return $this->responseDeleted();
    }

   
}
