<?php

namespace App\Services\MarketValue;

use Carbon\Carbon;
use App\Models\VehicleGenre;
use App\Models\VehicleEnergy;
use App\Models\VehicleAge;
use App\Models\DepreciationTable;

class MarketValueService
{
    public function calculateTheoreticalMarketValue($vehicle_genre_id, $vehicle_energy_id, $vehicle_new_value, $vehicle_mileage, $first_entry_into_circulation_date, $expertise_date)
    {
        $year_diff = ceil(Carbon::parse($first_entry_into_circulation_date)->diffInYears($expertise_date));
        $month_diff = ceil(Carbon::parse($first_entry_into_circulation_date)->diffInMonths($expertise_date));
        $vehicle_genre = VehicleGenre::select('id', 'label', 'max_mileage_essence_per_year', 'max_mileage_diesel_per_year')->find($vehicle_genre_id);
        $vehicle_energy = VehicleEnergy::select('id', 'label', 'code')->find($vehicle_energy_id);
        $vehicle_age = VehicleAge::firstWhere('value', $month_diff);
        if($vehicle_age){
            $depreciation_table = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age->id)->first();

            $vehicle_age = $vehicle_age->value;
            $theorical_depreciation_rate = $depreciation_table->value ?? 0;
            $theorical_vehicle_market_value = ceil($vehicle_new_value - ($vehicle_new_value * $theorical_depreciation_rate / 100));

            return [
                'expertise_date' => $expertise_date,
                'first_entry_into_circulation_date' => $first_entry_into_circulation_date,
                'vehicle_new_value' => $vehicle_new_value,
                'year_diff' => $year_diff,
                'month_diff' => $month_diff,
                'vehicle_age' => $vehicle_age,
                'theorical_depreciation_rate' => $theorical_depreciation_rate,
                'theorical_vehicle_market_value' => $theorical_vehicle_market_value,
                'vehicle_genre' => $vehicle_genre,
                'vehicle_energy' => $vehicle_energy,
            ];
        } else {
            return [
                'expertise_date' => $expertise_date,
                'first_entry_into_circulation_date' => $first_entry_into_circulation_date,
                'vehicle_new_value' => $vehicle_new_value,
                'year_diff' => $year_diff,
                'month_diff' => $month_diff,
                'vehicle_age' => 0,
                'theorical_depreciation_rate' => 0,
                'theorical_vehicle_market_value' => 0,
                'vehicle_genre' => $vehicle_genre,
                'vehicle_energy' => $vehicle_energy,
            ];
        }
        
    }
}