<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\VehicleAge;
use App\Models\VehicleGenre;
use Illuminate\Http\Request;
use App\Models\VehicleEnergy;
use App\Models\DepreciationTable;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Http\Requests\DepreciationTable\CreateMarketValueRequest;
use App\Http\Resources\DepreciationTable\DepreciationTableResource;
use App\Http\Requests\DepreciationTable\CreateDepreciationTableRequest;
use App\Http\Requests\DepreciationTable\UpdateDepreciationTableRequest;
use App\Http\Requests\DepreciationTable\CreateTheoricalMarketValueRequest;
use App\Services\MarketValue\MarketValueService;

/**
 * @group Gestion des tableaux de dépréciation
 *
 * APIs pour la gestion des tableaux de dépréciation
 */
class DepreciationTableController extends Controller
{
    use ApiResponse;

    public function __construct()
    {

    }

    /**
     * Lister tous les tableaux de dépréciation
     *
     * @authenticated
     */
    public function index(): AnonymousResourceCollection
    {
        $depreciationTables = DepreciationTable::with('vehicleGenre', 'vehicleAge', 'status')->latest('created_at')->useFilters()->dynamicPaginate();

        return DepreciationTableResource::collection($depreciationTables);
    }

    /**
     * Calculer la valeur vénale théorique d'un véhicule
     *
     * @authenticated
     */
    public function calculate_theoretical_market_value(CreateTheoricalMarketValueRequest $request): JsonResponse
    {
        $marketValueService = app(MarketValueService::class);
        $result = $marketValueService->calculateTheoreticalMarketValue($request->vehicle_genre_id, $request->vehicle_energy_id, $request->vehicle_new_value, $request->vehicle_mileage, $request->first_entry_into_circulation_date, $request->expertise_date);
        $result = (object) $result;

        $kilometric_incidence = 0;
        $is_up = null;
        if ($result->vehicle_energy && $result->vehicle_energy->code == 'VE01') {
            $max_mileage_essence_per_month = $result->vehicle_genre->max_mileage_essence_per_year / 12;
            $kilometric_incidence = (($max_mileage_essence_per_month * $result->month_diff) - $request->vehicle_mileage) * 25;
        } else {
            $max_mileage_diesel_per_month = $result->vehicle_genre->max_mileage_diesel_per_year / 12;
            $kilometric_incidence = (($max_mileage_diesel_per_month * $result->month_diff) - $request->vehicle_mileage) * 40;
        }

        if ($kilometric_incidence > 0) {
            $is_up = true;
        } else {
            $is_up = false;
        }

        $market_incidence_rate = $request->market_incidence_rate ?? 0;

        $market_incidence = ceil($result->vehicle_new_value * $market_incidence_rate / 100);

        if($market_incidence > $result->theorical_vehicle_market_value){
            $market_incidence = $result->theorical_vehicle_market_value / 2;
        }
        
        $vehicle_market_value = $result->theorical_vehicle_market_value + $market_incidence + $kilometric_incidence;

        $result = [
            'expertise_date' => $result->expertise_date,
            'first_entry_into_circulation_date' => $result->first_entry_into_circulation_date,
            'vehicle_new_value' => $result->vehicle_new_value,
            'year_diff' => $result->year_diff,
            'month_diff' => $result->month_diff,
            'vehicle_age' => $result->vehicle_age,
            'theorical_depreciation_rate' => $result->theorical_depreciation_rate,
            'theorical_vehicle_market_value' => $result->theorical_vehicle_market_value,
            'is_up' => $is_up,
            'market_incidence_rate' => $market_incidence_rate,
            'market_incidence' => $market_incidence,
            'kilometric_incidence' => $kilometric_incidence,
            'vehicle_market_value' => $vehicle_market_value,
        ];

        return $this->responseSuccess('DepreciationTable created successfully', $result);
    }

    // /**
    //  * Calculer la valeur vénale d'un véhicule
    //  *
    //  * @authenticated
    //  */
    // public function calculate_market_value(CreateMarketValueRequest $request): JsonResponse
    // {
    //     $year_diff = ceil(Carbon::parse($request->first_entry_into_circulation_date)->diffInYears($request->expertise_date));
    //     $month_diff = ceil(Carbon::parse($request->first_entry_into_circulation_date)->diffInMonths($request->expertise_date));
    //     $vehicle_genre = VehicleGenre::findOrFail($request->vehicle_genre_id);
    //     $vehicle_energy = VehicleEnergy::findOrFail($request->vehicle_energy_id);
    //     $vehicle_age = VehicleAge::firstWhere('value', $month_diff);
    //     $depreciation_table = DepreciationTable::where('vehicle_genre_id', $request->vehicle_genre_id)->where('vehicle_age_id', $vehicle_age->id)->firstOrFail();

