<?php

namespace App\Services\Deadline;

use Carbon\Carbon;
use App\Models\Status;
use App\Enums\StatusEnum;
use App\Models\Assignment;
use App\Models\StatusDeadline;
use App\Models\GeneralStatusDeadline;

class Deadline
{
    public static function calculateDeadline($assignment_id, $status_code) : array
    {
        $assignment = Assignment::findOrFail($assignment_id);
        $status = Status::where('code', $status_code)->first();
        $general_status_deadline = GeneralStatusDeadline::where('target_status_id', $status->id)->first();
        $deadline = StatusDeadline::where(['general_status_deadline_id' => $general_status_deadline?->id, 'entity_id' => $assignment->expert_firm_id])->first();
        
        $expiration_date = null;
        $expiration_per_cent = null;
        $expiration_at = null;
        $done_date = null;
        $done_per_cent = null;
        $done_at = null;
        $efficiency_per_cent = null;
        $status = null;

        
        if($deadline){
            $deadline->time_limit = $deadline->time_limit;

            $now = now();

            $created_at = Carbon::parse($assignment->created_at);

            $expiration_date = $created_at->diffInHours($now);
            $expiration_per_cent = $expiration_date * 100 / $deadline->time_limit;
            $expiration_at = dateTimeFormat($assignment->created_at->addHours($deadline->time_limit));
            $status = $expiration_per_cent > 100 ? "expired" : "in_progress";

            if($status_code == StatusEnum::PENDING_FOR_REPAIRER_QUOTE->value && $assignment->quote_validated_by_repairer_at){
                $done_date = $assignment->created_at->diffInHours($assignment->quote_validated_by_repairer_at);
                $done_per_cent = $done_date * 100 / $deadline->time_limit;
                $status = "done";
                $done_at = dateTimeFormat($assignment->quote_validated_by_repairer_at);
                $efficiency_per_cent = $assignment->quote_validated_by_repairer_at ? 100 - $done_per_cent : null;
            }

            if($status_code == StatusEnum::PENDING_FOR_REPAIRER_QUOTE_VALIDATION->value && $assignment->quote_validated_by_expert_at){
                $done_date = $assignment->created_at->diffInHours($assignment->quote_validated_by_expert_at);
                $done_per_cent = $done_date * 100 / $deadline->time_limit;
                $status = "done";
                $done_at = dateTimeFormat($assignment->quote_validated_by_expert_at);
                $efficiency_per_cent = $assignment->quote_validated_by_expert_at ? 100 - $done_per_cent : null;
            }

            if($status_code == StatusEnum::IN_EDITING->value && $assignment->validated_at){
                $done_date = $assignment->created_at->diffInHours($assignment->validated_at);
                $done_per_cent = $done_date * 100 / $deadline->time_limit;
                $status = "done";
                $done_at = dateTimeFormat($assignment->validated_at);
                $efficiency_per_cent = $assignment->validated_at ? 100 - $done_per_cent : null;
            }

            if($status_code == StatusEnum::PENDING_FOR_REPAIRER_VALIDATION->value && $assignment->validated_by_repairer_at){
                $done_date = $assignment->created_at->diffInHours($assignment->validated_by_repairer_at);
                $done_per_cent = $done_date * 100 / $deadline->time_limit;
                $status = "done";
                $done_at = dateTimeFormat($assignment->validated_by_repairer_at);
                $efficiency_per_cent = $assignment->validated_by_repairer_at ? 100 - $done_per_cent : null;
            }

            if($status_code == StatusEnum::PENDING_FOR_EXPERT_VALIDATION->value && $assignment->validated_by_expert_at){
                $done_date = $assignment->created_at->diffInHours($assignment->validated_by_expert_at);
                $done_per_cent = $done_date * 100 / $deadline->time_limit;
                $status = "done";
                $done_at = dateTimeFormat($assignment->validated_by_expert_at);
                $efficiency_per_cent = $assignment->validated_by_expert_at ? 100 - $done_per_cent : null;
            }

            if($status_code == StatusEnum::VALIDATED->value && $assignment->validated_at){
                $done_date = $assignment->created_at->diffInHours($assignment->validated_at);
                $done_per_cent = $done_date * 100 / $deadline->time_limit;
                $status = "done";
                $done_at = dateTimeFormat($assignment->validated_at);
                $efficiency_per_cent = $assignment->validated_at ? 100 - $done_per_cent : null;
            }

            if($status_code == StatusEnum::PAID->value && $assignment->paid_at){
                $done_date = $assignment->created_at->diffInHours($assignment->paid_at);
                $done_per_cent = $done_date * 100 / $deadline->time_limit;
                $status = "done";
                $done_at = dateTimeFormat($assignment->paid_at);
                $efficiency_per_cent = $assignment->paid_at ? 100 - $done_per_cent : null;
            }

        }
        return [
            'expiration_at' => $expiration_at,
            'expiration_per_cent' => floatval(number_format($expiration_per_cent, 2)),
            'done_at' => $done_at,
            'done_per_cent' => floatval(number_format($done_per_cent, 2)),
            'efficiency_per_cent' => floatval(number_format($efficiency_per_cent, 2)),
            'status' => $status
        ];
    }
}

