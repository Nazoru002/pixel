@extends('users.layouts.master')
@section('content')
<div class="text-center mb-4">
    <!--<h1 class="page-title">PIXEL</h1>-->
    <img src="{{asset('images/Logo Piccel.png')}}" class="logo logo-stroke">
</div>
@php
    $jurusan = ['Agribisnis Pengolahan Hasil Pertanian','Agribisnis Perikanan Air Payau dan Laut','Agribisnis Perikanan Air Tawar','Agribisnis Tanaman Pangan dan Hortikultura','Agribisnis Tanaman Perkebunan','Agribisnis Ternak Ruminansia','Agribisnis Ternak Unggas','Agroindustri','Akuntansi dan Keuangan Lembaga','Animasi','Asisten Keperawatan','Bisnis Daring dan Pemasaran','Desain Fesyen','Desain Grafika','Farmasi Industri','Farmasi Klinis Dan Komunitas','Hotel dan Restoran','Industri Peternakan','Kimia Analisis','Kimia Industri','Kimia Tekstil','Multimedia','Nautika Kapal Penangkap Ikan','Otomatisasi dan Tata Kelola Perkantoran','Otomatisasi Pertanian','Pemuliaan Dan Perbenihan Tanaman','Perbankan dan Keuangan Mikro','Perbankan Syariah','Perhotelan','Produksi dan Pengelolaan Perkebunan','Produksi dan Siaran Program Radio','Produksi dan Siaran Program Televisi','Produksi Film','Produksi Film dan Program Televisi','Rekayasa Perangkat Lunak','Seni Karawitan','Tata Boga','Tata Busana','Tata Kecantikan Kulit dan Rambut','Teknik Audio Video','Teknik Bodi Otomotif','Teknik dan Bisnis Sepeda Motor','Teknik Elektronika Industri','Teknik Instalasi Tenaga Listrik','Teknik Jaringan Tenaga Listrik','Teknik Kapal Penangkap Ikan','Teknik Kendaraan Ringan Otomotif','Teknik Komputer dan Jaringan','Teknik Mekanik Industri','Teknik Mekatronika','Teknik Otomasi Industrial','Teknik Pemesinan','Teknik Pendinginan dan Tata Udara','Teknik Pengelasan','Teknik Perancangan dan Gambar Mesin','Teknik Rehabilitasi dan Reklamasi Hutan','Teknik Tenaga Listrik','Teknik Transmisi Telekomunikasi','Teknologi Produksi Hasil Hutan','Usaha Perjalanan Wisata'];
@endphp
<div class="card panel p-3 mb-5">
    <div class="card-body">
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

        <h4 style="font-weight: bolder;">Lengkapi Biodata Diri</h4>
        <form action="{{route('siswa-biodata-partial')}}" method="POST" class="form-biodata">
            @csrf
            
            
            <div class="form-group text-left">
                <label>Lembaga Sekolah <span class="text-red">*)</span></label>
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input lembaga_sekolah" id="ls1" name="lembaga_sekolah" data-id="1" required value="SMA" {{((old('lembaga_sekolah') == 'SMA')?'selected':'')}}>
                    <label class="custom-control-label" for="ls1">SMA</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                
                    <input type="radio" class="custom-control-input lembaga_sekolah" id="ls2" name="lembaga_sekolah" data-id="2" required value="SMK" {{((old('lembaga_sekolah') == 'SMK')?'selected':'')}}>
                    <label class="custom-control-label" for="ls2">SMK</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input lembaga_sekolah" id="ls3" name="lembaga_sekolah" data-id="3" required value="MA" {{((old('lembaga_sekolah') == 'MA')?'selected':'')}}>
                    <label class="custom-control-label" for="ls3">MA</label>
                </div>
            </div>
            <div class="form-group text-left d-none" style="position: relative;" id="jur_1">
                <label>Jurusan <span class="text-red">*)</span></label>
                <select class="custom-select">
                    <option value="Bahasa">Bahasa</option>
                    <option value="IPA">Ipa</option>
                    <option value="IPS">IPS</option>
                </select>
            </div>
            <div class="form-group text-left d-none" style="position: relative;" id="jur_2">
                <label>Jurusan <span class="text-red">*)</span></label>
                <select class="custom-select">
                    @foreach($jurusan as $j)
                        <option value="{{$j}}">{{$j}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group text-left d-none" style="position: relative;" id="jur_3">
                <label>Jurusan <span class="text-red">*)</span></label>
                <select class="custom-select">
                    <option value="Bahasa">Bahasa</option>
                    <option value="IPA">Ipa</option>
                    <option value="IPS">IPS</option>
                    <option value="Agama">Agama</option>
                </select>
            </div>
            <!-- <div class="form-group md-form d-none" style="position: relative;" id="sub_jur">
                <label for="sub_jur">Sub Jurusan <span class="text-red">*)</span></label>
                <input type="number" min="0" class="form-control">
            </div> -->
            <div class="form-group d-none" style="position: relative;" id="sub_jur">
                <label for="sub_jur">Sub Jurusan <span class="text-red">*)</span></label>
                <select class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            <div class="form-group mb-5">
                <button type="submit" id="btn_submit" class="btn btn-block btn-rounded btn-primary"><b>Submit</b></button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js_addon')
<script type="text/javascript">

    $('.lembaga_sekolah').on('change',function(){
       $('#sub_jur').removeClass('d-none');
       // $('#sub_jur').find('input').attr('name','sub_jurusan');
       // $('#sub_jur').find('input').attr('required',true);
        $('#sub_jur').find('select').attr('name','sub_jurusan');
        $('#sub_jur').find('select').attr('required',true);
       var id = $(this).data('id');
       $('#jur_1').addClass('d-none');
       $('#jur_2').addClass('d-none');
       $('#jur_3').addClass('d-none');
       $('#jur_1').find('select').removeAttr('name');
       $('#jur_2').find('select').removeAttr('name');
       $('#jur_3').find('select').removeAttr('name');
       $('#jur_1').find('select').removeAttr('required');
       $('#jur_2').find('select').removeAttr('required');
       $('#jur_3').find('select').removeAttr('required');
       $('#jur_'+id).removeClass('d-none');
       $('#jur_'+id).find('select').attr('name','jurusan');
       $('#jur_'+id).find('select').attr('required');
    });
</script>
@endsection