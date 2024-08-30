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
        Schema::create('staff_medicals', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('postnom');
            $table->string('prenom');
            $table->string('matricule')->unique();
            $table->date('date_naiss');
            $table->string('sexe');
            $table->string('adresse');
             $table->string('fonction')->nullable();
            $table->string('etat_civil')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('departement_id')->nullable();

            $table->enum('status', ['active', 'conger'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_medicals');
    }
};
