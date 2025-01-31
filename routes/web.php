<?php

use App\Models\Kamar;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\admin\AdminFasilitas;
use App\Http\Controllers\admin\UnitController;
use App\Http\Controllers\admin\AdminController;

Route::get('/', function () {
    return view('home');
});

Route::get('/demo',function(){
    return view('demo');
});




//login & register
Route::post('/doregister',[LoginController::class,'doregister']);
// Route::post('/dologin',[LoginController::class,'dologin']);

Route::get('/login',function(){
    return view('registration.login');
});

Route::post('/dologin',[LoginController::class,'dologin']);

Route::get('/register',function(){
    return view('registration.register');
});

Route::get('/logout',function(){
    Auth::logout();
    return redirect('/');
});

Route::get('/history',[ReservasiController::class,"history"])->middleware('auth.user');

//Reservasi
Route::get('/reservasi',function(){
    return view('reservasi');
})->middleware('auth.user');

Route::prefix("reservasi")->group(function(){
    Route::post('/invoice',[ReservasiController::class,'tampilkanInvoice']);
    Route::post('/metodebayar',[ReservasiController::class,'bayar']);
})->middleware('auth.user');;

Route::get('/cekreservasi/kamar',[ReservasiController::class,"tampilkanKamar"])->middleware('auth.user');
Route::get('/cekreservasi/villa',[ReservasiController::class,'tampilkanVilla'])->middleware('auth.user');

Route::prefix("fasilitas")->middleware('auth.user')->group(function(){
   Route::get("/", [FasilitasController::class,'show']);
   Route::get('/pinjam',[FasilitasController::class,'pinjam']);
   Route::get('/filter',[FasilitasController::class,'filter']);
   Route::post('/pinjamform',[FasilitasController::class,'pinjamform']);
   Route::post('/dopinjam',[FasilitasController::class,'dopinjam']);
});

Route::prefix("admin")->middleware('auth.admin')->group(function(){

    Route::get("/reservasi",[AdminController::class,"reservasi"]);
    Route::get("/unit",[AdminController::class,'unit']);
    Route::get("/fasilitas",[AdminController::class,'fasilitas']);

    //reservasi
    Route::get("reservasi/show",[AdminController::class,"show"]);
    Route::post("/docheckin",[AdminController::class,'docheckin']);

    //UNIT
    Route::get("newkamar",[UnitController::class,"newkamar"]);
    Route::get("newvilla",function(){
        return view("admin.addform.newvilla");
    });

    //UNIT-RECOVER
    Route::post("kamar/dorecover",[UnitController::class,"dorecover"]);

    Route::get("kamar/recover",[UnitController::class,"recover"]);

    //UNIT-UP DEL
    Route::post("deletekamar",[UnitController::class,"deletekamar"]);
    Route::post("updatekamar",[UnitController::class,"updatekamar"]);
    Route::post("doupdatekamar",[UnitController::class,"doupdatekamar"]);
    Route::post("tipekamar/doupdatetipekamar",[UnitController::class,"doupdatetipekamar"]);

    Route::post("deletevilla",[UnitController::class,"deletevilla"]);
    Route::get("updatevilla",[UnitController::class,"updatevilla"]);
    Route::post("doupdatevilla",[UnitController::class,"doupdatevilla"]);

    //UNIT-ADD
    Route::post("tambahkamar",[UnitController::class,"tambahkamar"]);
    Route::post("dotambahvilla",[UnitController::class,"dotambahvilla"]);
    Route::post("dotambahkamar",[UnitController::class,"dotambahkamar"]);
    Route::post("dotambahtipekamar",[UnitController::class,"dotambahtipekamar"]);

    //FASILITAS
    Route::post("deletefasilitas",[AdminFasilitas::class,"deletefasilitas"]);
    Route::post("updatefasilitas",[AdminFasilitas::class,"updatefasilitas"]);
    Route::get("tambahfasilitas",[AdminFasilitas::class,"tambahfasilitas"]);
    Route::get("recover",[AdminFasilitas::class,"recover"]);
    Route::post("dorecover",[AdminFasilitas::class,"dorecover"]);

    Route::post("dotambahfasilitas",[AdminFasilitas::class,"dotambahfasilitas"]);
    Route::post("doupdatefasilitas",[AdminFasilitas::class,"doupdatefasilitas"]);

    //TIPE KAMAR
    Route::get("tipekamar/list",[UnitController::class,"showtipekamar"]);
    Route::get("tipekamar/tambah",function(){
        return view("admin.tipekamar.tambah");
    });

    Route::get("tipekamar/recover",[UnitController::class,"recovertipekamar"]);
    Route::post("tipekamar/dorecovertipekamar",[UnitController::class,"dorecovertipekamar"]);

    Route::post("tipekamar/deletetipekamar",[UnitController::class,"deletetipekamar"]);
    Route::post("tipekamar/updatetipekamar",[UnitController::class,"updatetipekamar"]);


})->middleware('auth.admin');


