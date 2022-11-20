@extends('users.layouts.master')
@section('content')
<div class="text-center mb-4">
    <!--<h1 class="page-title">PIXEL</h1>-->
    <img src="{{asset('images/Logo Piccel.png')}}" class="logo logo-stroke">
</div>
<div class="card panel login-box p-3">
    <div class="card-body">
        <h2 class="box-title">Pengaturan</h2>
        @if(session()->has('error'))
            <div class="alert alert-danger text-left" role="alert">
                <b>Error</b> : {{session()->get('error')}}
            </div>
        @endif
        
        @if ($errors->any())
            <div class="alert alert-danger text-left">
                <b>Terdapat Error pada pengisian formulir : </b>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h4 class="text-left">Ganti Password</h4>
        <form action="{{route('siswa-settings')}}" method="POST">
            @csrf
            <div class="md-form input-with-post-icon">
                <i class="fas fa-lock input-prefix"></i>
                <input type="password" id="password" class="form-control" name="password_lama" required>
                <label for="password">Password Lama</label>
                <!-- <small class="form-text text-muted">Masukan kode sekolah dikolom ini</small> -->
            </div>
            <div class="md-form input-with-post-icon">
                <i class="fas fa-lock input-prefix"></i>
                <input type="password" id="password" class="form-control" name="password_baru" required>
                <label for="password">Password Baru</label>
                <!-- <small class="form-text text-muted">Masukan kode sekolah dikolom ini</small> -->
            </div>
            <div class="md-form input-with-post-icon">
                <i class="fas fa-lock input-prefix"></i>
                <input type="password" id="password" class="form-control" name="konfirmasi_password_baru" required>
                <label for="password">Konfirmasi Password Baru</label>
                <!-- <small class="form-text text-muted">Masukan kode sekolah dikolom ini</small> -->
            </div>
            <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light btn-block">Rubah</button>
        </form>
    </div>
</div> 
@endsection