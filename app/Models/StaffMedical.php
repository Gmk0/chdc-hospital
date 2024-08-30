<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffMedical extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'postnom',
        'prenom',
        'matricule',
        'date_naiss',
        'sexe',
        'adresse',
        'departement_id',
        'etat_civil',
        'user_id',
        'status',
    ];

    public function departement(){
        return $this->belongsTo(Departement::class);
    }

    public function nomComplet(): String
    {

        return $this->nom . "-" . $this->prenom;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
