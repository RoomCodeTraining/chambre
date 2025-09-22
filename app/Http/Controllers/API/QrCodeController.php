<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\QrCode;
use App\Models\Status;
use App\Enums\StatusEnum;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use App\Http\Resources\QrCode\QrCodeResource;
use App\Http\Requests\QrCode\CreateQrCodeRequest;
use App\Http\Requests\QrCode\UpdateQrCodeRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGen;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des QR codes
 *
 * APIs pour la gestion des QR codes
 */
class QrCodeController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les QR codes
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $qrCodes = QrCode::useFilters()->dynamicPaginate();

        return QrCodeResource::collection($qrCodes);
    }

    /**
     * Ajouter un QR code
     *
     * @authenticated
     */
    public function store(CreateQrCodeRequest $request): JsonResponse
    {
        // $qrCode = QrCode::create($request->validated());

        $now = Carbon::now();
        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;
        $qr_code = 'QR_'.$today.'.png';

        QrCodeGen::format('png')
            ->size(300)
            ->generate($request->code, public_path('storage/qr_codes/'.$qr_code));

        QrCode::query()->update([
            'status_id' => Status::where('code', StatusEnum::INACTIVE)->first()->id,
        ]);

        $qrCode = QrCode::create([
            'code' => $request->code,
            'qr_code' => $qr_code,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('QrCode created successfully', new QrCodeResource($qrCode));
    }

    /**
     * Afficher un QR code
     *
     * @authenticated
     */
    public function show(QrCode $qrCode): JsonResponse
    {
        return $this->responseSuccess(null, new QrCodeResource($qrCode));
    }

    /**
     * Mettre à jour un QR code
     *
     * @authenticated
     */
    public function update(UpdateQrCodeRequest $request, $id): JsonResponse
    {
        $qrCode = QrCode::findOrFail($id);

        $now = Carbon::now();
        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;
        $qr_code = 'QR_'.$today.'.png';

        File::delete(public_path('storage/qr_codes/'.$qrCode->qr_code));

        QrCode::format('png')
            ->size(300)
            ->generate($request->code, public_path('storage/qr_codes/'.$qr_code));

        $qrCode->update([
            'code' => $request->code,
            'qr_code' => $qr_code,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('QrCode updated Successfully', new QrCodeResource($qrCode));
    }

    /**
     * Activer un QR code
     *
     * @authenticated
     */
    public function enable($id): JsonResponse
    {
        $qrCode = QrCode::findOrFail($id);

        QrCode::query()->update([
            'status_id' => Status::where('code', StatusEnum::INACTIVE)->first()->id,
        ]);

        $qrCode->update([
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
        ]);

        return $this->responseSuccess('QrCode enabled Successfully', new QrCodeResource($qrCode));
    }

    /**
     * Désactiver un QR code
     *
     * @authenticated
     */
    public function disable($id): JsonResponse
    {
        $qrCode = QrCode::findOrFail($id);

        $qrCode->update([
            'status_id' => Status::where('code', StatusEnum::INACTIVE)->first()->id,
        ]);

        return $this->responseSuccess('QrCode disabled Successfully', new QrCodeResource($qrCode));
    }

    /**
     * Supprimer un QR code
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $qrCode = QrCode::findOrFail($id);

        File::delete(public_path('storage/qr_codes/'.$qrCode->qr_code));

        $qrCode->update([
            'status_id' => Status::where('code', StatusEnum::DELETED)->first()->id,
            'deleted_at' => now(),
            'deleted_by' => auth()->user()->id,
        ]);

        return $this->responseDeleted();
    }

   
}