    //     $kilometric_incidence = 0;
    //     $is_up = null;
    //     if ($vehicle_energy->code == 'VE01') {
    //         $kilometric_incidence = ($request->vehicle_mileage - ($vehicle_genre->max_mileage_essence_per_year * $year_diff)) * 25;
    //     } else {
    //         $kilometric_incidence = ($request->vehicle_mileage - ($vehicle_genre->max_mileage_diesel_per_year * $year_diff)) * 40;
    //     }

    //     if ($kilometric_incidence > 0) {
    //         $is_up = true;
    //     } else {
    //         $is_up = false;
    //     }

    //     $expertise_date = $request->expertise_date;
    //     $first_entry_into_circulation_date = $request->first_entry_into_circulation_date;
    //     $vehicle_new_value = $request->vehicle_new_value;
    //     $vehicle_age = $vehicle_age->value;
    //     $theorical_depreciation_rate = $depreciation_table->value;
    //     $theorical_vehicle_market_value = $vehicle_new_value - ($vehicle_new_value * $theorical_depreciation_rate / 100);

    //     $moins_value_work = 0;
    //     $market_incidence = $vehicle_new_value * $request->market_incidence_rate / 100;

    //     $vehicle_market_value = $theorical_vehicle_market_value + $market_incidence - $moins_value_work - $kilometric_incidence;




    //     return $this->responseSuccess('DepreciationTable created successfully', [
    //         'expertise_date' => $expertise_date,
    //         'first_entry_into_circulation_date' => $first_entry_into_circulation_date,
    //         'vehicle_new_value' => $vehicle_new_value,
    //         'vehicle_age' => $vehicle_age,
    //         'theorical_depreciation_rate' => $theorical_depreciation_rate,
    //         'theorical_vehicle_market_value' => $theorical_vehicle_market_value,
    //         'moins_value_work' => $moins_value_work,
    //         'is_up' => $is_up,
    //         'kilometric_incidence' => $kilometric_incidence,
    //         'market_incidence' => $market_incidence,
    //         'vehicle_market_value' => $vehicle_market_value,
    //     ]);
    // }

    /**
     * Créer un nouveau tableau de dépréciation
     *
     * @authenticated
     */
    public function store(CreateDepreciationTableRequest $request): JsonResponse
    {
        $depreciationTable = DepreciationTable::create([
            'value' => $request->value,
            'vehicle_genre_id' => $request->vehicle_genre_id,
            'vehicle_age_id' => $request->vehicle_age_id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseCreated('DepreciationTable created successfully', new DepreciationTableResource($depreciationTable));
    }

    /**
     * Afficher un tableau de dépréciation
     *
     * @authenticated
     */
    public function show($id): JsonResponse
    {
        $depreciationTable = DepreciationTable::findOrFail($id);
        return $this->responseSuccess(null, new DepreciationTableResource($depreciationTable));
    }

    /**
     * Mettre à jour un tableau de dépréciation
     *
     * @authenticated
     */
    public function update(UpdateDepreciationTableRequest $request, $id): JsonResponse
    {
        $depreciationTable = DepreciationTable::findOrFail($id);
        $depreciationTable->update([
            'value' => $request->value,
            'vehicle_genre_id' => $request->vehicle_genre_id,
            'vehicle_age_id' => $request->vehicle_age_id,
            'status_id' => Status::where('code', StatusEnum::ACTIVE)->first()->id,
            'updated_by' => auth()->user()->id,
        ]);

        return $this->responseSuccess('DepreciationTable updated Successfully', new DepreciationTableResource($depreciationTable));
    }

    /**
     * Supprimer un tableau de dépréciation
     *
     * @authenticated
     */
    public function destroy($id): JsonResponse
    {
        $depreciationTable = DepreciationTable::findOrFail($id);
        // $depreciationTable->delete();

        return $this->responseDeleted();
    }

   
}
