@extends('template/layout')
@section('navbar')
    @extends('template/navbar')
@endsection
@section('content')
    <div class="row justify-content-center my-3">
        <div class="col-auto">
            <span class="merriweather-bold text-center" style="font-size: 50">Fasilitas</span>
        </div>
    </div>
    <div class="container">



        <div class="row">
            <div class="col">
                <form action="/fasilitas/pinjam" method="get">
                    @foreach ($fasilitas as $fasil)
                        <div class="card mb-3 merriweather-regular">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src='{{ asset("storage/$fasil->img") }}' class="img-fluid rounded-start"
                                        alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $fasil->nama }}</h5>
                                        <p class="card-text">Fasilitas: <br> {{ $fasil->deskripsi }}</p> <br>
                                        <p class="card-text text-end merriweather-bold">Harga DP: {{ $fasil->harga }}</p>

                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row justify-content-end">
                                    <div class="col-auto">
                                        <button type="submit" name="id_fasilitas" value="{{ $fasil->id }}"
                                            class="btn btn-danger rounded-pill">Pinjam</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>


    </div>

    <script>
        // $('#cekkamar').click(function() {
        //     start = $('input[name="date_fromm"]').val()
        //     end = $('input[name="date_to"]').val()
        //     console.log('ping');

        //     $("#hasil").empty();

        //     $.ajax({
        //         type: "GET",
        //         url: "fasilitas/show",
        //         data: "",
        //         dataType: "JSON",
        //         success: function(response) {
        //             console.log(response);
        //             response.forEach(fasilitas => {
        //                 $('#hasil').append(
        //                     `

    //                     `
        //                 )
        //             })

        //         }
        //     });
        // })

        $(document).ready(function() {
            flatpickr("#time-picker", {})
        });
    </script>
@endsection
