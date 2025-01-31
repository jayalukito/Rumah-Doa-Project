
@extends("template.layout")


@section("content")
<div class="container my-3">
    <div class="row">
        <div class="col">
            <a href="{{url('/admin/unit')}}"><button class="btn btn-danger rounded-pill merriweather-regular"><i class="bi bi-arrow-left"></i>Back</button></a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <span class="merriweather-bold" style="font-size: 50px">Recover Unit Dihapus</span>
        </div>
    </div>

    @if (session("success"))
        <div class="alert alert-success">
            {{ session("success") }}
        </div>
    @endif

    <div class="row">
        <div class="col">
            <span class="merriweather-bold" style="font-size: 30px">List Kamar</span>
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
                            <td>{{ $k->Tipe->kode_kamar }}</td>
                            <td>{{ $k->Tipe->nama }}</td>
                            <td>{{ $k->Tipe->harga }}</td>
                            <td>{{ $k->Tipe->fasilitas }}</td>
                            <td>{{ $k->Tipe->jml_ranjang }}</td>
                            <td>

                                <form action="/admin/kamar/dorecover" method="post">
                                    @csrf
                                    <button class="btn btn-warning" name="kode_kamar" value="{{$k->kode_kamar}}">Recover</button>
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
            <span class="merriweather-bold" style="font-size: 30px">List Villa</span>
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
                                <form action="/admin/dorecover" method="post">
                                    @csrf
                                    <button class="btn btn-danger" name="kode_villa" value="{{$v->kode_villa}}">delete</button>
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
</script>
@endsection
