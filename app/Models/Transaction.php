<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions'; // Nama tabel
    protected $primaryKey = 'transactionId'; // Menetapkan nama kolom primary key
    public $incrementing = true; // Menetapkan bahwa kolom ini adalah auto-incrementing
    protected $guarded = []; // Kolom yang tidak dapat diisi
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function appointment(){
        return $this->hasOne(Appointment::class);
    }

}
