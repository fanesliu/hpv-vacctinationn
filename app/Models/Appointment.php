<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $table = 'appointments'; // Nama tabel
    protected $primaryKey = 'appointmentId'; // Menetapkan nama kolom primary key
    public $incrementing = true; // Menetapkan bahwa kolom ini adalah auto-incrementing
    protected $fillable = ['place', 'dateAvailibilityStart', 'dateAvailibilityEnd', 'vaccineId']; // Kolom yang dapat diisi
    
    public function vaccine(){
        return $this->belongsTo(Vaccine::class, 'vaccineId', 'vaccineId');
    }
    public function transactions(){
        return $this->hasOne(Transaction::class);
    }
}
