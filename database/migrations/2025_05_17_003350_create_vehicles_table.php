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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('license_plate')->nullable();
            $table->string('type')->nullable();
            $table->string('option')->nullable();
            $table->decimal('mileage', 18, 2)->nullable();
            $table->string('serial_number')->nullable();
            $table->date('first_entry_into_circulation_date')->nullable();
            $table->date('technical_visit_date')->nullable();
            $table->integer('fiscal_power')->nullable();
            $table->integer('payload')->nullable();
            $table->integer('nb_seats')->nullable();
            $table->decimal('new_market_value', 18, 2)->nullable();
            $table->unsignedBigInteger('brand_id')->index()->nullable();
            $table->unsignedBigInteger('vehicle_model_id')->index()->nullable();
            $table->unsignedBigInteger('color_id')->index()->nullable();
            $table->unsignedBigInteger('bodywork_id')->index()->nullable();
            $table->unsignedBigInteger('vehicle_genre_id')->index()->nullable();
            $table->unsignedBigInteger('vehicle_energy_id')->index()->nullable();
            $table->string('relationships')->nullable();
            $table->unsignedBigInteger('status_id')->index()->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('deleted_by')->index()->nullable();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('vehicle_model_id')
                ->references('id')
                ->on('vehicle_models')
                ->onDelete('cascade');

            $table->foreign('color_id')
                ->references('id')
                ->on('colors')
                ->onDelete('cascade');

            $table->foreign('bodywork_id')
                ->references('id')
                ->on('bodyworks')
                ->onDelete('cascade');

            $table->foreign('vehicle_genre_id')
                ->references('id')
                ->on('vehicle_genres')
                ->onDelete('cascade');

            $table->foreign('vehicle_energy_id')
                ->references('id')
                ->on('vehicle_energies')
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
        Schema::dropIfExists('vehicles');
    }
};
