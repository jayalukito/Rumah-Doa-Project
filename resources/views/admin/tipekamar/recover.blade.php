@extends('template.layout')

@section('content')
<div class="container merriweather-regular my-3">
    <div class="row">
        <div class="col">
            <a href="/admin/tipekamar/list"><button class="btn btn-danger rounded-pill merriweather-regular"><i class="bi bi-arrow-left"></i>Back</button></a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-auto"> <span style="font-size: 30pt">Tipe Kamar</span></div>
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

                                <form action="/admin/tipekamar/dorecovertipekamar" method="post">
                                    @csrf
                                    <button class="btn btn-warning" name = "id" value="{{$k->id}}">recover</button>
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
    let table1= new DataTable("#tableTipeKamar", {
        responsive: true,
        scrollX: true
    });
</script>
@endsection
