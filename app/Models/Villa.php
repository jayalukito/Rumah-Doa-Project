<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Villa extends Model
{
    use SoftDeletes;
    //
    protected $connection = "mysql";
    protected $table = "villa";
    protected $primaryKey = "id";
    public $incrementing = true;

    public $fillable = [
        "id",
        "kode_villa",
        "nama",
        "jml_kamar",
        "kapasitas",
        "fasilitas",
        "img_villa",
        "harga"
    ];

    public function DReservasis(){
        return $this->hasMany(DReservasi::class,"id_villa","id");
    }
}
