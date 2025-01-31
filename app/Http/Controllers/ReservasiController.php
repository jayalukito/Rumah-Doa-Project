<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Kamar;
use App\Models\Villa;
use App\Models\Reservasi;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    function tampilkanInvoice(Request $request){

        $start = $request->date_from;
        $end = $request->date_to;
        $total = 0;
        $result = null;
        if($request->tipe_kamar){

            $tipe_kamar = $request->tipe_kamar;


            $date1 = Carbon::parse($start);
            $date2 = Carbon::parse($end);

            $date_diff = $date1->diffInDays($date2);

            // dd($date_diff);

            $result = DB::selectOne(
                'SELECT kamar.kode_kamar, tipe_kamar.nama, tipe_kamar.harga, tipe_kamar.fasilitas, tipe_kamar.img_kamar, tipe_kamar.jml_ranjang
                FROM kamar, tipe_kamar
                WHERE kamar.id_tipekamar = tipe_kamar.id and tipe_kamar.nama = :tipe_kamar
                AND kamar.kode_kamar NOT IN (
                    SELECT kamar.kode_kamar
                    FROM kamar,reservasi
                    WHERE kamar.kode_kamar = reservasi.unit
                    AND ( :start <= tgl_pinjam OR :end >= tgl_kembali )
                )',['start' => $start,'end' => $end,'tipe_kamar'=> $tipe_kamar]);

            // dd($result);

            $total = $result->harga * $date_diff;
        }else{
            $kode_villa = $request->kode_villa;


            $date1 = Carbon::parse($start);
            $date2 = Carbon::parse($end);

            $date_diff = $date1->diffInDays($date2);



            $result = Villa::where('kode_villa','=',$kode_villa)->first();

            $total = $result->harga * $date_diff;

        }


        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            )
        );

        // dd($result);

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        if($request->tipe_kamar){
            $param = ["kamar" => $result, "start" => $start, "end" => $end,"date_diff" => $date_diff, "snapToken" => $snapToken];
            return view('invoice.kamar',$param);
        }else if($request->kode_villa){
            $param = ["villa" => $result, "start" => $start, "end" => $end,"date_diff" => $date_diff, "snapToken" => $snapToken];
            return view('invoice.villa',$param);
        }

    }
    function bayar(Request $request){
        $kode_kamar = $request->kode_kamar;
        $tgl_pinjam = $request->tgl_pinjam;
        $tgl_kembali = $request->tgl_kembali;
        $total = $request->total;




        try{
            $reservasi = new Reservasi();
            $reservasi->id_user = Auth::user()->id;
            $reservasi->tgl_pinjam = $tgl_pinjam;
            $reservasi->tgl_kembali = $tgl_kembali;
            $reservasi->total = $total;
            $reservasi->unit = $kode_kamar;
            $reservasi->konfirmasi = 0;
            $reservasi->save();

            return response()->json(['message' => "transaksi berhasil", 'data' => $reservasi], 200);
        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage()], 500);
        }


    }


    function tampilkanVilla(Request $request){
        // $start =  "2024-12-15";
        // $end =  "2024-12-20";
        $end = $request->date_to;
        $start = $request->date_from;

        $result = DB::select(
    'SELECT*FROM villa
            WHERE villa.id NOT IN (
                SELECT villa.id
                FROM villa, reservasi
                WHERE villa.kode_villa = reservasi.unit
                AND  (:start >= reservasi.tgl_pinjam
                OR :end <= reservasi.tgl_kembali )
            )
        ',['start'=>$start,'end'=>$end]);

        echo json_encode($result);
    }
    //
    function tampilkanKamar(Request $request){
        $end = $request->date_to;
        $start = $request->date_from;

        // $start =  "2024-12-15";
        // $end =  "2024-12-20";


        // $ExcludedResult = DB::table("kamar")
        // ->join('d_reservasi','kamar.id', '=','d_reservasi.id_kamar')
        // ->join('reservasi','d_reservasi.id_reservasi','=','reservasi.id')
        // ->where('reservasi.tgl_pinjam',"<=",$end)
        // ->where('reservasi.tgl_kembali',">=",$start)
        // ->select('kamar.id');



        // $result = DB::table('kamar')
        // ->join('tipe_kamar','kamar.id_tipekamar','=','tipe_kamar.id')
        // ->whereNotIn("kamar.id",$ExcludedResult)
        // ->select('kamar.id','tipe_kamar.nama','tipe_kamar.harga','tipe_kamar.fasilitas','tipe_kamar.img_kamar','tipe_kamar.jml_ranjang','tipe_kamar.img_kamar',DB::raw('COUNT(*) as jml_tipe'))
        // ->get();

        $result = DB::select(
            "SELECT tipe_kamar.nama, tipe_kamar.harga, tipe_kamar.fasilitas, tipe_kamar.img_kamar, tipe_kamar.jml_ranjang
            , COUNT(*) AS jml_kamar
            FROM kamar, tipe_kamar
            WHERE kamar.id_tipekamar = tipe_kamar.id AND

            kamar.id NOT IN (
                SELECT kamar.id FROM kamar, reservasi
                WHERE kamar.kode_kamar = reservasi.unit
                AND
                (:start >= reservasi.tgl_pinjam  OR
                :end <= reservasi.tgl_kembali)
            )
            GROUP BY tipe_kamar.nama,tipe_kamar.harga,tipe_kamar.fasilitas,tipe_kamar.img_kamar,tipe_kamar.jml_ranjang", ['start' => $start,'end' => $end]);

        echo json_encode($result);
    }

    function history(){
        $reservasi = Reservasi::where('id_user',Auth::user()->id)->get();
        $peminjaman = Peminjaman::where("id_user",Auth::user()->id)->get();

        $param = ["reservasi" => $reservasi, "peminjaman" => $peminjaman];
        return view('history',$param);
    }
}
