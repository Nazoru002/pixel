@extends('users.layouts.master')
@section('content')
<div class="text-center mb-4">
    <!--<h1 class="page-title">PIXEL</h1>-->
    <img src="{{asset('images/Logo Piccel.png')}}" class="logo logo-stroke">
</div>
<div class="card panel p-3">
    <div class="card-body">
        @if(session()->has('success'))
            <div class="alert alert-success">
                <b>Sukses:</b> {{session()->get('success')}}
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
        @php
            use App\DetailSiswa;
            $data = DetailSiswa::where('id_user',Auth::id())->first();
            $hastrack = false;
            if($data){
                $hastrack = ($data->tracker_lanjut != null && $data->tracker_lanjut != "")? true : false;
            }
        @endphp
        <h2 class="box-title">Tracker Study</h2>
        @if($hastrack)
        
        <ul class="list-group list-group-flush text-left">
          <li class="list-group-item"><div class="row"><div class="col-5"><b>Melanjutkan Ke </b></div><div class="col-7"> : {{$data->tracker_lanjut}}</div></div></li>
          <li class="list-group-item"><div class="row"><div class="col-5"><b>Nama Universitas/Perusahaan </b></div><div class="col-7"> : {{$data->tracker_nama}}</div></div></li>
          <li class="list-group-item"><div class="row"><div class="col-5"><b>Program Studi/Jabatan </b></div><div class="col-7"> : {{$data->tracker_bidang}}</div></div></li>
        </ul>
        <hr>
        <h4 class="text-left">Rubah Data</h4>
        @endif
        <hr>
        <form action="{{route('siswa-tracker')}}" method="POST">
            @csrf
            <div class="form-group text-left">
                <label>Kemanakah anda melanjutkan setelah lulus sekolah (SMK/SMA/MA) ?</label>
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input minat_melanjutkan" id="minat1" name="tracker_lanjut" required value="Kuliah" {{((old('tracker_lanjut') == 'Kuliah')?'selected':'')}}>
                    <label class="custom-control-label" for="minat1">Kuliah</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input minat_melanjutkan" id="minat2" name="tracker_lanjut" required value="Kerja" {{((old('tracker_lanjut') == 'Kerja')?'selected':'')}}>
                    <label class="custom-control-label" for="minat2">Kerja</label>
                </div>
            </div>
            <div id="kuliah_form" class="d-none">
                <div class="form-group md-form">
                    <input type="text" class="form-control" id="lanjut1">
                    <label for="lanjut1">Apa nama Universitas/Perguruan Tinggi tempat kamu menempuh pendidikan sekarang ?<span class="text-red">*)</span></label>
                </div>
                <div class="form-group md-form">
                    <input type="text" class="form-control" id="lanjut2">
                    <label for="lanjut2">Program Studi apa yang sedang ditempuh ? <span class="text-red">*)</span></label>
                </div>
            </div>
            
            <div id="kerja_form" class="d-none">
                <div class="form-group md-form">
                    <input type="text" class="form-control" id="lanjut3">
                    <label for="lanjut3">Apa nama Perusahaan tempat kamu bekerja sekarang ? <span class="text-red">*)</span></label>
                </div>
                <div class="form-group md-form">
                    <input type="text" class="form-control" id="lanjut4">
                    <label for="lanjut4">Apa jabatan kamu sekarang pada perusahaan tersebut ? <span class="text-red">*)</span></label>
                </div>
            </div>
            
            <button id="btn_submit" type="submit" class="btn btn-block btn-rounded btn-primary" disabled>Submit</button>
        </form>
    </div>
</div>
@endsection

@section('js_addon')
<script type="text/javascript">
    $('.minat_melanjutkan').on('change',function(){
       var val = $(this).val();
       if(val == "Kuliah"){
           $('#kuliah_form').removeClass('d-none');
           $('#kerja_form').addClass('d-none');
           $('#lanjut3').removeAttr('name');
           $('#lanjut4').removeAttr('name');
           $('#lanjut3').removeAttr('required');
           $('#lanjut4').removeAttr('required');
           $('#lanjut1').attr('name','tracker_nama');
           $('#lanjut2').attr('name','tracker_bidang');
           $('#lanjut1').attr('required',true);
           $('#lanjut2').attr('required',true);
           $('#btn_submit').removeAttr('disabled');
       }
       else if(val == "Kerja"){
           $('#kerja_form').removeClass('d-none');
           $('#kuliah_form').addClass('d-none');
           $('#lanjut1').removeAttr('name');
           $('#lanjut2').removeAttr('name');
           $('#lanjut1').removeAttr('required');
           $('#lanjut2').removeAttr('required');
           $('#lanjut3').attr('name','tracker_nama');
           $('#lanjut4').attr('name','tracker_bidang');
           $('#lanjut3').attr('required',true);
           $('#lanjut4').attr('required',true);
           $('#btn_submit').removeAttr('disabled');
       }
       else{
           alert('Kosong');
       }
    });
</script>
@endsection