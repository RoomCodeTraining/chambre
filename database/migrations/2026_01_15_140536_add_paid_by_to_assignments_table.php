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
        Schema::table('assignments', function (Blueprint $table) {
            if (!Schema::hasColumn('assignments', 'paid_by')) {
                $table->unsignedBigInteger('paid_by')->index()->nullable();
            }
            if (!Schema::hasColumn('assignments', 'paid_at')) {
                $table->timestamp('paid_at')->nullable();
            }
            if (!Schema::hasColumn('assignments', 'unpaid_by')) {
                $table->unsignedBigInteger('unpaid_by')->index()->nullable();
            }
            if (!Schema::hasColumn('assignments', 'unpaid_at')) {
                $table->timestamp('unpaid_at')->nullable();
            }
            if (!Schema::hasColumn('assignments', 'unpaid_reason')) {
                $table->string('unpaid_reason')->nullable();
            }
        });

        // Add foreign key constraints if they don't exist
        $foreignKeyColumns = [
            'paid_by',
            'unpaid_by',
        ];

        foreach ($foreignKeyColumns as $column) {
            $foreignKeys = DB::select("
                SELECT CONSTRAINT_NAME 
                FROM information_schema.KEY_COLUMN_USAGE 
                WHERE TABLE_SCHEMA = DATABASE() 
                AND TABLE_NAME = 'assignments' 
                AND COLUMN_NAME = ? 
                AND REFERENCED_TABLE_NAME IS NOT NULL
            ", [$column]);

            if (empty($foreignKeys)) {
                Schema::table('assignments', function (Blueprint $table) use ($column) {
                    $table->foreign($column)
                        ->references('id')
                        ->on('users')
                        ->onDelete('cascade');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assignments', function (Blueprint $table) {
            // Drop foreign keys first if they exist
            $foreignKeyColumns = [
                'paid_by',
                'unpaid_by',
            ];

            foreach ($foreignKeyColumns as $column) {
                $foreignKeys = DB::select("
                    SELECT CONSTRAINT_NAME 
                    FROM information_schema.KEY_COLUMN_USAGE 
                    WHERE TABLE_SCHEMA = DATABASE() 
                    AND TABLE_NAME = 'assignments' 
                    AND COLUMN_NAME = ? 
                    AND REFERENCED_TABLE_NAME IS NOT NULL
                ", [$column]);

                if (!empty($foreignKeys)) {
                    $constraintName = $foreignKeys[0]->CONSTRAINT_NAME;
                    $table->dropForeign($constraintName);
                }
            }

            // Drop columns if they exist
            if (Schema::hasColumn('assignments', 'paid_by')) {
                $table->dropColumn('paid_by');
            }
            if (Schema::hasColumn('assignments', 'paid_at')) {
                $table->dropColumn('paid_at');
            }
            if (Schema::hasColumn('assignments', 'unpaid_by')) {
                $table->dropColumn('unpaid_by');
            }
            if (Schema::hasColumn('assignments', 'unpaid_at')) {
                $table->dropColumn('unpaid_at');
            }
            if (Schema::hasColumn('assignments', 'unpaid_reason')) {
                $table->dropColumn('unpaid_reason');
            }
        });
    }
};
