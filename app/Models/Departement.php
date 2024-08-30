<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;





    protected $fillable = [
        'intitule',
        'description',
        'status',
    ];

    public function staffMedicals()
    {
        return $this->hasMany(StaffMedical::class);
    }
}
