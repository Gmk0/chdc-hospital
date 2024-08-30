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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
                       $table->string('nom');
            $table->string('matricule')->unique();
            $table->string('postnom')->nullable();
            $table->string('prenom');
            $table->date('date_naiss');
            $table->string('sexe');
            $table->string('adresse');
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('etat_civil')->nullable();
            $table->enum('status',['active','deces'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
