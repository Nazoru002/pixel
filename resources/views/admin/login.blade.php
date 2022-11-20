@extends('admin.master_login')
@section('content')
<div class="card panel login-box p-3">
    <div class="card-body">
        <h2 class="box-title">Admin Area</h2>
        @if(session()->has('error'))
            <div class="alert alert-danger text-left" role="alert">
                <b>Error</b> : {{session()->get('error')}}
            </div>
        @endif
        <form action="{{route('admin-login')}}" method="POST">
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