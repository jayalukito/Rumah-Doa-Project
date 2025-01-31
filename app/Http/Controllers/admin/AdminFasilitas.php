<?php

namespace App\Http\Controllers\admin;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminFasilitas extends Controller
{
    //
    public function deletefasilitas(Request $request){
        $id = $request->id;

        Fasilitas::where("id",$id)->delete();
        return redirect("/admin/fasilitas")->with("success","Fasilitas $id Berhasil Dihapus");
    }

    public function updatefasilitas(Request $request){

        $id = $request->id;


        $fasilitas = Fasilitas::find($id);
        // var_dump($fasilitas);
        // dd($fasilitas);
        return view("admin.fasilitas.update",["fasilitas" => $fasilitas]);
    }

    public function tambahfasilitas(){
        return view("admin.fasilitas.tambah");
    }

    public function dotambahfasilitas(Request $request){
        $request->validate([

            "nama" => "required",
            "deskripsi" => "required",
            "harga" => "required|numeric",
            "img" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $img_path = $request->file("img")->store("images","public");

        Fasilitas::create([
            "id" =>null,
            "nama" => $request->nama,
            "deskripsi" => $request->deskripsi,
            "harga" => $request->harga,
            "img" => $img_path,
        ]);

        return redirect("/admin/fasilitas")->with("success","Fasilitas Berhasil Ditambahkan");
    }

    public function recover(){
        $fasilitas = Fasilitas::onlyTrashed()->get();
        return view("admin.fasilitas.recover",["fasilitas" => $fasilitas]);
    }

    public function dorecover(Request $request){
        $id = $request->id;

        $fasilitas = Fasilitas::where("id",$id)->restore();

        if($fasilitas){
            return redirect("/admin/recover")->with("success","Fasilitas $id Berhasil Dikembalikan");
        }else{
            return redirect("/admin/recover")->with("error","Fasilitas $id Gagal Dikembalikan");
        }
    }

    public function doupdatefasilitas(Request $request){

        $request->validate([
            "nama" => "required",
            "deskripsi" => "required|min:20",
            "harga" => "required|numeric",
        ]);

        $fasilitas = Fasilitas::where("id",$request->id)->update([
            "nama" => $request->nama,
            "deskripsi" => $request->deskripsi,
            "harga" => $request->harga,
        ]);

        if($request->hasFile("img")){
            $img_path = $request->file("img")->store("images","public");

            Fasilitas::where("id",$request->id)->update([
                "img" => $img_path,
            ]);

        }

        if($fasilitas){
            return redirect("/admin/fasilitas")->with("success","Fasilitas Berhasil Diupdate");
        }else{
            return redirect("/admin/fasilitas")->with("error","Fasilitas Gagal Diupdate");
        }
    }
}
