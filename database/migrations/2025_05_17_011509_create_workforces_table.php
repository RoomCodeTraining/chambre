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
        Schema::create('workforces', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->decimal('nb_hours', 18, 2)->nullable();
            $table->decimal('work_fee', 18, 2)->nullable();
            $table->boolean('with_tax')->default(false);
            $table->decimal('discount', 18, 2)->nullable();
            $table->decimal('amount_excluding_tax', 18, 2)->nullable();
            $table->decimal('amount_tax', 18, 2)->nullable();
            $table->decimal('amount', 18, 2)->nullable();
            $table->unsignedBigInteger('shock_id')->index()->nullable();
            $table->unsignedBigInteger('workforce_type_id')->index()->nullable();
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

            $table->foreign('workforce_type_id')
                ->references('id')
                ->on('workforce_types')
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
        Schema::dropIfExists('workforces');
    }
};
