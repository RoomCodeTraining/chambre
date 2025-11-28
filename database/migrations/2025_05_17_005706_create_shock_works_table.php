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
        Schema::create('shock_works', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('shock_id')->index()->nullable();
            $table->unsignedBigInteger('old_shock_id')->index()->nullable();
            $table->unsignedBigInteger('supply_id')->index()->nullable();
            $table->unsignedBigInteger('old_supply_id')->index()->nullable();
            $table->boolean('disassembly')->default(false);
            $table->boolean('old_disassembly')->default(false);
            $table->boolean('replacement')->default(false);
            $table->boolean('old_replacement')->default(false);
            $table->boolean('repair')->default(false);
            $table->boolean('old_repair')->default(false);
            $table->boolean('paint')->default(false);
            $table->boolean('old_paint')->default(false);
            $table->boolean('obsolescence')->default(false);
            $table->boolean('old_obsolescence')->default(false);
            $table->boolean('control')->default(false);
            $table->boolean('old_control')->default(false);
            $table->text('comment')->nullable();
            $table->boolean('is_before_quote')->default(false);
            $table->boolean('quote_validated')->default(false);
            $table->decimal('amount', 18, 2)->nullable();
            $table->decimal('old_amount', 18, 2)->nullable();

            $table->decimal('obsolescence_rate', 5, 2)->nullable();
            $table->decimal('old_obsolescence_rate', 5, 2)->nullable();
            $table->decimal('obsolescence_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('old_obsolescence_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('obsolescence_amount_tax', 18, 2)->nullable();
            $table->decimal('old_obsolescence_amount_tax', 18, 2)->nullable();
            $table->decimal('obsolescence_amount', 18, 2)->nullable();
            $table->decimal('old_obsolescence_amount', 18, 2)->nullable();

            $table->decimal('recovery_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('old_recovery_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('recovery_amount_tax', 18, 2)->nullable();
            $table->decimal('old_recovery_amount_tax', 18, 2)->nullable();
            $table->decimal('recovery_amount', 18, 2)->nullable();
            $table->decimal('old_recovery_amount', 18, 2)->nullable();

            $table->decimal('discount', 5, 2)->nullable();
            $table->decimal('old_discount', 5, 2)->nullable();
            $table->decimal('discount_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('old_discount_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('discount_amount_tax', 18, 2)->nullable();
            $table->decimal('old_discount_amount_tax', 18, 2)->nullable();
            $table->decimal('discount_amount', 18, 2)->nullable();
            $table->decimal('old_discount_amount', 18, 2)->nullable();

            $table->decimal('new_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('old_new_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('new_amount_tax', 18, 2)->nullable();
            $table->decimal('old_new_amount_tax', 18, 2)->nullable();
            $table->decimal('new_amount', 18, 2)->nullable();
            $table->decimal('old_new_amount', 18, 2)->nullable();
            
            $table->unsignedBigInteger('status_id')->index()->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('deleted_by')->index()->nullable();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('shock_id')
                ->references('id')
                ->on('shocks')
                ->onDelete('cascade');

            $table->foreign('supply_id')
                ->references('id')
                ->on('supplies')
                ->onDelete('cascade');

            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
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
        Schema::dropIfExists('shock_works');
    }
};
