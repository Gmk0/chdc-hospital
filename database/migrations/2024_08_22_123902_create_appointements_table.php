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
        Schema::create('appointements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id');
            $table->foreignId('departement_id');
            $table->foreignId('staff_medical_id');
            $table->timestamp('date');
            $table->string('heure');

            $table->enum('status',['en attente', 'recu','annuler'])->default('en attente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointements');
    }
};
