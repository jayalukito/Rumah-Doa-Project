<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    //
    protected $table = 'peminjaman';
    protected $connection = "mysql";
    protected $primaryKey="id";
    public $incrementing = true;

    protected $fillable = [
        'id_fasilitas',
        'id_user',
        'tanggal',
        'konfirmasi',
        'jam_pinjam',
        'jam_kembali'
    ];

    public function fasilitas(){
        return $this->hasOne(Fasilitas::class,"id","id_fasilitas");
    }
}
