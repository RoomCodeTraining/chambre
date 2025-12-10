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
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('type')->default('sale')->nullable();
            $table->string('invoice_reference')->nullable();
            $table->string('payment_method')->default('cash')->nullable();
            $table->string('template')->default('B2C')->nullable();
            $table->boolean('is_fne')->default(false)->nullable();
            $table->string('foreign_currency')->nullable();
            $table->decimal('foreign_currency_rate', 18, 2)->default(0)->nullable();
            $table->decimal('discount', 18, 2)->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('invoice_reference');
        });
    }
};
