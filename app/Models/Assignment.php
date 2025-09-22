<?php

namespace App\Models;

use App\Filters\AssignmentFilters;
use Essa\APIToolKit\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Builders\Assignment\AssignmentBuilder;
use Deligoez\LaravelModelHashId\Traits\HasHashId;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Deligoez\LaravelModelHashId\Traits\HasHashIdRouting;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Assignment extends Model
{
    use Filterable;
    use HasFactory;
    use HasHashId;
    use HasHashIdRouting;
    use SoftDeletes;

    protected string $default_filters = AssignmentFilters::class;

    /**
     * Mass-assignable attributes.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the expert firm entity for this assignment
     */
    public function expertFirm(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'expert_firm_id');
    }

    /**
     * Get the insurer entity for this assignment
     */
    public function insurer(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'insurer_id');
    }

    /**
     * Get the additional insurer for this assignment
     */
    public function additionalInsurer(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'additional_insurer_id');
    }

    /**
     * Get the repairer entity for this assignment
     */
    public function repairer(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'repairer_id');
    }

    /**
     * Get the client for this assignment
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the vehicle for this assignment
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    /**
     * Get the assignment type for this assignment
     */
    public function assignmentType(): BelongsTo
    {
        return $this->belongsTo(AssignmentType::class);
    }

    /**
     * Get the expertise type for this assignment
     */
    public function expertiseType(): BelongsTo
    {
        return $this->belongsTo(ExpertiseType::class);
    }

    /**
     * Get the document transmitted for this assignment
     */
    public function documentTransmitted(): BelongsTo
    {
        return $this->belongsTo(DocumentTransmitted::class);
    }

    /**
     * Get the claim nature for this assignment
     */
    public function claimNature(): BelongsTo
    {
        return $this->belongsTo(ClaimNature::class);
    }

    /**
     * Get the technical conclusion for this assignment
     */
    public function technicalConclusion(): BelongsTo
    {
        return $this->belongsTo(TechnicalConclusion::class);
    }

    /**
     * Get the general state for this assignment
     */
    public function generalState(): BelongsTo
    {
        return $this->belongsTo(GeneralState::class);
    }

    /**
     * Get the work sheet remark for this assignment
     */
    public function workSheetRemark(): BelongsTo
    {
        return $this->belongsTo(Remark::class, 'work_sheet_remark_id');
    }

    /**
     * Get the report remark for this assignment
     */
    public function reportRemark(): BelongsTo
    {
        return $this->belongsTo(Remark::class, 'report_remark_id');
    }

    /**
     * Get the user who directed this assignment
     */
    public function directedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'directed_by');
    }

    /**
     * Get the user who directed this assignment
     */
    public function workSheetEstablishedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'work_sheet_established_by');
    }

    /**
     * Get the status of this assignment
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get the user who created this assignment
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who realized this assignment
     */
    public function openedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this assignment
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the user who deleted this assignment
     */
    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    /**
     * Get the user who closed this assignment
     */
    public function closedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'closed_by');
    }

    /**
     * Get the user who cancelled this assignment
     */
    public function cancelledBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'cancelled_by');
    }

    /**
     * Get the user who edited this assignment
     */
    public function editedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'edited_by');
    }

    /**
     * Get the user who realized this assignment
     */
    public function realizedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'realized_by');
    }

    /**
     * Get the user who repairer validated this assignment
     */
    public function repairerValidatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'repairer_validation_by');
    }

    /**
     * Get the user who expert validated this assignment
     */
    public function expertValidatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'expert_validation_by');
    }

    /**
     * Get the user who validated this assignment
     */
    public function validatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'validated_by');
    }

    /**
     * Get the user who updated the reference of this assignment
     */
    public function referenceUpdatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reference_updated_by');
    }

    /**
     * Get the other costs for this assignment
     */
    public function otherCosts(): HasMany
    {
        return $this->hasMany(OtherCost::class);
    }

    /**
     * Get the shocks for this assignment
     */
    public function shocks(): HasMany
    {
        return $this->hasMany(Shock::class);
    }

    /**
     * Get the receipts for this assignment
     */
    public function receipts(): HasMany
    {
        return $this->hasMany(Receipt::class);
    }

    /**
     * Get the photos for this assignment
     */
    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    /**
     * Get the payments for this assignment
     */
    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Get the invoices for this assignment
     */
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * Get the ascertainments for this assignment
     */
    public function ascertainments(): HasMany
    {
        return $this->hasMany(Ascertainment::class);
    }

    public function newEloquentBuilder($query): AssignmentBuilder
    {
        return new AssignmentBuilder($query);
    }
}
