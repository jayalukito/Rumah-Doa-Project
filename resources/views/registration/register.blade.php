@extends('template/layout')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col d-flex justify-content-center align-items-center flex-column" style="height:100vh">
                <img src="{{ asset('images/logostmy.jpg') }}" width="200apx"alt="">
                <div class="border rounded p-3 py-3 mt-3" style="width : 50%">
                    <form action="/doregister" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name=email class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name=phone class="form-control">
                        </div>



                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name=password class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password Confirm</label>
                            <input type="password" name=password_confirmation class="form-control">
                        </div>

                        @if ($errors->any())

                            @foreach ($errors->all() as $error)
                                <li class="alert alert-danger">{{ $error }}</li>
                            @endforeach

                        @endif

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
