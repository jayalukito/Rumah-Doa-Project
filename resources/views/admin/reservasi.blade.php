@extends('template/layout')
@section('navbar')
    @extends('admin/template/navbar')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <span class="merriweather-bold text-center" style="font-size: 50">Welcome Admin

                </span>
            </div>
        </div>
        <div class="row">

            @if (session("success"))
                <div class="alert alert-success">
                   Reservasi ID {{ session("success")["id"] }}  {{ session("success")["pesan"] }}
                </div>
            @endif

            <div class="row">
                <div class="col">
                    <span class="merriweather-bold" style="font-size: 30">Reservasi Kamar</span>
                </div>
            </div>

            <form action="/admin/docheckin" method="post">
                @csrf
            <div class="row">
                <div class="col">
                    <table class="display" id=tableKamar>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>USERNAME</th>
                                <th>NO UNIT</th>
                                <th>UNIT</th>
                                <th>TANGGAL PINJAM</th>
                                <th>TANGGAL KEMBALI</th>
                                <th>TOTAL</th>
                                <th>KONFIRMASI</th>
                                <th>ACTION</th>
                            </tr>


                        </thead>
                        <tbody>
                            @foreach ($kamar as $k)
                                <tr>
                                    <th scope="row">{{ $k->id }}</th>
                                    <td>{{ $k->name }}</td>
                                    <td>{{ $k->kode_kamar }}</td>
                                    <td>{{ $k->nama }}</td>
                                    <td>{{ $k->tgl_pinjam }}</td>
                                    <td>{{ $k->tgl_kembali }}</td>
                                    <td>{{ $k->total }}</td>
                                    <td>
                                        @if ($k->konfirmasi == 0)
                                            <span class="badge text-bg-warning">Waiting</span>
                                        @else
                                            <span class="badge text-bg-success">Checked</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($k->konfirmasi == 1)
                                        <button class="btn btn-warning" type="submit" name="checkin" value="{{$k->id}}" >UnCheck In</button>
                                        @else
                                            <button class="btn btn-success" type="submit" name="checkin" value="{{$k->id}}">Check In</button>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>

                </div>
            </div>

            </div>


                <div class="row">
                    <div class="col">
                        <span class="merriweather-bold" style="font-size: 30">Reservasi Villa</span>
                    </div>
                </div>
                <table class="display" id=tableVilla>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">USERNAME</th>
                            <th scope="col">UNIT</th>
                            <th scope="col">TANGGAL PINJAM</th>
                            <th scope="col">TANGGAL KEMBALI</th>
                            <th scope="col">TOTAL</th>
                            <th scope="col">KONFIRMASI</th>
                            <th scope="col">ACTION</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($villa as $v)
                            <tr>
                                <th scope="row">{{ $v->id }}</th>
                                <td>{{ $v->name }}</td>
                                <td>{{ $v->nama }}</td>
                                <td>{{ $v->tgl_pinjam }}</td>
                                <td>{{ $v->tgl_kembali }}</td>
                                <td>{{ $v->total }}</td>
                                <td>
                                    @if ($k->konfirmasi == 0)
                                        <span class="badge text-bg-warning">Waiting</span>
                                    @else
                                        <span class="badge text-bg-success">Checked</span>
                                    @endif
                                </td>
                                <td>
                                    @if($k->konfirmasi == 1)
                                    <button class="btn btn-warning" type="submit" name="checkin" value="{{$k->id}}" >UnCheck In</button>
                                    @else
                                        <button class="btn btn-success" type="submit" name="checkin" value="{{$k->id}}">Check In</button>
                                    @endif

                                </td>
                            </tr>
                        @endforeach

                    </tbody>

                   
                </table>
            </div>
        </div>

        </form>
    </div>


    <script>

    $(document).ready(function () {
        // Initialize the DataTable
        // new DataTable('#tableKamar',
        // {
        //     initComplete: function () {
        //         this.api()
        //             .columns()
        //             .every(function () {
        //                 let column = this;
        //                 let title = column.footer().textContent;

        //                 // Create input element
        //                 let input = document.createElement('input');
        //                 input.placeholder = title;
        //                 column.footer().replaceChildren(input);

        //                 // Event listener for user input
        //                 input.addEventListener('keyup', () => {
        //                     if (column.search() !== this.value) {
        //                         column.search(input.value).draw();
        //                     }
        //                 });
        //             });
        //     }
        // });

        $('#tableKamar').DataTable( {
            responsive:true,
            scrollX: true
        });

        new DataTable('#tableVilla', {
            responsive: true,
            scrollX: true
        });
    });


    </script>
@endsection
