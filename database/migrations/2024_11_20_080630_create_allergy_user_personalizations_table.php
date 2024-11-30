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
        Schema::create('allergy_user_personalizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('allergy_id')->constrained('allergies')->onDelete('cascade')->nullable();
            $table->foreignId('user_personalization_id')->constrained('user_personalizations')->onDelete('cascade')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allergy_user_personalizations');
    }
};
