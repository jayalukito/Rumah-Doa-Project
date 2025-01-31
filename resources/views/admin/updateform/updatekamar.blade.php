@extends('template/layout')



@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col">
                <a href="/admin/unit"><button class="btn btn-danger rounded-pill merriweather-regular"><i class="bi bi-arrow-left"></i>Back</button></a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="row justify-content-center">
                    <div class="col-auto">
                        <span class="merriweather-bold text-center" style="font-size: 30pt">Update Kamar {{$kamar->kode_kamar}}</span>
                    </div>
                </div>

                @if(session("success"))
                    <div class="alert alert-success">
                        {{ session("success") }}
                    </div>
                @endif

                <form action="/admin/doupdatekamar" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$kamar->kode_kamar}}">
                    <div class="row">
                        <div class="col border rounded py-3">
                            Pilih Tipe Kamar:
                            <select name="tipe_kamar" id="" class="form-control">
                                @foreach ($tipe_kamar as $tipe)
                                    <option value="{{$tipe->id}}"> {{$tipe->nama}}  </option>

                                @endforeach
                            </select>

                            <div class="row justify-content-center my-3">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-success">Update Kamar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>


    </div>
@endsection
