@extends('users.layouts.master')
@section('content')
<div class="text-center mb-4">
    <!--<h1 class="page-title">PIXEL</h1>-->
    <img src="{{asset('images/Logo Piccel.png')}}" class="logo logo-stroke">
</div>
@php
    use App\DetailSiswa;
    $jurusan = ['Agribisnis Pengolahan Hasil Pertanian','Agribisnis Perikanan Air Payau dan Laut','Agribisnis Perikanan Air Tawar','Agribisnis Tanaman Pangan dan Hortikultura','Agribisnis Tanaman Perkebunan','Agribisnis Ternak Ruminansia','Agribisnis Ternak Unggas','Agroindustri','Akuntansi dan Keuangan Lembaga','Animasi','Asisten Keperawatan','Bisnis Daring dan Pemasaran','Desain Fesyen','Desain Grafika','Farmasi Industri','Farmasi Klinis Dan Komunitas','Hotel dan Restoran','Industri Peternakan','Kimia Analisis','Kimia Industri','Kimia Tekstil','Multimedia','Nautika Kapal Penangkap Ikan','Otomatisasi dan Tata Kelola Perkantoran','Otomatisasi Pertanian','Pemuliaan Dan Perbenihan Tanaman','Perbankan dan Keuangan Mikro','Perbankan Syariah','Perhotelan','Produksi dan Pengelolaan Perkebunan','Produksi dan Siaran Program Radio','Produksi dan Siaran Program Televisi','Produksi Film','Produksi Film dan Program Televisi','Rekayasa Perangkat Lunak','Seni Karawitan','Tata Boga','Tata Busana','Tata Kecantikan Kulit dan Rambut','Teknik Audio Video','Teknik Bodi Otomotif','Teknik dan Bisnis Sepeda Motor','Teknik Elektronika Industri','Teknik Instalasi Tenaga Listrik','Teknik Jaringan Tenaga Listrik','Teknik Kapal Penangkap Ikan','Teknik Kendaraan Ringan Otomotif','Teknik Komputer dan Jaringan','Teknik Mekanik Industri','Teknik Mekatronika','Teknik Otomasi Industrial','Teknik Pemesinan','Teknik Pendinginan dan Tata Udara','Teknik Pengelasan','Teknik Perancangan dan Gambar Mesin','Teknik Rehabilitasi dan Reklamasi Hutan','Teknik Tenaga Listrik','Teknik Transmisi Telekomunikasi','Teknologi Produksi Hasil Hutan','Usaha Perjalanan Wisata'];
    $rdet = DetailSiswa::where('id_user',Auth::id())->first();
    $hassekolah = false;
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

        <h4 style="font-weight: bolder;">Biodata Diri</h4>
        <form action="{{route('siswa-biodata')}}" method="POST" class="form-biodata">
            @csrf
            
            <div class="form-group md-form">
                <input type="text"class="form-control" name="nama" id="nama" value="{{old('nama')}}" required>
                <label for="nama">Nama Lengkap <span class="text-red">*)</span></label>
            </div>
            <!--<div class="form-group md-form">-->
            <!--    <input type="text"class="form-control" name="kelas" id="kelas" value="{{old('kelas')}}" required>-->
            <!--    <label for="kelas">Asal Kelas <span class="text-red">*)</span></label>-->
            <!--</div>-->
            @if($rdet && $rdet->lembaga_sekolah != "" &&  $rdet->lembaga_sekolah != null)
                @php
                    $hassekolah = true;
                @endphp
                <input type="hidden" name="id_detail" value="{{$rdet->id}}">
                <input type="hidden" name="lembaga_sekolah" value="{{$rdet->lembaga_sekolah}}">
            @else
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
            @endif
            @if($rdet && $rdet->kelas != "" && $rdet->kelas != null)
                <input type="hidden" name="kelas" value="{{$rdet->kelas}}">
            @else
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
            @endif
            
            @if($rdet && $rdet->jurusan != "" && $rdet->jurusan != null)
                <input type="hidden" name="jurusan" value="{{$rdet->jurusan}}">
            @else
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
            @endif
            <!-- <div class="form-group md-form d-none" style="position: relative;" id="sub_jur">
                <label for="sub_jur">Sub Jurusan <span class="text-red">*)</span></label>
                <input type="number" min="0" class="form-control">
            </div> -->
            
            @if($rdet && $rdet->sub_jurusan != "" && $rdet->sub_jurusan != null)
                <input type="hidden" name="sub_jurusan" value="{{$rdet->sub_jurusan}}">
            @else
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
            @endif
            <div class="form-group text-left">
                <label>Jenis Kelamin <span class="text-red">*)</span></label>
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="defaultInline1" name="jenis_kelamin" required value="Laki-Laki" {{((old('jenis_kelamin') == 'Laki-Laki')?'selected':'')}}>
                    <label class="custom-control-label" for="defaultInline1">Laki-Laki</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="defaultInline2" name="jenis_kelamin" required value="Perempuan" {{((old('jenis_kelamin') == 'Perempuan')?'selected':'')}}>
                    <label class="custom-control-label" for="defaultInline2">Perempuan</label>
                </div>
            </div>
            <div class="form-group md-form">
                <input type="text"class="form-control" name="no_telp" value="{{old('no_telp')}}" id="no_hp" required>
                <label for="no_hp">Nomor HP <span class="text-red">*)</span></label>
            </div>
            <div class="form-group md-form">
                <input type="date"class="form-control" name="tgl_lahir" value="{{old('tgl_lahir')}}" id="date" required>
                <label for="date">Tanggal Lahir <span class="text-red">*)</span></label>
            </div>
            <div class="form-group md-form">
                <textarea class="form-control md-textarea" id="alamat" name="alamat" required>{{old('alamat')}}</textarea>
                <label for="alamat">Alamat Rumah <span class="text-red">*)</span></label>
            </div>
            <div class="form-group md-form">
                <input type="email" class="form-control" id="email"  value="{{old('email')}}"name="email">
                <label for="email">Email <span class="text-red">*)</span></label>
            </div>
            <div class="form-group md-form">
                <input type="text" class="form-control" id="fb" value="{{old('facebook')}}" name="facebook">
                <label for="fb">Akun Facebook</label>
            </div>
            <div class="form-group md-form">
                <input type="text" class="form-control" id="ig" value="{{old('instagram')}}" name="instagram">
                <label for="ig">Akun Instagram</label>
            </div>
            <div class="form-group md-form">
                <input type="text" class="form-control" id="yt" value="{{old('youtube')}}" name="youtube">
                <label for="yt">Channel Youtube</label>
            </div>
            <div class="form-group text-left" style="position: relative;">
                <label for="ct">Cita-Cita <span class="text-red">*)</span></label>
                <select id="ct" class="custom-select" name="cita_cita">
                    <option value="Pegawai Kantoran" {{((null !== old('cita_cita'))? ((old('cita_cita') == 'Pegawai Kantoran')?'selected':''):'selected')}}>Pegawai Kantoran</option>
                    <option value="Programmer" {{((null !== old('cita_cita'))? ((old('cita_cita') == 'Programmer')?'selected':''):'')}}>Programmer</option>
                    <option value="Jalan-Jalan Keliling Dunia" {{((null !== old('cita_cita'))? ((old('cita_cita') == 'Jalan-Jalan Keliling Dunia')?'selected':''):'')}}>Jalan-Jalan Keliling Dunia</option>
                    <option value="Photographer" {{((null !== old('cita_cita'))? ((old('cita_cita') == 'Photographer')?'selected':''):'')}}>Photographer</option>
                    <option value="Staf Hotel" {{((null !== old('cita_cita'))? ((old('cita_cita') == 'Staf Hotel')?'selected':''):'')}}>Staf Hotel</option>
                    <option value="Crew Kapal Pesiar" {{((null !== old('cita_cita'))? ((old('cita_cita') == 'Crew Kapal Pesiar')?'selected':''):'')}}>Crew Kapal Pesiar</option>
                    <option value="Chef Restoran/Hotel" {{((null !== old('cita_cita'))? ((old('cita_cita') == 'Chef Restoran/Hotel')?'selected':''):'')}}>Chef Restoran/Hotel</option>
                    <option value="Pemandu Wisata" {{((null !== old('cita_cita'))? ((old('cita_cita') == 'Pemandu Wisata')?'selected':''):'')}}>Pemandu Wisata</option>
                    <option value="Atlit Esport" {{((null !== old('cita_cita'))? ((old('cita_cita') == 'Atlit Esport')?'selected':''):'')}}>Atlit Esport</option>
                    <option value="Desain grafis/ilustrator/animator" {{((null !== old('cita_cita'))? ((old('cita_cita') == 'Desain grafis/ilustrator/animator')?'selected':''):'')}}>Desain grafis/ilustrator/animator</option>
                    <option value="Ahli IT/Komputer" {{((null !== old('cita_cita'))? ((old('cita_cita') == 'Ahli IT/Komputer')?'selected':''):'')}}>Ahli IT/Komputer</option>
                    <option value="Barista" {{((null !== old('cita_cita'))? ((old('cita_cita') == 'Barista')?'selected':''):'')}}>Barista</option>
                    <option value="Pramugari/Pramugara" {{((null !== old('cita_cita'))? ((old('cita_cita') == 'Pramugari/Pramugara')?'selected':''):'')}}>Pramugari/Pramugara</option>
                    
                    <option value="other" {{((null !== old('cita_cita'))? ((old('cita_cita') == 'other')?'selected':''):'')}}>Lainnya... Sebutkan :</option>
                </select>
            </div>
            <div id="ctOther" class="form-group md-form" style="display:none;">
                <input type="text" class="form-control" id="ct2">
                <label for="ct2">Sebutkan Cita-Cita <span class="text-red">*)</span></label>
            </div>
            <div class="form-group text-left" style="position: relative;">
                <label for="hb">Hobi <span class="text-red">*)</span></label>
                <select id="hb" class="custom-select" name="hobi">
                    <option value="Musik (K-Pop)" 
                    {{((null !== old('hobi'))? ((old('hobi') == 'Musik (K-Pop)')?'selected':''):'selected')}}>Musik (K-Pop)</option>
                    <option value="Olah Raga" {{((null !== old('hobi'))? ((old('hobi') == 'Olah Raga')?'selected':''):'')}}>Olah Raga</option>
                    <option value="Esport (Game Online)" {{((null !== old('hobi'))? ((old('hobi') == 'Esport (Game Online)')?'selected':''):'')}}>Esport (Game Online)</option>
                    <option value="Youtuber" {{((null !== old('hobi'))? ((old('hobi') == 'Youtuber')?'selected':''):'')}}>Youtuber</option>
                    <option value="English Club" {{((null !== old('hobi'))? ((old('hobi') == 'English Club')?'selected':''):'')}}>English Club</option>
                    <option value="Music" {{((null !== old('hobi'))? ((old('hobi') == 'Music')?'selected':''):'')}}>Music</option>
                    <option value="Nonton Film (Drakor)" {{((null !== old('hobi'))? ((old('hobi') == 'Nonton Film (Drakor)')?'selected':''):'')}}>Nonton Film (Drakor)</option>
                    <option value="Photographer" {{((null !== old('hobi'))? ((old('hobi') == 'Photographer')?'selected':''):'')}}>Photographer</option>
                    <option value="Menggambar" {{((null !== old('hobi'))? ((old('hobi') == 'Menggambar')?'selected':''):'')}}>Menggambar</option>
                    <option value="other" {{((null !== old('hobi'))? ((old('hobi') == 'Other')?'selected':''):'')}}>Lainnya... Sebutkan:</option>
                </select>
            </div>
            <div id="hbOther" class="form-group md-form"  style="display:none;">
                <input type="text" class="form-control" id="hb2">
                <label for="hb2">Sebutkan Hobi <span class="text-red">*)</span></label>
            </div>
            <div class="form-group text-left">
                <label>Minat Melanjutkan <span class="text-red">*)</span></label>
                <br>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="minat1" name="minat_melanjutkan" required value="Kuliah" {{((old('minat_melanjutkan') == 'Kuliah')?'selected':'')}}>
                    <label class="custom-control-label" for="minat1">Kuliah</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="minat2" name="minat_melanjutkan" required value="Kerja" {{((old('minat_melanjutkan') == 'Kerja')?'selected':'')}}>
                    <label class="custom-control-label" for="minat2">Kerja</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="minat3" name="minat_melanjutkan" required value="Wirausaha" {{((old('minat_melanjutkan') == 'Wirausaha')?'selected':'')}}>
                    <label class="custom-control-label" for="minat3">Wirausaha</label>
                </div>
            </div>
            <div class="form-group md-form">
                <textarea class="form-control md-textarea" id="strength" name="strength" required>{{old('strength')}}</textarea>
                <label for="strength">Menurutmu Apa kelebihan dirimu ? <span class="text-red">*)</span></label>
            </div>
            <div class="form-group md-form">
                <textarea class="form-control md-textarea" id="weakness" name="weakness" required>{{old('weakness')}}</textarea>
                <label for="weakness">Menurutmu Apa kekurangan dirimu ? <span class="text-red">*)</span></label>
            </div>
            <h4 style="font-weight: bolder;">Biodata Orang Tua</h4>
            <div class="form-group md-form">
                <input type="text" class="form-control" id="nayah" value="{{old('nama_ayah')}}" required name="nama_ayah">
                <label for="nayah">Nama Ayah <span class="text-red">*)</span></label>
            </div>
            <div class="form-group md-form">
                <input type="text" class="form-control" id="nhpayah" value="{{old('hp_ayah')}}" required name="hp_ayah">
                <label for="nhpayah">No. HP Ayah <span class="text-red">*)</span></label>
            </div>
            <div class="form-group text-left" style="position: relative;">
                <label for="jayah">Pekerjaan Ayah <span class="text-red">*)</span></label>
                <select id="jayah" class="custom-select" name="job_ayah">
                    <option value="Pegawai Negeri/TNI/POLRI/BUMN/BUMD" selected>Pegawai Negeri/TNI/POLRI/BUMN/BUMD</option>
                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                    <option value="Wiraswasta/Pengusaha/Pedagang">Wiraswasta/Pengusaha/Pedagang</option>
                    <option value="other">Lainnya... Sebutkan:</option>
                </select>
            </div>
            <div id="jayahOther" class="form-group md-form" style="display:none;">
                <input type="text" class="form-control" id="jayah2">
                <label for="jayah2">Sebutkan Pekerjaan Ayah <span class="text-red">*)</span></label>
            </div>


            <div class="form-group md-form">
                <input type="text" class="form-control" id="nibu" value="{{old('nama_ibu')}}" required name="nama_ibu">
                <label for="nibu">Nama Ibu <span class="text-red">*)</span></label>
            </div>
            <div class="form-group md-form">
                <input type="text" class="form-control" id="nhpibu" value="{{old('hp_ibu')}}" required name="hp_ibu">
                <label for="nhpibu">No. HP Ibu <span class="text-red">*)</span></label>
            </div>
            <div class="form-group text-left" style="position: relative;">
                <label for="jibu">Pekerjaan Ibu <span class="text-red">*)</span></label>
                <select id="jibu" class="custom-select" name="job_ibu">
                    <option value="Ibu Rumah Tangga" selected>Ibu Rumah Tangga</option>
                    <option value="Pegawai Negeri/TNI/POLRI/BUMN/BUMD">Pegawai Negeri/TNI/POLRI/BUMN/BUMD</option>
                    <option value="Pegawai Swasta">Pegawai Swasta</option>
                    <option value="Wiraswasta/Pengusaha/Pedagang">Wiraswasta/Pengusaha/Pedagang</option>
                    <option value="other">Lainnya... Sebutkan:</option>
                </select>
            </div>
            <div id="jayahOther" class="form-group md-form mb-5" style="display:none;">
                <input type="text" class="form-control" id="jibu2">
                <label for="jibu2">Sebutkan Pekerjaan Ibu <span class="text-red">*)</span></label>
            </div>
            
            <div class="form-group">
                
                <div class="form-check text-left">
                    <input class="form-check-input" type="checkbox" value="" id="agreement">
                    <label class="form-check-label" for="agreement">
                    Dengan ini saya menyatakan bahwa data yang saya isi merupakan data yang diisi secara sukarela dan saya bersedia dihubungi untuk kelanjutan proses pemetaan diri di kemudian hari oleh International Professional Institute.
                    </label>
                </div>
            </div>
            <div class="form-group mb-5">
                <input type="hidden" name="has_sekolah" value="{{$hassekolah}}">
                <button type="submit" id="btn_submit" class="btn btn-block btn-rounded btn-primary" disabled><b>Submit</b></button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js_addon')
