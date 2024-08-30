<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'nom',
        'postnom',
        'matricule',
        'prenom',
        'date_naiss',
        'sexe',
        'adresse',
        'telephone',
        'email',
        'etat_civil',
        'status'
    ];

    public function nomComplet(): String {

        return $this->nom. "-".$this->prenom;

    }
    public function age(): String
    {

        return  $this->date_naiss;
    }



    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $date = date('ymd'); // Format YYMMDD, par exemple 240818 pour le 18 août 2024.
            $latest = static::whereDate('created_at', today())->latest('id')->first();

            // dd($latest);

            if ($latest) {
                $lastMatricule = (int) substr($latest->matricule, -2);


                $matriculeNumber = $lastMatricule + 1;
            } else {
                $matriculeNumber = 1;
            }
            $newMatricule
                = 'PT' . $date . str_pad($matriculeNumber, 2, '0', STR_PAD_LEFT);



            $model->matricule
                = $newMatricule;
        });
    }
}
