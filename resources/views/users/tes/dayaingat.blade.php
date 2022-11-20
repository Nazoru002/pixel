@extends('users.layouts.master')
@section('content')
<div class="text-center mb-4">
    <!--<h1 class="page-title">PIXEL</h1>-->
    <img src="{{asset('images/Logo Piccel.png')}}" class="logo logo-stroke">
</div>
<div class="card panel login-box p-3">
    <div class="card-body">
        <h2 class="box-title">Tes Daya Ingat</h2>
        @if(session()->has('success'))
            <div class="alert alert-success">
                <b>Sukses:</b> {{session()->get('success')}}
            </div>
        @endif
        @php
            use App\JawabanTesUser;
            $data = JawabanTesUser::where('id_user',Auth::user()->id)->where('type','daya_ingat')->with('rkunci')->get();
        @endphp
        <div class="bold text-left">
            <ul>
                <li>Tujuan Tes : Tes ini diperuntukan untuk mengetahui kemampuan daya ingat anda</li>
                <li>Jumlah Soal : 10 Soal</li>
                @if(count($data) > 0)
                    <li>Status Pengerjaan : <span class="text-success">Sudah Selesai</span></li>
                @else
                    <li>Status Pengerjaan : <span class="text-danger">Belum Selesai</span></li>
                @endif
                <li>Instruksi Pengerjaan : <ul><li>Peserta akan diperlihatkan 8 huruf yang berbeda dalam waktu 5 detik.</li><li>Dalam rentan waktu tersebut, peserta harus mengingat letak setiap huruf.</li><li>Peserta kemudian akan diberikan pertanyaan berupa dimana letak salah satu huruf yang sebelumnya sudah diperlihatkan.</li></ul></li>
            </ul>
        </div>
        <div class="text-center bold">
            @if(count($data) < 1)
                <a href="{{route('siswa-tes-dayaingat-start')}}" class="btn btn-rounded btn-primary">Mulai</a>
            @endif
            <a href="{{route('siswa-index')}}" class="btn btn-rounded btn-danger">Halaman Utama</a>
        </div>
    </div>
</div> 
@endsection