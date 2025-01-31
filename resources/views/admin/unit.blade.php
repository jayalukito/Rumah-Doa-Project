@extends('template/layout')
@section('navbar')
    @extends('admin/template/navbar')
@endsection

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Form</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
            <a href="{{ url('/admin/newvilla') }}"> <button type="button" class="btn btn-success">Tambah Villa</button> </a>
            <a href="{{ url('/admin/newkamar') }}"> <button type="button" class="btn btn-primary">Tambah Kamar</button> </a>
            </div>
        </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <span class="merriweather-bold" style="font-size: 50">List Unit</span>

                <div class="my-3">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Unit
                      </button>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ url('/admin/kamar/recover', []) }}"><button class="btn btn-warning">Recover Unit Dihapus</button></a>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <span class="merriweather-bold" style="font-size: 30">List Kamar</span>
                    </div>
                    <div class="col-auto">
                        <a href="{{ url('/admin/tipekamar/list
                        ', []) }}"><button class="btn btn-success">List Tipe Kamar</button></a>
                    </div>
                </div>

                {{-- KAMAR --}}
                <table id="tableKamar" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>KODE KAMAR</th>
                            <th>TIPE KAMAR</th>
                            <th>HARGA</th>
                            <th>FASILITAS</th>
                            <th>JUMLAH RANJANG</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kamar as $k)
                            <tr>
                                <td>{{ $k->id }}</td>
                                <td>{{ $k->kode_kamar }}</td>
                                <td>{{ $k->Tipe->nama }}</td>
                                <td>{{ $k->Tipe->harga }}</td>
                                <td>{{ $k->Tipe->fasilitas }}</td>
                                <td>{{ $k->Tipe->jml_ranjang }}</td>
                                <td>
                                    <form action="/admin/deletekamar" method="post">
                                        @csrf
                                        <button class="btn btn-danger" name="id" value="{{$k->kode_kamar}}">delete</button>
                                    </form>

                                    <form action="/admin/updatekamar" method="post">
                                        @csrf
                                        <button class="btn btn-warning" name = "id" value="{{$k->kode_kamar}}">update</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>

            </div>
        </div>

        <div class="row">
            <div class="col">
                <span class="merriweather-bold" style="font-size: 30">List Villa</span>
                {{-- KAMAR --}}
                <table id="tableVilla" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>KODE VILLA</th>
                            <th>NAMA</th>
                            <th>JUMLAH KAMAR</th>
                            <th>KAPASITAS</th>
                            <th>FASILITAS</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($villa as $v)
                            <tr>
                                <td>{{ $v->id }}</td>
                                <td>{{ $v->kode_villa }}</td>
                                <td>{{ $v->nama }}</td>
                                <td>{{ $v->jml_kamar }}</td>
                                <td>{{ $v->kapasitas }}</td>
                                <td>{{ $v->fasilitas }}</td>
                                <td>
                                    <form action="/admin/deletevilla" method="post">
                                        @csrf
                                        <button class="btn btn-danger" name = "id" value="{{$v->id}}">delete</button>
                                    </form>

                                    <form action="/admin/updatevilla" method="get">
                                        @csrf
                                        <button class="btn btn-warning" name = "id" value="{{$v->id}}">update</button>
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
        let table1 = new DataTable('#tableVilla', {
            responsive: true,
            scrollX: true
        });
        let table2 = new DataTable('#tableKamar', {
            responsive: true,
            scrollX: true
        });

        const myModal = document.getElementById('myModal')

        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
@endsection
