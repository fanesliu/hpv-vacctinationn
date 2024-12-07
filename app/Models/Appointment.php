<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table ='appointments';
    protected $guarded=[];
    public function vaccine(){
        return $this->belongsTo(Vaccine::class, 'vaccineID');
    }
    public function transactions(){
        return $this->hasOne(Transaction::class);
    }
}
