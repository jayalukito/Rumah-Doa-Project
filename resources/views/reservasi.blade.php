@extends('template/layout')

@section('navbar')
    @extends('template/navbar')
@endsection

@section('content')
    <div class="container-fluid">
        <form action="/reservasi/invoice" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-6 d-flex flex-column align-items-center">

                    <div class="row justify-content-center ">
                        <div class="col-auto">
                            <span class="merriweather-bold" style="font-size:30pt">Masukkan tanggal reservasi</span></h3>
                        </div>
                    </div>


                    <div class="row justify-content-center  my-3">
                        <div class="col-auto">
                            <div class="row">
                                <div class="col-md">
                                    Dari: <input type="text" name="date_from" id="time-picker" class="form-control">
                                </div>
                                <div class="col-md">
                                    Ke:<input type="text" name="date_to" id="time-picker" class= "form-control">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row justify-content-center  my-3">
                        <div class="col-auto">
                            <input type="button" class="btn btn-danger text-white merriweather-regular rounded-pill"
                                id="cekkamar" value="Cek Availabilitas">

                        </div>
                    </div>



                </div>
            </div>


            <div class="container">
                <div class="row justify-content-between">

                    <div class="col-md-5 text-center">
                        <div class="text-start" id="kamar">

                        </div>
                    </div>
                    <div class="col-md-5 text-center">
                        <div class="text-start" id="villa">

                        </div>
                    </div>


                </div>
        </form>
    </div>

    </div>



    <script>


            function validateDates(startDate, endDate) {
            // Convert the date strings to Date objects
            const start = new Date(startDate);
            const end = new Date(endDate);

            // Check if both dates are valid
            if (isNaN(start) || isNaN(end)) {
                return { valid: false, message: "Tolong isi tanggal terlebih dahlulu." };
            }

            // Compare the dates
            if (start > end) {
                return { valid: false, message: "Tanggal pinjam tidak boleh lebih kecil dari tanggal kembali" };
            }

            return { valid: true, message: "Dates are valid." };


        }
        $("#cekkamar").click(function() {


            start = $('input[name="date_from"]').val()
            end = $('input[name="date_to"]').val()


            const result = validateDates(start, end);

            if (!result.valid) {
                alert(result.message);
                return;
            }

            $("#kamar").empty();
            $("#villa").empty();

            $.ajax({

                type: "GET",
                url: "/cekreservasi/kamar",
                data: {
                    date_from: start,
                    date_to: end
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    let hasil = `
                        <h1 class="merriweather-regular">Kamar</h1>
                    `
                    response.forEach(kamar => {
                        hasil +=
                            `

                            <div class="card mb-3 merriweather-regular" style="max-width: 540px;">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/${kamar.img_kamar}' ) }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">${kamar.nama}</h5>
                                            <p class="card-text">Fasilitas: <br> ${kamar.fasilitas}</p> <br>
                                            <p class="card-text text-end">Sisa Unit: ${kamar.jml_kamar} </p>
                                            <p class="card-text text-end merriweather-bold">Harga: ${kamar.harga}</p>

                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row justify-content-end">
                                        <div class="col-auto">
                                            <button type="submit" name="tipe_kamar" value="${kamar.nama}" class="btn btn-danger rounded-pill">Book</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        `

                    });

                    $("#kamar").append(hasil);
                },
            })
            $.ajax({

                type: "GET",
                url: "/cekreservasi/villa",
                data: {
                    date_from: start,
                    date_to: end
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    let hasil = `
                        <h1 class="merriweather-regular">Villa</h1>
                        `

                    response.forEach(villa => {
                        hasil +=
                            `
                             <div class="card mb-3 merriweather-regular" style="max-width: 540px;">
                                <div class="row ">
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/${villa.img_villa}') }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">${villa.nama}</h5>
                                            <p class="card-text">Fasilitas: <br> ${villa.fasilitas}</p> <br>
                                            <p class="card-text text-end">Jumlah Kamar: ${villa.jml_kamar} </p>
                                            <p class="card-text text-end merriweather-bold">Harga: ${villa.harga}</p>

                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row justify-content-end">
                                        <div class="col-auto">
                                            <button type="submit" name="kode_villa" value="${villa.kode_villa}" class="btn btn-danger rounded-pill">Book</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            `

                    });



                    $("#villa").append(hasil);
                },
            })
        })

        $(document).ready(function() {
            flatpickr("#time-picker", {
                minDate: "today",

            });
        });
    </script>
@endsection

@section('script')
@endsection




{{-- <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="url(asset{{${kamar.img_kamar}}})" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">${kamar.nama}</h5>
                <p class="card-text">Fasilitas: <br> ${kamar.fasilitas}</p>
                <p class="card-text text-end"><small class="text-body-secondary">${kamar.harga}</small></p>
            </div>
        </div>
    </div>
</div> --}}
