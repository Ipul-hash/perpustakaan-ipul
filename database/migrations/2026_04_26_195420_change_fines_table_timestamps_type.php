<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('fines', function (Blueprint $table) {
            $table->dropColumn(['updated_at', 'deleted_at']);
        });
        Schema::table('fines', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });

        Schema::table('loans', function (Blueprint $table) {
            $table->dropColumn(['updated_at', 'deleted_at']);
        });
        Schema::table('loans', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fines', function (Blueprint $table) {
            $table->dropColumn(['updated_at', 'deleted_at']);
        });
        Schema::table('fines', function (Blueprint $table) {
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);
        });

        Schema::table('loans', function (Blueprint $table) {
            $table->dropColumn(['updated_at', 'deleted_at']);
        });
        Schema::table('loans', function (Blueprint $table) {
            $table->integer('updated_at')->default(0);
            $table->integer('deleted_at')->default(0);
        });
    }
};
