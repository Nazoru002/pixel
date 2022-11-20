@extends('admin.master_dashboard')
@section('title',"Tambah data Siswa")
@section('content')
@php
$jurusan = ['Agribisnis Pengolahan Hasil Pertanian','Agribisnis Perikanan Air Payau dan Laut','Agribisnis Perikanan Air Tawar','Agribisnis Tanaman Pangan dan Hortikultura','Agribisnis Tanaman Perkebunan','Agribisnis Ternak Ruminansia','Agribisnis Ternak Unggas','Agroindustri','Akuntansi dan Keuangan Lembaga','Animasi','Asisten Keperawatan','Bisnis Daring dan Pemasaran','Desain Fesyen','Desain Grafika','Farmasi Industri','Farmasi Klinis Dan Komunitas','Hotel dan Restoran','Industri Peternakan','Kimia Analisis','Kimia Industri','Kimia Tekstil','Multimedia','Nautika Kapal Penangkap Ikan','Otomatisasi dan Tata Kelola Perkantoran','Otomatisasi Pertanian','Pemuliaan Dan Perbenihan Tanaman','Perbankan dan Keuangan Mikro','Perbankan Syariah','Perhotelan','Produksi dan Pengelolaan Perkebunan','Produksi dan Siaran Program Radio','Produksi dan Siaran Program Televisi','Produksi Film','Produksi Film dan Program Televisi','Rekayasa Perangkat Lunak','Seni Karawitan','Tata Boga','Tata Busana','Tata Kecantikan Kulit dan Rambut','Teknik Audio Video','Teknik Bodi Otomotif','Teknik dan Bisnis Sepeda Motor','Teknik Elektronika Industri','Teknik Instalasi Tenaga Listrik','Teknik Jaringan Tenaga Listrik','Teknik Kapal Penangkap Ikan','Teknik Kendaraan Ringan Otomotif','Teknik Komputer dan Jaringan','Teknik Mekanik Industri','Teknik Mekatronika','Teknik Otomasi Industrial','Teknik Pemesinan','Teknik Pendinginan dan Tata Udara','Teknik Pengelasan','Teknik Perancangan dan Gambar Mesin','Teknik Rehabilitasi dan Reklamasi Hutan','Teknik Tenaga Listrik','Teknik Transmisi Telekomunikasi','Teknologi Produksi Hasil Hutan','Usaha Perjalanan Wisata'];
    
@endphp
      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">
            
            @if(session()->has('error'))
              <div class="alert alert-danger" role="alert">
                <b>Error :</b> {{session()->get('error')}}
              </div>
            @endif
            @if(session()->has('success'))
              <div class="alert alert-success" role="alert">
                <b>Sukses :</b> {{session()->get('success')}}
              </div>
            @endif
            <div class="card-body">
                <h4>Isian Data Tunggal</h4>
                <form action="{{route('admin-siswa-create')}}" method="POST">
                    @csrf
                    <div class="form-group md-form">
                        <input type="text"class="form-control" name="nama_user" id="name" required>
                        <label for="name">Nama Siswa</label>
                    </div>
                    <div class="form-group text-left" style="position: relative;">
                        <label for="as">Asal Sekolah</label>
                        <select id="as" class="custom-select" name="id_sekolah">
                            @php
                              use App\Sekolah;
                              $sekolah = Sekolah::all();
                            @endphp
                            @foreach($sekolah as $s)
                              <option value="{{$s->id}}">{{$s->nama_sekolah}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group md-form">
                        <input type="text"class="form-control" name="username" id="usn" required>
                        <label for="usn">Username </label>
                    </div>
                    <div class="form-group md-form">
                        <input type="text"class="form-control" name="password" id="pwd" required>
                        <label for="pwd">Password </label>
                    </div>
                    
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
                    
                    <div class="form-group text-left" style="position: relative;">
                        <label for="ak">Asal Kelas <span class="text-red">*)</span></label>
                        <select id="ak" class="custom-select" name="kelas">
                            <option value="Kelas 10" 
                            {{((null !== old('kelas'))? ((old('kelas') == 'Kelas 10')?'selected':''):'selected')}}>Kelas 10</option>
                            <option value="Kelas 11" {{((null !== old('kelas'))? ((old('kelas') == 'Kelas 11')?'selected':''):'')}}>Kelas 11</option>
                            <option value="Kelas 12"
                            {{((null !== old('kelas'))? ((old('kelas') == 'Kelas 12')?'selected':''):'')}}>Kelas 12</option>
                        </select>
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
                    <div class="form-group pt-0 d-none" id="sub_jur2">
                        <span>Pilih angka 1,2,3, 4, 5, 6, 7, 8, 9 dan 10  sesuai jurusan dan kelas jurusan kamu berada sekarang masing masing<br>Contoh : 10-IPA 2 maka sub jurusan 2</span>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                    <a href="{{route('admin-siswa')}}" class="btn btn-rounded btn-danger">Kembali</a>
                </form>
                <hr>
                <h4>Import Dari Excel</h4>
                <form action="{{route('admin-siswa-import')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="file" aria-describedby="inputGroupFileAddon01" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                            <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-rounded mt-3">Import</button>
                </form>
                <p class="float-right mt-3"><i>Download format-nya </i><a href="{{asset('files/format-import-admin.xlsx')}}">disini</a></p>
            </div>

          </div>
          <!--/.Card-->

        </div>

      </div>
      <!--Grid row-->

@endsection
@section('js_addon')
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

  <!-- Charts -->
  <script>
    
    $('.lembaga_sekolah').on('change',function(){
       $('#sub_jur').removeClass('d-none');
       $('#sub_jur2').removeClass('d-none');
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
