@extends('template.layout')


@section('content')
    <div class="row justify-content-center align-items-center" style="height:100vh">
        <div class="row justify-content-center">
            <div class="col-md-6 text-start">
                <button class="btn btn-danger rounded-pill text-white merriweather-regular my-5"> <a
                        href="{{ url('/fasilitas') }}"><i class="bi bi-arrow-left"></i>
                        Kembali Ke Fasilitas</a></button>
                <p class="merriweather-bold" style="font-size: 20pt"> Detail Peminjam</p>
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
                    <p class="merriweather-bold" style="font-size: 20pt"> Detail Peminjaman</p>
                    <div class="rounded shadow-lg text-start">


                        <div class="px-3 py-3 merriweather-regular">
                            <div class="row">
                                <div class="col">
                                    <img src="{{ asset('storage/' . $fasilitas->img) }}" width="100%" alt=""><br>
                                    <b> Tipe Kamar: </b> {{ $fasilitas->nama }} <br>
                                    <b> Fasilitas: </b> {{ $fasilitas->deskripsi }} <br>
                                    <b> Tanggal Booking: </b>{{ $start_time}} - {{ $end_time }}
                                    (<b>{{ $diff }} Jam)</b><br>

                                    <br>


                                </div>
                            </div>


                            <hr>

                            <div class="row">
                                <div class="col">
                                    <div style="text-align: left">
                                        <b>Harga per Jam:</b> Rp. {{ $fasilitas->harga }}
                                    </div>

                                    <div class="text-end">
                                        Rp. {{ $fasilitas->harga }} X {{ $diff }} Jam <br>
                                        <b>Total: </b> Rp. {{ $total }}</p>
                                    </div>


                                </div>
                            </div>

                            <hr>

                            <div class="row justify-content-end">
                                <div class="col-auto">


                                    <button name="kode_kamar" id ="pay-button" class="btn btn-success rounded-pill">Pilih
                                        Metode Bayar</button>
                                </div>
                            </div>
                            </form>


                        </div>

                    </div>
                </div>
            </div>

        </div>
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
                            url: "/fasilitas/dopinjam",
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: "{{ $fasilitas->id }}",
                                total: "{{ $total }}",
                                tgl_pinjam: "{{ $tanggal}}",
                                jam_pinjam: "{{ $start_time }}",
                                jam_kembali: "{{ $end_time }}"
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
