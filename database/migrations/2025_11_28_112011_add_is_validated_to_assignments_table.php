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
            $table->unsignedBigInteger('validated_by_repairer_by')->index()->nullable();
            $table->timestamp('validated_by_repairer_at')->nullable();
            $table->unsignedBigInteger('unvalidated_by_repairer_by')->index()->nullable();
            $table->timestamp('unvalidated_by_repairer_at')->nullable();

            $table->unsignedBigInteger('validated_by_expert_by')->index()->nullable();
            $table->timestamp('validated_by_expert_at')->nullable();
            $table->unsignedBigInteger('unvalidated_by_expert_by')->index()->nullable();
            $table->timestamp('unvalidated_by_expert_at')->nullable();

            $table->foreign('validated_by_repairer_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('unvalidated_by_repairer_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('validated_by_expert_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('unvalidated_by_expert_by')
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
            //
        });
    }
};
