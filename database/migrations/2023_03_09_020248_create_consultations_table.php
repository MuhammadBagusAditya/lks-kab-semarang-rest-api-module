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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string("id_card_number")->unique();
            $table->enum("status", ["pending", "accepted", "rejected"])->default("pending");
            $table->string("disease_history")->nullable();
            $table->string("current_symptoms")->nullable();
            $table->text("doctor_notes")->nullable();
            $table->string("doctor")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
