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
        Schema::create('ascertainments', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->unsignedBigInteger('ascertainment_type_id')->index()->nullable();
            $table->boolean('very_good')->nullable();
            $table->boolean('good')->nullable();
            $table->boolean('acceptable')->nullable();
            $table->boolean('less_good')->nullable();
            $table->boolean('bad')->nullable();
            $table->boolean('very_bad')->nullable();
            $table->text('comment')->nullable();

            $table->unsignedBigInteger('assignment_id')->index()->nullable();
            $table->unsignedBigInteger('status_id')->index()->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('deleted_by')->index()->nullable();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('ascertainment_type_id')
                ->references('id')
                ->on('ascertainment_types')
                ->onDelete('cascade');

            $table->foreign('assignment_id')
                ->references('id')
                ->on('assignments')
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
        Schema::dropIfExists('ascertainments');
    }
};
