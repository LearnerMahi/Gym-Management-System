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
        Schema::create('trainer_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contact_number')->nullable();
            $table->text('address')->nullable();
            $table->text('bio')->nullable();
            $table->string('specialization')->nullable();
            $table->text('certifications')->nullable();
            $table->json('availability')->nullable();
            $table->json('training_preferences')->nullable();
            $table->text('gym_affiliation')->nullable();
            $table->string('gym_membership_id')->nullable();
            $table->string('certification_proof')->nullable();
            $table->string('background_check_document')->nullable();
            $table->boolean('terms_accepted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainer_tables');
    }
};
