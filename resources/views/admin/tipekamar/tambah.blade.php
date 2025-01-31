
@extends('template.layout')

@section('content')
<div class="row justify-content-center ">
    <div class="col-md-6">
        <div class="row justify-content-center">
            <div class="col-auto">
                <span class="merriweather-bold text-center" style="font-size: 30pt">Tambah Tipe Kamar</span>
            </div>
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

        <div class="row">
            <div class="col border rounded">
                <form action="{{ url('admin/dotambahtipekamar', []) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        Nama:
                        <input type="text" name="nama" id="" class="form-control" value="{{old('nama')}}">
                    </div>
                    <div class="mb-3">
                        Harga:
                        <input type="number" name="harga" id="" class="form-control" value="{{old('harga')}}">
                    </div>
                    <div class="mb-3">
                        Fasilitas:
                        <textarea name="fasilitas" id="" width="200px" class="form-control" height="150px">{{old('fasilitas')}}</textarea>
                    </div>
                    <div class="mb-3">
                        Jumlah Ranjang:
                        <input type="number" name="jml_ranjang" id="" class="form-control" value="{{old('jml_ranjang')}}">
                    </div>

                    <div class="mb-3">
                        Gambar Kamar
                        <input type="file" name="img_kamar" id="image" class="form-control" accept="image/*" required>
                    </div>

                    <div class="row justify-content-center my-3">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success">Tambah Tipe Kamar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>
</div>
@endsection





