@extends('template/layout')
@section('content')
    <div class="container my-3 merriweather-regular">
        <div class="row mb-3">
            <div class="col">
                <a href="{{ url('/fasilitas') }}">
                <button class="btn btn-danger rounded-pill"><i class="bi bi-arrow-left"></i> Kembali</button></a>
            </div>
        </div>
        <form action="{{ url('fasilitas/pinjamform', []) }}" id="Form" method="post">
            @csrf

            <input type="hidden" name="id" value="{{ $fasilitas->id }}">
        <div class="row justify-content-center mb-3">
            <div class="col-auto">
                <span style="font-size: 30pt" class="merriweather-bold">Booking Fasilitas</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="col">
                        <img src="{{ asset("storage/$fasilitas->img") }}" alt="" width="100%">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <span style="font-size: 15pt" class="merriweather-bold">Nama Fasilitas: {{ $fasilitas->nama }}
                        </span><br>
                        <span style="font-size: 15pt" class="merriweather-bold">Fasilitas:
                            {{ $fasilitas->deskripsi }}</span><br>
                        <span style="font-size: 15pt" class="merriweather-bold">Harga Booking (PerJam):
                            Rp.{{ $fasilitas->harga }}</span><br>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <span style="font-size: 15pt" class="merriweather-bold">Pilih Tanggal Peminjaman: </span>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" type="text" name="tanggal" id="date-picker"></span><br>
                    </div>
                </div>

                <div class="row justify-content-center my-1">
                    <div class="col-auto">
                        <button type="button"class="btn btn-danger merriweather-regular rounded-pill" id="cekfasil">Cek
                            Availabilitas</button>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col">
                        <div id="hasil">


                        </div>

                        <div class="row justify-content-center align-items-center" id="time" hidden>
                            <div class="col-2">
                                Mulai: <input class="form-control time-picker" type="text" id="start_time" name="start_time">
                            </div>

                            <div class="col-2">
                                Selesai: <input class="form-control time-picker" type="text" id="end_time" name="end_time">
                            </div>

                            <div class="col-2">


                                    <button class="btn btn-danger merriweather-regular rounded-pill" type="submit"
                                    name="id" id="pinjam" >Pinjam</button>




                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </form>
    </div>



    <script>
        $('#pinjam').on('click', function() {

            event.preventDefault();

            tanggal = $("#date-picker").val();
            startTime = $('#start_time').val();
            endTime = $('#end_time').val();

            if (startTime == "" || endTime == "") {
                alert("Pilih Jam Terlebih Dahulu");
                return false;
            }

            if (startTime && endTime) {
                if (startTime > endTime) {
                    alert('Start time cannot be later than end time.');
                    $('#start_time').val('');
                    return false
                } else if (endTime < startTime) {
                    alert('End time cannot be earlier than start time.');
                    $('#end_time').val('');
                    return false
                }
            }
            $('#Form').submit();
        });
        $("#cekfasil").click(function() {
            tanggal = $("#date-picker").val();
            console.log(tanggal);

            if (tanggal == "") {
                alert("Pilih Tanggal Terlebih Dahulu");
                return false;
            }
            $("#time").attr("hidden", false);
            $.ajax({
                type: "GET",
                url: "/fasilitas/filter",
                data: {
                    tanggal: tanggal
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    if (response.length == 0) {
                        $("#hasil").append(
                            `
                            <div class="row justify-content-center align-items-center" style="height:20vh">
                                <div class="col-auto">
                                    Semua Jam Tersedia
                                </div>
                            </div>

                            `
                        );
                    } else {
                        let tableHtml = `
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jam Mulai</th>
                                        <th>Jam Selesai</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                        `;

                        response.forEach(fasil => {

                            tableHtml += `
                                <tr>
                                    <td>${fasil.tanggal}</td>
                                    <td>${fasil.jam_pinjam}</td>
                                    <td>${fasil.jam_kembali}</td>
                                    <td>Sudah Terbooking</td>
                                </tr>
                            `;
                        });

                        tableHtml += `
                                </tbody>
                            </table>
                        `;

                        // Append the entire table at once
                        $("#hasil").html(tableHtml);

                    }
                }
            });



        });
        $(document).ready(function() {
            $("#date-picker").flatpickr({
                minDate: "today",
                dateFormat: "Y-m-d"
            });

            $(".time-picker").flatpickr({
                noCalendar: true,
                enableTime: true,
                dateFormat: "H:i",
                time_24hr: true,
                minTime: "09:00",

            });


        });
    </script>
@endsection

