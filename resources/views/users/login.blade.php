@extends('users.layouts.master')
@section('content')
<div class="text-center mb-4">
    <!--<h1 class="page-title">PIXEL</h1>-->
    <img src="{{asset('images/Logo Piccel.png')}}" class="logo logo-stroke">
</div>
<div class="card panel login-box p-3">
    <div class="card-body">
        <h2 class="box-title">Login</h2>
        @if(session()->has('error'))
            <div class="alert alert-danger text-left" role="alert">
                <b>Error</b> : {{session()->get('error')}}
            </div>
        @endif
        <form action="{{route('user-login')}}" method="POST">
            @csrf
            <div class="md-form  input-with-post-icon">
                <i class="fas fa-user input-prefix"></i>
                <input type="text" id="username" class="form-control" name="username">
                <label for="username">Username</label>
                <!-- <small class="form-text text-muted">Masukan kode sekolah dikolom ini</small> -->
            </div>
            <div class="md-form  input-with-post-icon">
                <i class="fas fa-lock input-prefix"></i>
                <input type="password" id="password" class="form-control" name="password">
                <label for="password">Password</label>
                <!-- <small class="form-text text-muted">Masukan kode sekolah dikolom ini</small> -->
            </div>
            <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light btn-block">Masuk</button>
        </form>
    </div>
</div> 
@endsection