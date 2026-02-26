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
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('locale')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();;
            
            $table->string('country_code');
            $table->string('phone_code');
            $table->string('phone_number');
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->integer('year_of_birth')->nullable();
            $table->string('school_name')->nullable();
            $table->string('city')->nullable();
            $table->enum('gender', ["male", "female", "others"])->nullable()->default("male");
            $table->string('grade')->nullable();
            $table->enum('field_of_interest', ["Physics", "Mathematics", "Both", "Other"])->nullable();
            $table->integer('approve_notification')->nullable()->default(1);

            $table->string("fcm_token")->nullable()->default("");
            $table->rememberToken();
            $table->timestamps();
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
