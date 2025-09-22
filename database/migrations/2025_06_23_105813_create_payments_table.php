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
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('reference')->unique()->index()->nullable();
            $table->date('date')->nullable();
            $table->decimal('amount', 18, 2)->nullable();
            
            $table->unsignedBigInteger('assignment_id')->index()->nullable();
            $table->unsignedBigInteger('payment_type_id')->index()->nullable();
            $table->unsignedBigInteger('payment_method_id')->index()->nullable();
            $table->unsignedBigInteger('status_id')->index()->nullable();
            $table->unsignedBigInteger('cancelled_by')->index()->nullable();
            $table->timestamp('cancelled_at')->nullable();
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

            $table->foreign('payment_type_id')
                ->references('id')
                ->on('payment_types')
                ->onDelete('cascade');

            $table->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
                ->onDelete('cascade');

            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onDelete('cascade');

            $table->foreign('cancelled_by')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('payments');
    }
};
