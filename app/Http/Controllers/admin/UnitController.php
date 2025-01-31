<?php

namespace App\Http\Controllers\admin;

use App\Models\Kamar;
use App\Models\Villa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TipeKamar;

class UnitController extends Controller
{
    //
    public function deletekamar(Request $request){
        $id = $request->id;

        Kamar::where("kode_kamar",$id)->delete();
        return redirect("/admin/unit")->with("success","Kamar $id Berhasil Dihapus");
    }

    public function deletevilla(Request $request){
        $id = $request->id;

        Villa::where("kode_villa",$id)->delete();
        return redirect("/admin/unit")->with("success","Villa $id Berhasil Dihapus");
    }

    public function recover(){
        $villa = Villa::onlyTrashed()->get();
        $kamar = Kamar::onlyTrashed()->get();
        return view("admin.recoverUnit",["villa" => $villa,"kamar" => $kamar]);
    }

    public function dorecover(Request $request){

       if($request->kode_villa){
            Villa::where("kode_villa",$request->kode_villa)->restore();
            return redirect("/admin/kamar/recover")->with("success","Villa $request->kode_villa Berhasil Dikembalikan");
       }elseif($request->kode_kamar){
            Kamar::where("kode_kamar",$request->kode_kamar)->restore();
            return redirect("/admin/kamar/recover")->with("success","Kamar $request->kode_kamar Berhasil Dikembalikan");
       }


    }

    public function dotambahvilla(Request$request){
        $id = Villa::max("id") + 1;

        $request->validate([
            "nama" => "required|min:3|max:10",
            "harga" => "required|numeric",
            "fasilitas" => "required",
            "jml_kamar" => "required|numeric",
            "kapasitas" => "required|numeric",
            "img_villa" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $img_path = $request->file("img_villa")->store("images","public");
        // dd($img_path);
        Villa::create([
            "id" =>null,
            "kode_villa" => "v$id",
            "nama" => $request->nama,
            "kapasitas" => $request->kapasitas,
            "harga" => $request->harga,
            "fasilitas" => $request->fasilitas,
            "jml_kamar" => $request->jml_kamar,
            "img_villa" => $img_path,
        ]);

        return redirect("/admin/unit")->with("success","Villa Berhasil Ditambahkan");
    }

    public function newkamar(){
        $tipe_kamar = TipeKamar::all();
        return view("admin.addform.newkamar",["tipe_kamar" => $tipe_kamar]);
    }
    public function dotambahkamar(Request $request){
        $id = Kamar::max("id") + 1;

        Kamar::create([
            "id" =>null,
            "kode_kamar" => "k$id",
            "id_tipekamar" => $request->tipe_kamar,
        ]);

        return redirect("/admin/newkamar")->with("success","Kamar Berhasil Ditambahkan");

    }

    public function dotambahtipekamar(Request $request){

        // dd("oke");
        $request->validate([
            "nama" => "required|min:3",
            "harga" => "required|numeric",
            "fasilitas" => "required|min:10",
            "jml_ranjang" => "required|numeric",
            "img_kamar" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        $img_path = $request->file("img_kamar")->store("images","public");

        $tipe_kamar = TipeKamar::create([
            "id" =>null,
            "nama" => $request->nama,
            "harga" => $request->harga,
            "fasilitas" => $request->fasilitas,
            "jml_ranjang" => $request->jml_ranjang,
            "img_kamar" => $img_path,
        ]);



        if($tipe_kamar){
            return redirect("/admin/tipekamar/list")->with("success","Tipe Kamar Berhasil Ditambahkan");
        }else{
            return redirect("/admin/tipekamar/list")->with("error","Tipe Kamar Gagal Ditambahkan");
        }

    }

    public function doupdatekamar(Request $request){
        $tipe_kamar = $request->tipe_kamar;

        $kamar = Kamar::where("kode_kamar","=",$request->id)->update([
            "id_tipekamar" => $tipe_kamar
        ]);

        if($kamar){
            return redirect("/admin/unit")->with("success","Kamar Berhasil Diupdate");
        }else{
            return redirect("/admin/unit")->with("error","Kamar Gagal Diupdate");
        }
    }

    public function updatekamar(Request $request){

        $id = $request->id;

        $kamar = Kamar::where("kode_kamar","=",$id)->first();




        $tipe_kamar = TipeKamar::all();
        $param = ["kamar" => $kamar, "tipe_kamar" => $tipe_kamar];

        return view("admin.updateform.updatekamar",$param);
    }

    public function updatevilla(Request $request){

        $id = $request->id;

        $villa = Villa::find($id);

        return view("admin.updateform.updatevilla",["villa" => $villa]);
    }

    public function doupdatevilla(Request $request){

        $request->validate([
            "nama" => "required|min:3|max:10",
            "harga" => "required|numeric",
            "fasilitas" => "required",
            "jml_kamar" => "required|numeric",
            "kapasitas" => "required|numeric",
        ]);

        $villa = Villa::where("id",$request->id)->update([
            "nama" => $request->nama,
            "kapasitas" => $request->kapasitas,
            "harga" => $request->harga,
            "fasilitas" => $request->fasilitas,
            "jml_kamar" => $request->jml_kamar,
        ]);

        if($request->hasFile("img_villa")){
            $img_path = $request->file("img_villa")->store("images","public");

            Villa::where("id",$request->id)->update([
                "img_villa" => $img_path,
            ]);
        }

        if($villa){
            return redirect("/admin/unit")->with("success","Villa Berhasil Diupdate");
        }else{
            return redirect("/admin/unit")->with("error","Villa Gagal Diupdate");
        }
    }

    public function showtipekamar(){
        $tipe_kamar = TipeKamar::all();
        return view("admin.tipekamar.list",["tipekamar" => $tipe_kamar]);
    }

    public function deletetipekamar(Request $request){
        $id = $request->id;

        TipeKamar::where("id",$id)->delete();
        return redirect("/admin/tipekamar/list")->with("success","Tipe Kamar $id Berhasil Dihapus");
    }

    public function updatetipekamar(Request $request){
        $id = $request->id;
        $tipe_kamar = TipeKamar::find($id);
        return view("admin.tipekamar.update",["tipekamar" => $tipe_kamar]);
    }

    public function doupdatetipekamar(Request $request){

        $request->validate([
            "nama" => "required|min:3",
            "harga" => "required|numeric",
            "fasilitas" => "required|min:10",
            "jml_ranjang" => "required|numeric",
        ]);

        TipeKamar::where("id",$request->id)->update([
            "nama" => $request->nama,
            "harga" => $request->harga,
            "fasilitas" => $request->fasilitas,
            "jml_ranjang" => $request->jml_ranjang,
        ]);

        if($request->hasFile("img_kamar")){
            $img_path = $request->file("img_kamar")->store("images","public");

            TipeKamar::where("id",$request->id)->update([
                "img_kamar" => $img_path,
            ]);
        }

        return redirect("/admin/tipekamar/list")->with("success","Tipe Kamar Berhasil Diupdate");
    }

    public function recovertipekamar(){
        $tipekamar = TipeKamar::onlyTrashed()->get();
        return view("admin.tipekamar.recover",["tipekamar" => $tipekamar]);
    }

    public function dorecovertipekamar(Request $request){
        $id = $request->id;

        $tipekamar = TipeKamar::where("id",$id)->restore();
        return redirect("/admin/tipekamar/recover")->with("success","Tipe Kamar $id Berhasil Dikembalikan");
    }
}

