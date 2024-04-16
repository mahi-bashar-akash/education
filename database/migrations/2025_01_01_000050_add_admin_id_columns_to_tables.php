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
        Schema::table('students', function (Blueprint $table) {
            $table->string('admin_id')->after('updated_at');
        });
        Schema::table('library_assets', function (Blueprint $table) {
            $table->string('admin_id')->after('updated_at');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->string('admin_id')->after('updated_at');
        });
        Schema::table('stuffs', function (Blueprint $table) {
            $table->string('admin_id')->after('updated_at');
        });
        Schema::table('holidays', function (Blueprint $table) {
            $table->string('admin_id')->after('updated_at');
        });
        Schema::table('fees', function (Blueprint $table) {
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
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('admin_id');
        });
        Schema::table('library_assets', function (Blueprint $table) {
            $table->dropColumn('admin_id');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('admin_id');
        });
        Schema::table('stuffs', function (Blueprint $table) {
            $table->dropColumn('admin_id');
        });
        Schema::table('holidays', function (Blueprint $table) {
            $table->dropColumn('admin_id');
        });
        Schema::table('fees', function (Blueprint $table) {
            $table->dropColumn('admin_id');
        });
    }
};
