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
        Schema::table('shock_works', function (Blueprint $table) {
            $table->boolean('in_order')->default(false);
            $table->boolean('old_in_order')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shock_works', function (Blueprint $table) {
            $table->dropColumn('in_order');
            $table->dropColumn('old_in_order');
        });
    }
};
