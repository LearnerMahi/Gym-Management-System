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
        Schema::create('trainer', function (Blueprint $table) {
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contact_number')->nullable();
            $table->text('address')->nullable();
            $table->text('bio')->nullable();
            $table->enum('specialization', ['bodybuilding', 'youth fitness', 'senior fitness', 'weight loss', 'leg', 'chest', 'strength'])->nullable();
            $table->text('certifications')->nullable();
             $table->text('gym_affiliation')->nullable();
             $table->bigIncrements('gym_membership_id')->primary();

            $table->string('certification_proof')->nullable();
            $table->string('background_check_document')->nullable();
            $table->boolean('terms_accepted')->nullable()->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainer');
    }
};
