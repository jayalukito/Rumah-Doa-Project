<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DReservasi extends Model
{
    //
    public function Villa(){
        $this->hasOne(Villa::class,"id","id_villa");
    }

    public function Kamar(){
        $this->hasOne(Kamar::class,"id","id_kamar");
    }
}
