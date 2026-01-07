<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('assignments', function (Blueprint $table) {
            $table->unsignedBigInteger('unvalidated_by')->index()->nullable();
            $table->timestamp('unvalidated_at')->nullable();
            $table->text('unvalidation_reason')->nullable();

            $table->text('conditions')->nullable();

            $table->text('cancellation_reason')->nullable();
            $table->text('closing_reason')->nullable();

            $table->unsignedBigInteger('classified_without_further_action_by')->index()->nullable();
            $table->timestamp('classified_without_further_action_at')->nullable();

            $table->text('unvalidation_by_expert_reason')->nullable();
            $table->text('unvalidation_by_repairer_reason')->nullable();
            $table->text('quote_unvalidation_by_repairer_reason')->nullable();
            $table->text('quote_unvalidation_by_expert_reason')->nullable();

            $table->boolean('required_for_repairer_quote_validation')->default(false)->nullable();
            $table->boolean('required_for_repairer_validation')->default(false)->nullable();

            $table->foreign('unvalidated_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assignments', function (Blueprint $table) {
            $table->dropConstrainedForeignId('unvalidated_by');
            $table->dropColumn('unvalidated_at');
            $table->dropColumn('unvalidation_reason');
            $table->dropColumn('unvalidation_by_expert_reason');
            $table->dropColumn('unvalidation_by_repairer_reason');
            $table->dropColumn('quote_unvalidation_by_repairer_reason');
            $table->dropColumn('quote_unvalidation_by_expert_reason');
            $table->dropColumn('cancellation_reason');
            $table->dropColumn('closing_reason');
        });
    }
};
