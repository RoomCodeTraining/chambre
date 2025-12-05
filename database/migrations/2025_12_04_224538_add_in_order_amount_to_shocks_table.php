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
        Schema::table('shocks', function (Blueprint $table) {
            $table->decimal('shock_work_in_order_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('shock_work_in_order_amount_tax', 18, 2)->nullable();
            $table->decimal('shock_work_in_order_amount', 18, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shocks', function (Blueprint $table) {
            $table->dropColumn('shock_work_in_order_amount_excluding_tax');
            $table->dropColumn('shock_work_in_order_amount_tax');
            $table->dropColumn('shock_work_in_order_amount');
        });
    }
};
