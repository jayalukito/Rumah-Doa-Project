<?php

namespace App\Http\Controllers\admin;

use App\Models\Kamar;
use App\Models\Villa;
use App\Models\Fasilitas;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\TipeKamar;

class AdminController extends Controller
{

    //
    public function reservasi(){
        $villa = DB::select(
            "
            SELECT reservasi.id, users.name,reservasi.tgl_pinjam, reservasi.tgl_kembali, reservasi.total, reservasi.konfirmasi, villa.nama
            FROM reservasi, villa,users
            where reservasi.unit = villa.kode_villa
            "
        );

        $kamar = DB::select("

 SELECT reservasi.id, users.name,reservasi.tgl_pinjam, reservasi.tgl_kembali, reservasi.total, reservasi.konfirmasi, tipe_kamar.nama, kamar.kode_kamar
            FROM reservasi, kamar,tipe_kamar,users
            WHERE reservasi.unit = kamar.kode_kamar AND reservasi.id_user = users.id
            AND tipe_kamar.id = kamar.id_tipekamar

        ");

        $param = ["kamar" => $kamar,"villa" => $villa];




        return view('admin.reservasi',$param);
    }

    public function unit(){
        $villa = Villa::all();

        $kamar = Kamar::all();

        $tipe_kamar = TipeKamar::all();

        $param = ["kamar" => $kamar,"villa" => $villa,"tipe_kamar" => $tipe_kamar];

        return view("admin.unit",$param);

    }

    public function fasilitas(){
        $result = Fasilitas::all();

        $param = ["fasilitas"=>$result];

        return view("admin.fasilitas",$param);
    }

    public function docheckin(Request $request){
        $id = $request->checkin;

        $reservasi = Reservasi::find($id);


        if($reservasi->konfirmasi == 0){
            Reservasi::where("id",$id)->update(["konfirmasi" => 1]);
        }else{
            Reservasi::where("id",$id)->update(["konfirmasi" => 0]);
        }

        return redirect("/admin/reservasi")->with("success",["pesan" => "Status Berhasil Diupdate", "id" => $id]);

    }
}
