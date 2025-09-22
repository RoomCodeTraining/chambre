<?php

namespace App\Services\WorkDuration;

use Carbon\Carbon;
use App\Models\VehicleGenre;
use App\Models\VehicleEnergy;
use App\Models\VehicleAge;
use App\Models\DepreciationTable;

class WorkDurationService
{
    public function calculateWorkDuration($total_nb_hours)
    {
        $work_duration = null;
        if ($total_nb_hours > 0) {
            if ($total_nb_hours > 0 && $total_nb_hours <= 5) {
                $work_duration = "1/2 Jour";
            } elseif ($total_nb_hours > 5 && $total_nb_hours <= 10) {
                $work_duration = '1 Jour';
            } elseif ($total_nb_hours > 10 && $total_nb_hours <= 15) {
                $work_duration = '1 Jour et 1/2';
            } elseif ($total_nb_hours > 15 && $total_nb_hours <= 20) {
                $work_duration = '2 Jours';
            } elseif ($total_nb_hours > 20 && $total_nb_hours <= 30) {
                $work_duration = '3 Jours';
            } elseif ($total_nb_hours > 30 && $total_nb_hours <= 40) {
                $work_duration = '4 Jours';
            } elseif ($total_nb_hours > 40 && $total_nb_hours <= 60) {
                $work_duration = '5 Jours';
            } elseif ($total_nb_hours > 60 && $total_nb_hours <= 70) {
                $work_duration = '7 Jours';
            } elseif ($total_nb_hours > 70 && $total_nb_hours <= 80) {
                $work_duration = '8 Jours';
            } elseif ($total_nb_hours > 80 && $total_nb_hours <= 100) {
                $work_duration = '9 Jours';
            } elseif ($total_nb_hours > 100 && $total_nb_hours <= 120) {
                $work_duration = '10 Jours';
            } elseif ($total_nb_hours > 120 && $total_nb_hours <= 150) {
                $work_duration = '12 Jours';
            } elseif ($total_nb_hours > 150 && $total_nb_hours <= 200) {
                $work_duration = '15 Jours';
            } elseif ($total_nb_hours > 200 && $total_nb_hours <= 300) {
                $work_duration = '20 Jours';
            } 
        } else {
            $work_duration = null;
        }
        return $work_duration;
        
    }
}