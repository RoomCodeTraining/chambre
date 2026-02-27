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
            $month_diff = floatval(str_replace(',', '.', $month_diff));
            if($month_diff <= 60) {
                $depreciation_table = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age->id)->first();
                $theorical_depreciation_rate = $depreciation_table->value ?? 0;
            } else if($month_diff > 60 && $month_diff <= 84){
                if($month_diff > 60 && $month_diff <= 66){
                    $vehicle_age_min = VehicleAge::firstWhere('value', 60);
                    $depreciation_table_min = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age_min->id)->first()->value ?? 0;

                    $vehicle_age_max = VehicleAge::firstWhere('value', 66);
                    $depreciation_table_max = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age_max->id)->first()->value ?? 0;

                } else if($month_diff > 66 && $month_diff <= 72){
                    $vehicle_age_min = VehicleAge::firstWhere('value', 66);
                    $depreciation_table_min = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age_min->id)->first()->value ?? 0;

                    $vehicle_age_max = VehicleAge::firstWhere('value', 72);
                    $depreciation_table_max = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age_max->id)->first()->value ?? 0;

                } else if($month_diff > 72 && $month_diff <= 78){
                    $vehicle_age_min = VehicleAge::firstWhere('value', 72);
                    $depreciation_table_min = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age_min->id)->first()->value ?? 0;

                    $vehicle_age_max = VehicleAge::firstWhere('value', 78);
                    $depreciation_table_max = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age_max->id)->first()->value ?? 0;

                } else if($month_diff > 78 && $month_diff <= 84){
                    $vehicle_age_min = VehicleAge::firstWhere('value', 78);
                    $depreciation_table_min = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age_min->id)->first()->value ?? 0;

                    $vehicle_age_max = VehicleAge::firstWhere('value', 84);
                    $depreciation_table_max = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age_max->id)->first()->value ?? 0;

                }

                $theorical_depreciation_rate = number_format((((($depreciation_table_max - $depreciation_table_min) * ($vehicle_age->value - $vehicle_age_min->value)) / 6) + $depreciation_table_min), 2, ',', '');
                $theorical_depreciation_rate = floatval(str_replace(',', '.', $theorical_depreciation_rate));

            } else if($month_diff > 84 && $month_diff <= 120){
                if($month_diff > 84 && $month_diff <= 96){
                    $vehicle_age_min = VehicleAge::firstWhere('value', 84);
                    $depreciation_table_min = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age_min->id)->first()->value ?? 0;

                    $vehicle_age_max = VehicleAge::firstWhere('value', 96);
                    $depreciation_table_max = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age_max->id)->first()->value ?? 0;

                } else if($month_diff > 96 && $month_diff <= 108){
                    $vehicle_age_min = VehicleAge::firstWhere('value', 96);
                    $depreciation_table_min = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age_min->id)->first()->value ?? 0;

                    $vehicle_age_max = VehicleAge::firstWhere('value', 108);
                    $depreciation_table_max = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age_max->id)->first()->value ?? 0;

                } else if($month_diff > 108 && $month_diff <= 120){
                    $vehicle_age_min = VehicleAge::firstWhere('value', 108);
                    $depreciation_table_min = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age_min->id)->first()->value ?? 0;

                    $vehicle_age_max = VehicleAge::firstWhere('value', 120);
                    $depreciation_table_max = DepreciationTable::where('vehicle_genre_id', $vehicle_genre_id)->where('vehicle_age_id', $vehicle_age_max->id)->first()->value ?? 0;

                }
                $theorical_depreciation_rate = number_format((((($depreciation_table_max - $depreciation_table_min) * ($vehicle_age->value - $vehicle_age_min->value)) / 12) + $depreciation_table_min), 2, ',', '');
                $theorical_depreciation_rate = floatval(str_replace(',', '.', $theorical_depreciation_rate));
            }

            $vehicle_age = $vehicle_age->value;
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
            $theorical_depreciation_rate = 90;
            $theorical_vehicle_market_value = ceil($vehicle_new_value - ($vehicle_new_value * $theorical_depreciation_rate / 100));
            return [
                'expertise_date' => $expertise_date,
                'first_entry_into_circulation_date' => $first_entry_into_circulation_date,
                'vehicle_new_value' => $vehicle_new_value,
                'year_diff' => $year_diff,
                'month_diff' => $month_diff,
                'vehicle_age' => $month_diff,
                'theorical_depreciation_rate' => $theorical_depreciation_rate,
                'theorical_vehicle_market_value' => $theorical_vehicle_market_value,
                'vehicle_genre' => $vehicle_genre,
                'vehicle_energy' => $vehicle_energy,
            ];
        }
        
    }
}