<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicle';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;
    public $incrementing  = true; 

    protected $fillable = [
        'id_jenis_kendaraan',
        'merk',
        'ukuran',
    ];

    public function jenis_kendaraan(){
        return $this->belongsTo(JenisKendaraan::class,'id_jenis_kendaraan');
    }
}
