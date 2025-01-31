@extends('template.layout')
@section('navbar')
    @extends('template/navbar')
@endsection

@section('content')

<div class="container">
    <span style="font-size: 30px;" class="merriweather-bold">Reservasi Saya</span>
    <div class="row">
        <div class="col">
            <table class="display" id=tableReservasi>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">UNIT</th>
                        <th scope="col">TANGGAL PINJAM</th>
                        <th scope="col">TANGGAL KEMBALI</th>
                        <th scope="col">TOTAL</th>

                    </tr>

                </thead>
                <tbody>
                    @foreach ($reservasi as $r)
                        <tr>
                            <th scope="row">{{ $r->id }}</th>
                            <td>{{ $r->unit }}</td>
                            <td>{{ $r->tgl_pinjam }}</td>
                            <td>{{ $r->tgl_kembali }}</td>
                            <td>{{ $r->total }}</td>
                        </tr>
                    @endforeach

                </tbody>


            </table>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="display" id=tablePeminjaman>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">FASILTIAS</th>
                        <th scope="col">TANGGAL PINJAM</th>
                        <th scope="col">JAM PINJAM</th>
                        <th scope="col">JAM KEMBALI</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($peminjaman as $p)
                        <tr>
                            <th scope="row">{{ $p->id }}</th>
                            <td>{{ $p->fasilitas->nama }}</td>
                            <td>{{ $p->tanggal }}</td>
                            <td>{{ $p->jam_pinjam }}</td>
                            <td>{{ $p->jam_kembali }}</td>
                        </tr>
                    @endforeach

                </tbody>


            </table>
        </div>
    </div>

</div>


<script>
      $('#tableReservasi').DataTable( {
            responsive:true,
            scrollX: true
        });
      $('#tablePeminjaman').DataTable( {
            responsive:true,
            scrollX: true
        });

</script>
@endsection
