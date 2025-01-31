@extends('template/layout')
@section('content')
    <div class="row justify-content-center align-items-center" style="height:100vh">
        <div class="row justify-content-center">
            <div class="col-md-6 text-start">
                <button class="btn btn-danger rounded-pill text-white merriweather-regular my-5"> <a
                        href="{{ url('/reservasi') }}"><i class="bi bi-arrow-left"></i>
                        Kembali Ke Reservasi</a></button>
                <p class="merriweather-bold" style="font-size: 20pt"> Detail Pemesan</p>
                <div class="rounded shadow-lg text-start">
                    <div class="px-3 py-3 merriweather-regular">

                        <div class="row">
                            <div class="col text-start">
                                {{ Auth::user()->name }} <br>
                                {{ Auth::user()->email }} <br>
                                {{ Auth::user()->phone }} <br>
                               

                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <div class="row my-5 justify-content-center">
                <div class="col-md-6 text-start">
                    <p class="merriweather-bold" style="font-size: 20pt"> Detail Menginap</p>
                    <div class="rounded shadow-lg text-start">


                        <div class="px-3 py-3 merriweather-regular">
                            <div class="row">
                                <div class="col">
                                    <img src="{{ asset('storage/' . $villa->img_villa) }}" width="100%" alt=""><br>
                                    <b> Tipe Villa: </b> {{ $villa->nama }} <br>
                                    <b> Fasilitas: </b> {{ $villa->fasilitas }} <br>
                                    <b> Tanggal Booking: </b>{{ $start }} - {{ $end }}
                                    (<b>{{ $date_diff }} Malam)</b><br>

                                    <br>
                                    <i class="bi bi-person"></i> Maks. {{ $villa->jml_kamar }} Orang

                                </div>
                            </div>


                            <hr>

                            <div class="row">
                                <div class="col">
                                    <div style="text-align: left">
                                        <b>Harga per Malam:</b> Rp. {{ $villa->harga }}
                                    </div>

                                    <div class="text-end">
                                        Rp. {{ $villa->harga }} X {{ $date_diff }} <br>
                                        <b>Total: </b> Rp. {{ $villa->harga * $date_diff }}</p>
                                    </div>


                                </div>
                            </div>

                            <hr>

                            <div class="row justify-content-end">
                                <div class="col-auto">


                                    <button  id ="pay-button" class="btn btn-success rounded-pill">Pilih
                                        Metode Bayar</button>
                                </div>
                            </div>
                            </form>


                        </div>

                    </div>
                </div>
            </div>

        </div>



        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}">
        </script>
        <script type="text/javascript">
            $.ajaxSetup({

            });
            document.getElementById('pay-button').onclick = function() {


                snap.pay('<?= $snapToken ?>', {
                    // Optional
                    onSuccess: function(result) {
                        /* You may add your own js here, this is just example */
                        $.ajax({
                            type: "POST",
                            url: "/reservasi/metodebayar",
                            data: {
                                _token: "{{ csrf_token() }}",
                                kode_kamar: "{{ $villa->kode_villa }}",
                                total: "{{ $villa->harga * $date_diff }}",
                                tgl_pinjam: "{{ $start }}",
                                tgl_kembali: "{{ $end }}"
                            },
                            dataType: "JSON",
                            success: function(response) {
                                console.log(response);
                            }
                        });

                    },
                    // Optional
                    onPending: function(result) {
                        /* You may add your own js here, this is just example */

                    },
                    // Optional
                    onError: function(result) {
                        console.log("Pembayaran gagal");

                    }
                });
            };
        </script>
        </body>
    @endsection
