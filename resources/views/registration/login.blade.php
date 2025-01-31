@extends('template/layout')
@section('content')
<div class="container">

    <div class="row merriweather-regular">
        <div class="col d-flex justify-content-center align-items-center flex-column" style="height:100vh">
            <img src="{{asset('images/logostmy.jpg')}}" width="200apx"alt="">
            <div class="border rounded p-3 py-3 mt-3" style="width : 50%">
                <form action="/dologin" method="post">
                    @csrf
                    <div class="mb-3">
                    <label for="exampleInputEmail1" name=username class="form-label">Email address</label>
                    <input type="email" name=email class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name=password class="form-control" >
                    </div>

                    <div class="mb-3">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </div>

                </form>
                <span>Belum punya akun? <a href="/register" style="color: blue; text-decoration: underline;">Register</a></span>
            </div>
        </div>
    </div>

</div>

@endsection
