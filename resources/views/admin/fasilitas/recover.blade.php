@extends('template.layout')

@section('content')
<div class="container merriweather-regular my-3">
    <div class="row">
        <div class="col">
            <a href="/admin/fasilitas"><button class="btn btn-danger rounded-pill merriweather-regular"><i class="bi bi-arrow-left"></i>Back</button></a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-auto"> <span style="font-size: 30pt">Fasilitas Dihapus</span></div>
    </div>
    @if(session("success"))
        <div class="alert alert-success">
            {{ session("success") }}
        </div>
    @elseif(session("error"))
        <div class="alert alert-danger">
            {{ session("error") }}
        </div>
    @endif
    <div class="row">
        <div class="col">
            <table id="tableFasilitas" class="display">
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

                                <form action="/admin/dorecover" method="post">
                                    @csrf
                                    <button class="btn btn-warning" name="id" value="{{$f->id}}">Recover</button>
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
    let table1= new DataTable("#tableFasilitas", {
        responsive: true,
        scrollX: true
    });
</script>
@endsection
