@extends('template/layout')

@section('navbar')
    @extends('admin/template/navbar')
@endsection

@section('content')
    <div class="container">
        <span class="merriweather-bold text-center" style="font-size: 50">Welcome Admin

        </span>
        <div class="row my-3">
            <div class="col">
                <div class="row">
                    <div class="col align-start">
                        <span class="merriweather-bold" style="font-size: 30">List Fasilitas</span>
                    </div>

                    <div class="col-auto"> <a href="{{ url('/admin/tambahfasilitas', []) }}"><button class="btn btn-success">Tambah Fasilitas</button></a></div>
                </div>


                @if(session("success"))
                    <div class="alert alert-success">
                        {{ session("success") }}
                    </div>
                @endif
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <a href="{{ url('/admin/recover', []) }}"><button class="btn btn-warning">Recover Unit Dihapus</button></a>
                    </div>
                </div>

                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAMA</th>
                            <th>DESKRIPSI</th>
                            <th>HARGA</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fasilitas as $f)
                            <tr>
                                <td>{{ $f->id }}</td>
                                <td>{{ $f->nama }}</td>
                                <td>{{ $f->deskripsi }}</td>
                                <td>{{ $f->harga }}</td>
                                <td>
                                    <form action="/admin/deletefasilitas" method="post">
                                        @csrf
                                        <button class="btn btn-danger" name="id" value="{{$f->id}}">delete</button>
                                    </form>

                                    <form action="/admin/updatefasilitas" method="post">
                                        @csrf
                                        <button class="btn btn-warning" name="id" value="{{$f->id}}">update</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        let table = new DataTable('#myTable', {
            responsive: true
        });
    </script>
@endsection
