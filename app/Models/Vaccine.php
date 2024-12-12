<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;
    protected $table = 'vaccines';
    protected $primaryKey = 'vaccineId'; // Menetapkan nama kolom primary key
    public $incrementing = true; // Menetapkan bahwa kolom ini adalah auto-incrementing
    protected $fillable = ['dose', 'price', 'description']; // Kolom yang dapat diisi

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'vaccineId');
    }
    }
