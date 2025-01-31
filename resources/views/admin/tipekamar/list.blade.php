@extends('template.layout')

@section('content')
    @section('navbar')
        @extends('admin/template/navbar')
    @endsection

    <div class="container my-3">
        <div class="row">
            <div class="col">
                <p class="merriweather-bold" style="font-size: 30px">List Tipe Kamar</p>
            </div>

            @if(session("success"))
                <div class="alert alert-success">
                    {{ session("success") }}
                </div>
            @endif

            @if(session("error"))
                <div class="alert alert-danger">
                    {{ session("error") }}
                </div>
            @endif

            <div class="col-auto">
                <a href="{{ url('/admin/tipekamar/tambah', []) }}"><button class="btn btn-success">Tambah Tipe Kamar</button></a>
                <a href="{{ url('/admin/tipekamar/recover', []) }}"><button class="btn btn-warning">Recover Tipe Kamar Terhapus</button></a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table id="tableTipeKamar" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAMA</th>
                            <th>HARGA</th>
                            <th>FASILITAS</th>
                            <th>JUMLAH RANJANG</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipekamar as $k)
                            <tr>
                                <td>{{ $k->id }}</td>
                                <td>{{ $k->nama }}</td>
                                <td>{{ $k->harga }}</td>
                                <td>{{ $k->fasilitas }}</td>
                                <td>{{ $k->jumlah_ranjang }}</td>

                                <td>
                                    <form action="/admin/tipekamar/deletetipekamar" method="post">
                                        @csrf
                                        <button class="btn btn-danger" name="id" value="{{$k->id}}">delete</button>
                                    </form>

                                    <form action="/admin/tipekamar/updatetipekamar" method="post">
                                        @csrf
                                        <button class="btn btn-warning" name = "id" value="{{$k->id}}">update</button>
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
    let table1 = new DataTable('#tableTipeKamar', {
            responsive: true,
            scrollX: true
        });
</script>
@endsection
