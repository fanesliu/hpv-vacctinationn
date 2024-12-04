<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $table ='vaccine';
    protected $guarded=[];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'vaccineId');
    }
    }