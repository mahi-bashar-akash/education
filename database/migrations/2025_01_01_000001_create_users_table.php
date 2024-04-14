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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('password');
            $table->string('email_verified_at')->nullable();
            $table->string('verified_token')->nullable();
            $table->bigInteger('reset_code')->nullable();
            $table->string('avatar')->nullable();
            $table->string('card_holder_name')->nullable();
            $table->string('card_name')->nullable();
            $table->string('card_expire_date')->nullable();
            $table->string('card_cvv')->nullable();
            $table->rememberToken();
            $table->dateTime('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
