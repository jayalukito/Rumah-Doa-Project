@extends('template/layout')


@section('content')
    <div class="container-fluid my-3">

        <div class="row">
            <div class="col">
                <a href="{{url('/admin/unit')}}"><button class="btn btn-danger rounded-pill merriweather-regular"><i class="bi bi-arrow-left"></i>Back</button></a>
            </div>
        </div>

        <div class="row justify-content-center align-items-center">

            <div class="row justify-content-center my-3">
                <div class="col-auto">
                    <span class="merriweather-bold text-center" style="font-size: 30pt">Tambah Villa</span>
                </div>
            </div>
            <div class="col-6 merriweather-regular" style="font-size: 15pt">


                <form action="/admin/dotambahvilla" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        Nama Villa:
                        <input type="text" class="form-control" name="nama" id="" value="{{old("nama")}}" >
                    </div>

                    <div class="mb-3">
                        Jumlah Kamar:
                        <input type="number" class="form-control" name="jml_kamar" id="" min="1" value="{{old("jml_kamar")}}">

                    </div>
                    <div class="mb-3">
                        Jumlah Kapasitas:
                        <input type="number" class="form-control" name="kapasitas" id="" min="1" value="{{old("kapasitas")}}">

                    </div>
                    <div class="mb-3">
                        Fasilitas:
                        <textarea name="fasilitas" class="form-control" id="" width="200px" height="100px">{{old("fasilitas")}}</textarea>

                    </div>
                    <div class="mb-3">
                        Harga:
                        <input type="number" class="form-control" name="harga" id="" value="{{old("harga")}}">
                    </div>
                    <div class="mb-3">
                        Foto Villa:
                        <input type="file" name="img_villa" id="image" class="form-control" accept="image/*" required>
                    </div>

                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                    @endforeach

                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <button class="btn btn-success " type="submit">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
