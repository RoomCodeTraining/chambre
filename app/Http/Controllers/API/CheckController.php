<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\Check\UpdateCheckRequest;
use App\Http\Requests\Check\CreateCheckRequest;
use App\Http\Resources\Check\CheckResource;
use App\Models\Check;
use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Essa\APIToolKit\Api\ApiResponse;

/**
 * @group Gestion des chèques
 *
 * APIs pour la gestion des chèques
 */
class CheckController extends Controller
{
    use ApiResponse;
    
    public function __construct()
    {

    }

    /**
     * Lister tous les chèques
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $checks = Check::with('payment', 'bank', 'status:id,code,label', 'createdBy:id,name', 'updatedBy:id,name', 'deletedBy:id,name')
            ->join('payments', 'checks.payment_id', '=', 'payments.id')
            ->join('assignments', 'payments.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->useFilters()
            ->latest('created_at')
            ->dynamicPaginate();

        return CheckResource::collection($checks);
    }

    /**
     * Créer un chèque
     *
     * @authenticated
     */
    public function store(CreateCheckRequest $request): JsonResponse
    {
        $now = Carbon::now();
        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;
        $reference = 'CHQ_'.$today;

        if($request->hasfile('photo'))
        {
            $file = $request->file('photo');
            // $name = 'IMG_BP'.$today.'_'.$count.'.'.$file->getClientOriginalExtension();
            $name = 'CHQ_'.$today.'.png';
            $file->move(public_path('storage/checks'), $name);

            $check = Check::create([
                'reference' => $reference,
                'date' => $request->date,
                'amount' => $request->amount,
                'photo' => $name,
                'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id,
            ]);
        }

        return $this->responseCreated('Check created successfully', new CheckResource($check));
    }

    /**
     * Afficher un chèque
     *
     * @authenticated
     */
    public function show(Check $check): JsonResponse
    {
        $check = Check::with('payment', 'bank', 'status:id,code,label', 'createdBy:id,name', 'updatedBy:id,name', 'deletedBy:id,name')
            ->join('payments', 'checks.payment_id', '=', 'payments.id')
            ->join('assignments', 'payments.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('checks.id', $check->id)
            ->first();

        return $this->responseSuccess(null, new CheckResource($check));
    }

    /**
     * Mettre à jour un chèque
     *
     * @authenticated
     */
    public function update(UpdateCheckRequest $request, $id): JsonResponse
    {
        $check = Check::with('payment', 'bank', 'status:id,code,label', 'createdBy:id,name', 'updatedBy:id,name', 'deletedBy:id,name')
            ->join('payments', 'checks.payment_id', '=', 'payments.id')
            ->join('assignments', 'payments.assignment_id', '=', 'assignments.id')
            ->accessibleBy(auth()->user())
            ->where('checks.id', $id)
            ->firstOrFail();

        $check->update([
            'payment_id' => $request->payment_id,
            'bank_id' => $request->bank_id,
            'date' => $request->date,
            'amount' => $request->amount,
            'updated_by' => auth()->user()->id,
        ]);

        if(isset($request->photo) && $request->hasfile('photo'))
        {
            $file = $request->file('photo');
            $file->move(public_path('storage/checks'), $check->photo);
        }

        return $this->responseSuccess('Check updated Successfully', new CheckResource($check));
    }

    /**
     * Supprimer un chèque
     *
     * @authenticated
     */
    public function destroy(Check $check): JsonResponse
    {
        // $check->delete();

        return $this->responseDeleted();
    }

   
}
