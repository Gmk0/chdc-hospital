<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointement extends Model
{
    use HasFactory;

    protected  $fillable=[
             'patient_id',
            'departement_id',
            'staff_medical_id',
            'date',
            'heure',
            'status',
        ];

    public function staffMedical()
    {
        return $this->belongsTo(StaffMedical::class);
    }
    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }


}
