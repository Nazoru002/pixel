@extends('users.layouts.master')
@section('content')
<div class="text-center mb-4">
    <img src="{{asset('images/Asset 7@4x.png')}}" class="logo">
    <div class="w-100">
        <h5 class="logo-tagline">Jaminan Kerja</h5>
    </div>
</div>
<div class="card panel login-box p-3">
    <div class="card-body">
        <h2 class="box-title">Member Area</h2>
        @if(session()->has('error'))
            <div class="alert alert-danger text-left" role="alert">
                <b>Error</b> : {{session()->get('error')}}
            </div>
        @endif
        <form action="{{route('loginToken')}}" method="POST">
            @csrf
            <div class="md-form  input-with-post-icon">
                <i class="fas fa-key input-prefix"></i>
                <input type="text" id="kode_sekolah" class="form-control" name="kode_sekolah">
                <label for="kode_sekolah">Kode Sekolah</label>
                <!-- <small class="form-text text-muted">Masukan kode sekolah dikolom ini</small> -->
            </div>
            <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light btn-block">Masuk</button>
        </form>
    </div>
</div>
<div class="w-100 text-center mt-2">
    <h3 class="footer-tagline">Suksesmu Berawal Dari Sini!</h3>
</div>
@endsection