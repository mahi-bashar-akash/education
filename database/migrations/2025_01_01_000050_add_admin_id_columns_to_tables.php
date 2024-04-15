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
        Schema::table('departments', function (Blueprint $table) {
            $table->string('admin_id')->after('updated_at');
        });
        Schema::table('professors', function (Blueprint $table) {
            $table->string('admin_id')->after('updated_at');
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->string('admin_id')->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->dropColumn('admin_id');
        });
        Schema::table('professors', function (Blueprint $table) {
            $table->dropColumn('admin_id');
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('admin_id');
        });
    }
};
