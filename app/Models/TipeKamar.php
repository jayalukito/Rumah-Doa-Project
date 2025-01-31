<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipeKamar extends Model
{
    use SoftDeletes;
    //
    protected $connection = 'mysql';
    protected $table = "tipe_kamar";
    protected $primaryKey = "id";
    public $incrementing = true;

    public $fillable = [
        "id",
        "nama",
        "harga",
        "fasilitas",
        "img_kamar",
        "jml_ranjang"
    ];

    public function Kamars(){
        return $this->hasMany(Kamar::class,"id_tipekamar","id");
    }
}
