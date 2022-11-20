@extends('users.layouts.master2')
@section('content')
<div class="text-center mb-4">
    <!--<h1 class="page-title">PIXEL</h1>-->
    <img src="{{asset('images/Logo Piccel.png')}}" class="logo logo-stroke">
</div>
<div class="card panel p-3">
    <div class="card-body">
        <h5 class="mb-5" style="font-weight: bolder;">Selamat Datang, {{Auth::user()->rdetsis->nama}}</h5>
        @if(session()->has('success'))
            <div class="alert alert-success">
                <b>Sukses:</b> {{session()->get('success')}}
            </div>
        @endif
        @php
            use App\JawabanTesUser;
            use App\DetailSiswa;
            $cdone = 'green lighten-4';
            $numerik = JawabanTesUser::where('id_user',Auth::user()->id)->where('type','numerik')->get();
            $bahasa = JawabanTesUser::where('id_user',Auth::user()->id)->where('type','bahasa')->get();
            $logika = JawabanTesUser::where('id_user',Auth::user()->id)->where('type','logika')->get();
            $kepribadian = JawabanTesUser::where('id_user',Auth::user()->id)->where('type','kepribadian')->get();
            $dayaingat = JawabanTesUser::where('id_user',Auth::user()->id)->where('type','daya_ingat')->get();
            $track = DetailSiswa::where('id_user',Auth::id())->first();
            $hastrack = false;
            if($track){
                $hastrack = ($track->tracker_lanjut != null && $track->tracker_lanjut != "")? true : false;
            }
        @endphp
        <div class="row tes-button-group">
            <div class="col-md-4 col-sm-4">
                <a href="{{route('siswa-tes-numerik')}}" class="tes-link">
                    <div class="card tes-button {{(count($numerik) >= 10)?$cdone:''}}">
                        <div class="card-body">
                            <img src="{{asset('images/Asset 2@4x.png')}}" class="tes-icon">
                            <p class="mt-2">Tes Numerik</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="{{route('siswa-tes-bahasa')}}" class="tes-link">
                    <div class="card tes-button {{(count($bahasa) >= 10)?$cdone:''}}">
                        <div class="card-body">
                            <img src="{{asset('images/Asset 1@4x.png')}}" class="tes-icon">
                            <p class="mt-2">Tes Bahasa</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="{{route('siswa-tes-logika')}}" class="tes-link">
                    <div class="card tes-button {{(count($logika) >= 10)?$cdone:''}}">
                        <div class="card-body">
                            <img src="{{asset('images/Asset 3@4x.png')}}" class="tes-icon">
                            <p class="mt-2">Tes Logika</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="{{route('siswa-tes-dayaingat')}}" class="tes-link">
                    <div class="card tes-button {{(count($dayaingat) >= 10)?$cdone:''}}">
                        <div class="card-body">
                            <img src="{{asset('images/Asset 4@4x.png')}}" class="tes-icon">
                            <p class="mt-2">Tes Daya Ingat</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="{{route('siswa-tes-kepribadian')}}" class="tes-link">
                    <div class="card tes-button {{(count($kepribadian) >= 10)?$cdone:''}}">
                        <div class="card-body">
                            <img src="{{asset('images/Asset 5@4x.png')}}" class="tes-icon">
                            <p class="mt-2">Tes Kepribadian</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="#" class="tes-link">
                    <div class="card tes-button">
                        <div class="card-body">
                            <img src="{{asset('images/Asset 6@4x.png')}}" class="tes-icon">
                            <p>Coming Soon!</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <hr style="border-top: 3px solid rgba(0,0,0,.5);;">
        <!--<div class="row tes-button-group">-->
        <!--    <div class="col-md-4 col-sm-4">-->
        <!--        <a href="#" class="tes-link">-->
        <!--            <div class="card tes-button">-->
        <!--                <div class="card-body">-->
        <!--                    <img src="{{asset('images/Logo IPI.png')}}" class="tes-icon">-->
        <!--                    <p>IPI Information</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </a>-->
        <!--    </div>-->
        <!--    <div class="col-md-4 col-sm-4">-->
        <!--        <a href="{{route('siswa-psc')}}" class="tes-link">-->
        <!--            <div class="card tes-button">-->
        <!--                <div class="card-body">-->
        <!--                    <img src="{{asset('images/Logo PSC.png')}}" class="tes-icon">-->
        <!--                    <p class="">Professional Startup Class</p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </a>-->
        <!--    </div>-->
        <!--    <div class="col-md-4 col-sm-4">-->
        <!--        <a href="{{route('siswa-tracker')}}" class="tes-link">-->
        <!--            <div class="card tes-button">-->
        <!--                <div class="card-body">-->
        <!--                    <img src="{{asset('images/Logo Tracker.png')}}" class="tes-icon">-->
        <!--                    <p class="">Tracker Study<br><small>Jika sudah lulus sekolah</small></p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </a>-->
        <!--    </div>-->
        <!--</div>-->
    </div>
</div>
<div class="modal fade" id="popupmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content bg-transparent border-none">
      <div class="modal-body ">
        <button type="button" class="close text-white float-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <br>
        <div id="popupcarousel" class="owl-carousel">
            <div class="p-3"><img src="{{asset('images/POP_UP_APP_PSC.jpg')}}" class="img-responsive"></div>
            <div class="p-3"><img src="{{asset('images/POP_UP_APP_SKOR.jpg')}}" class="img-responsive"></div>
            <div class="p-3"><img src="{{asset('images/POP_UP_APP_SPIDER.jpg')}}" class="img-responsive"></div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js_addon')
<script>
    var owl = $('#popupcarousel');
    owl.owlCarousel({
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    items:1,
    loop:true,
    freeDrag:false,mouseDrag:false,touchDrag:false,pullDrag:false,autoplay:true,autoplayTimeout:5000});
    
    $(document).ready(function(){
        @if(!session()->has('first'))
            $('#popupmodal').modal();
            @php
                session()->put('first',true);
            @endphp
        @endif
    });
</script>
@endsection