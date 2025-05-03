<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKendaraan extends Model
{
    use HasFactory;

    protected $table = 'jenis_kendaraans';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $timestamps = true;
    public $incrementing  = true; 

    protected $fillable = [
        'jenis_kendaraan',
    ];

    public function vehicle(){
        return $this->hasMany(vehicle::class,'id_jenis_kendaraan');
    }
}
