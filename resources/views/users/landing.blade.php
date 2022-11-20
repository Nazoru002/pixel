@extends('users.layouts.master')
@section('content')
<div class="text-center mb-4">
    <img src="{{asset('images/Asset 7@4x.png')}}" class="logo">
    <div class="w-100">
        <!--<h5 class="logo-tagline">Jaminan Kerja</h5>-->
    </div>
</div>
<div class="card panel p-3">
    <div class="card-body">
        @php
            use App\Sekolah;
            $data = Sekolah::find(session()->get('id_sekolah'));
        @endphp
        <h3><b>SELAMAT DATANG</b><br> di website persiapan pemetaan potensi diri mahasiswa/i <!-- siswa/siswi --> <b>{{$data->nama_sekolah}}</b> <!-- kerjasama dengan International Professional Institute-->.</h3><br>
        <h3>Silahkan log-in terlebih dahulu sebelum melanjutkan</h3>
        <div class="form-grup text-center">
            <a href="{{route('user-login')}}" class="btn btn-primary btn-rounded">Log-in</a>
            <a href="{{url('logout')}}" class="btn btn-danger btn-rounded">Keluar</a>
        </div>
    </div>
</div> 
<div class="w-100 text-center mt-2">
    <h3 class="footer-tagline">Suksesmu Berawal Dari Sini!</h3>
</div>
@endsection