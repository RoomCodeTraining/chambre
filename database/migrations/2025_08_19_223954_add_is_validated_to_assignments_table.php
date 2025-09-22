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
            $table->boolean('is_validated')->default(false);
            $table->boolean('is_validated_by_repairer')->default(false);
            $table->boolean('is_validated_by_expert')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assignments', function (Blueprint $table) {
            $table->dropColumn('is_validated');
            $table->dropColumn('is_validated_by_repairer');
            $table->dropColumn('is_validated_by_expert');
        });
    }
};
