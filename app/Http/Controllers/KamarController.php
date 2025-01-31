<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    //
    public function show(){
        $result = Kamar::first();

        dd($result->Tipe);
    }
}
