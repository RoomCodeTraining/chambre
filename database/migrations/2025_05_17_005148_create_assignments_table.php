<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('reference')->unique();
            $table->string('policy_number')->nullable();
            $table->string('claim_number')->nullable();
            $table->date('claim_date')->nullable();
            $table->date('expertise_date')->nullable();
            $table->string('expertise_place')->nullable();
            $table->date('received_at')->nullable();
            $table->text('damage_declared')->nullable();
            $table->text('point_noted')->nullable();
            $table->text('document_transmitted_id')->nullable();
            $table->date('seen_before_work_date')->nullable();
            $table->date('seen_during_work_date')->nullable();
            $table->date('seen_after_work_date')->nullable();
            $table->decimal('assured_value', 18, 2)->nullable();
            $table->decimal('salvage_value', 18, 2)->nullable();
            $table->decimal('new_market_value', 18, 2)->nullable();
            $table->decimal('depreciation_rate', 5, 2)->nullable();
            $table->decimal('market_value', 18, 2)->nullable();
            $table->string('work_duration')->nullable();
            $table->text('expert_work_sheet_remark')->nullable();
            $table->text('expert_report_remark')->nullable();
            $table->text('instructions')->nullable();
            $table->decimal('shock_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('shock_amount_tax', 18, 2)->nullable();
            $table->decimal('shock_amount', 18, 2)->nullable();
            $table->decimal('other_cost_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('other_cost_amount_tax', 18, 2)->nullable();
            $table->decimal('other_cost_amount', 18, 2)->nullable();
            $table->decimal('receipt_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('receipt_amount_tax', 18, 2)->nullable();
            $table->decimal('receipt_amount', 18, 2)->nullable();
            $table->decimal('ascertainment_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('ascertainment_amount_tax', 18, 2)->nullable();
            $table->decimal('ascertainment_amount', 18, 2)->nullable();
            $table->decimal('total_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('total_amount_tax', 18, 2)->nullable();
            $table->decimal('total_amount', 18, 2)->nullable();
            $table->text('evaluations')->nullable();
            $table->text('emails')->nullable();
            $table->text('expert_signature')->nullable();
            $table->text('repairer_signature')->nullable();
            $table->text('customer_signature')->nullable();
            $table->timestamp('printed_at')->nullable();
            $table->text('expertise_sheet')->nullable();
            $table->text('expertise_report')->nullable();
            $table->unsignedBigInteger('expert_firm_id')->index()->nullable();
            $table->unsignedBigInteger('insurer_id')->index()->nullable();
            $table->unsignedBigInteger('additional_insurer_id')->index()->nullable();
            $table->unsignedBigInteger('repairer_id')->index()->nullable();
            $table->unsignedBigInteger('client_id')->index()->nullable();
            $table->unsignedBigInteger('vehicle_id')->index()->nullable();
            $table->unsignedBigInteger('assignment_type_id')->index()->nullable();
            $table->unsignedBigInteger('expertise_type_id')->index()->nullable();
            $table->unsignedBigInteger('claim_nature_id')->index()->nullable();
            $table->unsignedBigInteger('technical_conclusion_id')->index()->nullable();
            $table->unsignedBigInteger('general_state_id')->index()->nullable();
            $table->unsignedBigInteger('work_sheet_remark_id')->index()->nullable();
            $table->unsignedBigInteger('report_remark_id')->index()->nullable();
            $table->unsignedBigInteger('assignment_request_id')->index()->nullable();
            $table->unsignedBigInteger('status_id')->index()->nullable();
            $table->unsignedBigInteger('directed_by')->index()->nullable();
            $table->unsignedBigInteger('work_sheet_established_by')->index()->nullable();
            $table->timestamp('work_sheet_established_at')->nullable();
            $table->unsignedBigInteger('realized_by')->index()->nullable();
            $table->timestamp('realized_at')->nullable();
            $table->unsignedBigInteger('repairer_validation_by')->index()->nullable();
            $table->timestamp('repairer_validation_at')->nullable();
            $table->unsignedBigInteger('expert_validation_by')->index()->nullable();
            $table->timestamp('expert_validation_at')->nullable();
            $table->unsignedBigInteger('edited_by')->index()->nullable();
            $table->timestamp('edited_at')->nullable();
            $table->unsignedBigInteger('validated_by')->index()->nullable();
            $table->timestamp('validated_at')->nullable();
            $table->unsignedBigInteger('closed_by')->index()->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->unsignedBigInteger('cancelled_by')->index()->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('deleted_by')->index()->nullable();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('expert_firm_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('insurer_id')
                ->references('id')
                ->on('entities')
                ->onDelete('cascade');

            $table->foreign('additional_insurer_id')
                ->references('id')
                ->on('entities')
                ->onDelete('cascade');

            $table->foreign('repairer_id')
                ->references('id')
                ->on('entities')
                ->onDelete('cascade');

            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onDelete('cascade');

            $table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles')
                ->onDelete('cascade');

            $table->foreign('assignment_type_id')
                ->references('id')
                ->on('assignment_types')
                ->onDelete('cascade');

            $table->foreign('expertise_type_id')
                ->references('id')
                ->on('expertise_types')
                ->onDelete('cascade');

            $table->foreign('claim_nature_id')
                ->references('id')
                ->on('claim_natures')
                ->onDelete('cascade');

            $table->foreign('technical_conclusion_id')
                ->references('id')
                ->on('technical_conclusions')
                ->onDelete('cascade');

            $table->foreign('general_state_id')
                ->references('id')
                ->on('general_states')
                ->onDelete('cascade');

            $table->foreign('work_sheet_remark_id')
                ->references('id')
                ->on('remarks')
                ->onDelete('cascade');

            $table->foreign('report_remark_id')
                ->references('id')
                ->on('remarks')
                ->onDelete('cascade');

            $table->foreign('assignment_request_id')
                ->references('id')
                ->on('assignment_requests')
                ->onDelete('cascade');

            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onDelete('cascade');

            $table->foreign('directed_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('work_sheet_established_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('realized_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('repairer_validation_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('expert_validation_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('edited_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('validated_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('closed_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('cancelled_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('updated_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('deleted_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
