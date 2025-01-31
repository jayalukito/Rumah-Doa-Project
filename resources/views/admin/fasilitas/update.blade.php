@extends('template/layout')

@section("content")
<div class="container">
    <div class="row my-3">
        <div class="col">
            <a href="/admin/fasilitas"><button class="btn btn-danger rounded-pill merriweather-regular"><i class="bi bi-arrow-left"></i>Back</button></a>
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            <span class="merriweather-bold" style="font-size: 30pt">Update Fasilitas</span>
        </div>
    </div>
    <form action="/admin/doupdatefasilitas" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row justify-content-center merriweather-regular">
        <div class="col-6">
            <div class="mb-3">
                Nama:
                <input type="text" name="nama" id="" class="form-control" value="{{$fasilitas->nama}}">
            </div>
            <div class="mb-3">
                Deskripsi:
                <textarea name="deskripsi" id="" width="200px" class="form-control" height="150px">{{$fasilitas->deskripsi}}</textarea>
            </div>
            <div class="mb-3">
                Harga:
                <input type="number" name="harga" id=""  class="form-control" value="{{$fasilitas->harga}}">
            </div>
            <div class="mb-3">
                Foto Fasilitas:
                <input type="file" name="img" id="image" class="form-control" accept="image/*" required>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-auto">
                    <button class="btn btn-success" name="id" value={{$fasilitas->id}} type="submit">Update Fasilitas</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
