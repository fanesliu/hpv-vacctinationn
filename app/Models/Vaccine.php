<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $table ='vaccines';
    protected $primaryKey = 'vaccineId';
    protected $guarded=[];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'vaccineId');
    }
    }
