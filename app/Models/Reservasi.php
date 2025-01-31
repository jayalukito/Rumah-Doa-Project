<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    //
    protected $connection = "mysql";
    protected $table = "reservasi";
    protected $primaryKey = "id";
    public $incrementing = true;

    public function User(){
        return $this->hasOne(User::class,"id","id_user");
    }

    public function DReservasis(){
        return $this->hasMany(DReservasi::class,"id_reservasi","id");
    }



}
