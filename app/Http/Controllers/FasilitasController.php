<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Fasilitas;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FasilitasController extends Controller
{
    //
    public function show(){
        $result = Fasilitas::all();
        $param = ["fasilitas" => $result];
        return view("fasilitas.main",$param);

    }

    public function pinjam(Request $request){
        $id = $request->id_fasilitas;

        $result = Fasilitas::find($id);


        $param = ["fasilitas" => $result];
        return view("fasilitas.pinjam",$param);
    }

    public function filter(Request $request){
        $tanggal = $request->tanggal;

        $result = Peminjaman::where("tanggal",$tanggal)->get();

        echo json_encode($result);

    }

    public function pinjamform(Request $request){

        $id = $request->id;
        $result = Fasilitas::find($id);
        $start_time = $request->start_time;
        $end_time = $request->end_time;




        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;




        $tanggal = $request->tanggal;
        $startTime = Carbon::parse($start_time);
        $endTime = Carbon::parse($end_time);

        $diff = $startTime->diffInHours($endTime);
        $total = $result->harga * $diff;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total,
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Get the difference in hours

        $param = ["fasilitas" => $result, "start_time" => $start_time, "end_time" => $end_time, "snapToken" => $snapToken, "total" => $total, "diff" => $diff,"tanggal" => $tanggal];
        return view("fasilitas.pinjamform",$param);


    }


    public function dopinjam(Request $request){
        $id = $request->id;;
        $tanggal = $request->tgl_pinjam;
        $jam_pinjam = $request->jam_pinjam;
        $jam_kembali = $request->jam_kembali;

        $param = ["id" => $id, "tanggal" => $tanggal, "jam_pinjam" => $jam_pinjam, "jam_kembali" => $jam_kembali];
        $result = Peminjaman::create([
            'id' => null,
            'id_fasilitas' => $id,
            'id_user' => Auth::user()->id,
            'konfirmasi' => 0,
            'tanggal' => $tanggal,
            'jam_pinjam' => $jam_pinjam,
            'jam_kembali' => $jam_kembali,
        ]);

        echo json_encode($param);


    }
}
