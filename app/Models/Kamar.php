<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kamar extends Model
{
    use SoftDeletes;
    //
    protected $connection = 'mysql';
    protected $table = "kamar";
    protected $primaryKey = "id";
    public $incrementing = true;
    public $fillable = [
        "id",
        "id_tipekamar",
        "kode_kamar",
    ];
    public function Tipe(){
        return $this->hasOne(TipeKamar::class,"id","id_tipekamar");
    }

    public function DReservasis(){
        return $this->hasMany(DReservasi::class,"id_kamar","id");
    }
}
