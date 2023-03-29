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
        Schema::create('vaccinations', function (Blueprint $table) {
            $table->id();
            $table->string("id_card_number");
            $table->date("vaccination_at")->default(date_format(today("+7"), "Y-m-d"));
            $table->enum("status", ["pending", "vaccinated"])->default("pending");
            $table->enum("type", ["first", "second"])->default("first");
            $table->foreignId("spot_id");
            $table->string("vaccine")->nullable();
            $table->string("vaccinator")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vaccinations');
    }
};