<script type="text/javascript">
    $(document).ready(function(){

    });
    $('#ct').on('change',function(){
        var selection = $(this).val();
        switch(selection){
            case "other":
                $(this).removeAttr('name');
                $(this).removeAttr('required');
                $('#ctOther').show();
                $('#ct2').attr('name','cita_cita');
                $('#ct2').attr('required',true);
            break;
            default:
                $("#ctOther").hide();
                $(this).attr('name','cita_cita');
                $(this).attr('required',true);
                $('#ct2').removeAttr('name');
                $('#ct2').removeAttr('required');
        }
    });
    $('#hb').on('change',function(){
        var selection = $(this).val();
        switch(selection){
            case "other":
                $(this).removeAttr('name');
                $(this).removeAttr('required');
                $('#hbOther').show();
                $('#hb2').attr('name','hobi');
                $('#hb2').attr('required',true);
            break;
            default:
                $("#hbOther").hide();
                $(this).attr('name','hobi');
                $(this).attr('required',true);
                $('#hb2').removeAttr('name');
                $('#hb2').removeAttr('required');
        }
    });
    $('#jayah').on('change',function(){
        var selection = $(this).val();
        switch(selection){
            case "other":
                $(this).removeAttr('name');
                $(this).removeAttr('required');
                $('#jayahOther').show();
                $('#jayah2').attr('name','job_ayah');
                $('#jayah2').attr('required',true);
            break;
            default:
                $("#jayahOther").hide();
                $(this).attr('name','job_ayah');
                $(this).attr('required',true);
                $('#jayah2').removeAttr('name');
                $('#jayah2').removeAttr('required');
        }
    });
    $('#jibu').on('change',function(){
        var selection = $(this).val();
        switch(selection){
            case "other":
                $(this).removeAttr('name');
                $(this).removeAttr('required');
                $('#jibuOther').show();
                $('#jibu2').attr('name','job_ibu');
                $('#jibu2').attr('required',true);
            break;
            default:
                $("#jibuOther").hide();
                $(this).attr('name','job_ibu');
                $(this).attr('required',true);
                $('#jibu2').removeAttr('name');
                $('#jibu2').removeAttr('required');
        }
    });
    $('#agreement').on('change',function(){
       if(this.checked){
           $('#btn_submit').prop('disabled',false);
       }
       else{
           $('#btn_submit').prop('disabled',true);
       }
    });
    @if(!$hassekolah)
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
    @endif
</script>
@endsection