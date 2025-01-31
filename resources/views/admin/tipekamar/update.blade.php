
@extends('template.layout')

@section('content')
<div class="row justify-content-center ">
    <div class="col-md-6">
        <div class="row justify-content-center">
            <div class="col-auto">
                <span class="merriweather-bold text-center" style="fpont-size: 30pt">Tambah Tipe Kamar</span>
            </div>
        </div>

        <div class="row">
            <div class="col border rounded">
                <form action="/admin/tipekamar/doupdatetipekamar" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        Nama:
                        <input type="text" name="nama" id="" class="form-control" value="{{$tipekamar->nama}}">
                    </div>
                    <div class="mb-3">
                        Harga:
                        <input type="number" name="harga" id="" class="form-control" value="{{$tipekamar->harga}}">
                    </div>
                    <div class="mb-3">
                        Fasilitas:
                        <textarea name="fasilitas" id="" width="200px" class="form-control" height="150px">{{$tipekamar->fasilitas}}</textarea>
                    </div>
                    <div class="mb-3">
                        Jumlah Ranjang:
                        <input type="number" name="jml_ranjang" id="" class="form-control" value="{{$tipekamar->jml_ranjang}}">
                    </div>

                    <div class="mb-3">
                        Gambar Kamar
                        <input type="file" name="img_kamar" id="image" class="form-control" accept="image/*">
                    </div>

                    <div class="row justify-content-center my-3">
                        <div class="col-auto">
                            <button type="submit" name="id" value="{{$tipekamar->id}}" class="btn btn-success">Update Tipe Kamar</button>
                        </div>
                    </div>

            </div>
        </div>


        </form>
    </div>
</div>
@endsection





