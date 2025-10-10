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
        Schema::create('shocks', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->boolean('with_tax')->default(false);
            $table->boolean('is_before_quote')->default(false);
            $table->boolean('is_validated')->default(false);

            $table->decimal('shock_work_obsolescence_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('shock_work_obsolescence_amount_tax', 18, 2)->nullable();
            $table->decimal('shock_work_obsolescence_amount', 18, 2)->nullable();
            $table->decimal('shock_work_recovery_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('shock_work_recovery_amount_tax', 18, 2)->nullable();
            $table->decimal('shock_work_recovery_amount', 18, 2)->nullable();
            $table->decimal('shock_work_discount_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('shock_work_discount_amount_tax', 18, 2)->nullable();
            $table->decimal('shock_work_discount_amount', 18, 2)->nullable();
            $table->decimal('shock_work_new_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('shock_work_new_amount_tax', 18, 2)->nullable();
            $table->decimal('shock_work_new_amount', 18, 2)->nullable();

            $table->decimal('workforce_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('workforce_amount_tax', 18, 2)->nullable();
            $table->decimal('workforce_amount', 18, 2)->nullable();

            $table->decimal('paint_product_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('paint_product_amount_tax', 18, 2)->nullable();
            $table->decimal('paint_product_amount', 18, 2)->nullable();

            $table->decimal('small_supply_amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('small_supply_amount_tax', 18, 2)->nullable();
            $table->decimal('small_supply_amount', 18, 2)->nullable();

            $table->decimal('amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('amount_tax', 18, 2)->nullable();
            $table->decimal('amount', 18, 2)->nullable();

            $table->unsignedBigInteger('assignment_id')->index()->nullable();
            $table->unsignedBigInteger('shock_point_id')->index()->nullable();
            $table->unsignedBigInteger('paint_type_id')->index()->nullable();
            $table->unsignedBigInteger('hourly_rate_id')->index()->nullable();
            $table->unsignedBigInteger('status_id')->index()->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('deleted_by')->index()->nullable();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('assignment_id')
                ->references('id')
                ->on('assignments')
                ->onDelete('cascade');

            $table->foreign('shock_point_id')
                ->references('id')
                ->on('shock_points')
                ->onDelete('cascade');

            $table->foreign('paint_type_id')
                ->references('id')
                ->on('paint_types')
                ->onDelete('cascade');

            $table->foreign('hourly_rate_id')
                ->references('id')
                ->on('hourly_rates')
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
        Schema::dropIfExists('shocks');
    }
};
