<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fasilitas extends Model
{
    use SoftDeletes;
    //
    protected $table = "fasilitas";
    protected $connection = "mysql";
    protected $primaryKey="id";
    public $incrementing = true;

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'img',
    ];

}
