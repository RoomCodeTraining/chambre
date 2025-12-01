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
            $table->boolean('agreement_for_work_subject_to_conditions')->default(false);

            $table->boolean('quote_validated')->default(false);
            $table->boolean('quote_validated_by_repairer')->default(false);
            $table->unsignedBigInteger('quote_validated_by_repairer_by')->index()->nullable();
            $table->timestamp('quote_validated_by_repairer_at')->nullable();
            $table->unsignedBigInteger('quote_unvalidated_by_repairer_by')->index()->nullable();
            $table->timestamp('quote_unvalidated_by_repairer_at')->nullable();

            $table->boolean('quote_validated_by_expert')->default(false);
            $table->unsignedBigInteger('quote_validated_by_expert_by')->index()->nullable();
            $table->timestamp('quote_validated_by_expert_at')->nullable();
            $table->unsignedBigInteger('quote_unvalidated_by_expert_by')->index()->nullable();
            $table->timestamp('quote_unvalidated_by_expert_at')->nullable();

            $table->foreign('quote_validated_by_repairer_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('quote_unvalidated_by_repairer_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('quote_validated_by_expert_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('quote_unvalidated_by_expert_by')
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
            $table->dropColumn('agreement_for_work_subject_to_conditions');
            $table->dropColumn('quote_validated');
            $table->dropColumn('quote_validated_by_repairer');
            $table->dropConstrainedForeignId('quote_validated_by_repairer_by');
            $table->dropColumn('quote_validated_by_repairer_at');
            $table->dropConstrainedForeignId('quote_unvalidated_by_repairer_by');
            $table->dropColumn('quote_unvalidated_by_repairer_at');
            $table->dropColumn('quote_validated_by_expert');
            $table->dropConstrainedForeignId('quote_validated_by_expert_by');
            $table->dropColumn('quote_validated_by_expert_at');
            $table->dropConstrainedForeignId('quote_unvalidated_by_expert_by');
            $table->dropColumn('quote_unvalidated_by_expert_at');
        });
    }
};
