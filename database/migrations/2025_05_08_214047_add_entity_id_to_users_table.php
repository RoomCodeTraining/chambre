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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('first_login')->default(true);
            $table->integer('login_attempt')->default(0);
            $table->string('pin_code')->nullable();
            $table->string('pin_code_params')->nullable();
            $table->dateTime('pin_code_expires_at')->nullable();
            $table->unsignedBigInteger('entity_id')->index()->nullable();
            $table->unsignedBigInteger('status_id')->index()->nullable();
            $table->unsignedBigInteger('current_role_id')->index()->nullable();
            $table->unsignedBigInteger('enabled_by')->index()->nullable();
            $table->timestamp('enabled_at')->nullable();
            $table->unsignedBigInteger('disabled_by')->index()->nullable();
            $table->timestamp('disabled_at')->nullable();
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->unsignedBigInteger('deleted_by')->index()->nullable();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('entity_id')
                ->references('id')
                ->on('entities')
                ->onDelete('cascade');

            $table->foreign('current_role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onDelete('cascade');

            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('enabled_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('disabled_by')
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
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('entity_id');
            $table->dropConstrainedForeignId('current_role_id');
            $table->dropConstrainedForeignId('status_id');
            $table->dropConstrainedForeignId('enabled_by');
            $table->dropConstrainedForeignId('disabled_by');
            $table->dropConstrainedForeignId('created_by');
            $table->dropConstrainedForeignId('updated_by');
            $table->dropConstrainedForeignId('deleted_by');
            $table->dropColumn('enabled_at');
            $table->dropColumn('disabled_at');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
        });
    }
};
