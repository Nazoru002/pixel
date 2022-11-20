@extends('admin.master_dashboard')

@section('title','Dashboard')
@section('content')
      @php
        use App\User;
        use App\JawabanTesUser;
        use App\KunciJawaban;
        use App\Sekolah;
        use App\DetailSiswa;
        $sekolah = Sekolah::all();
        $count = 0;
        $smk = 0;
        $sma = 0;
        $ma = 0;
        $siswa = User::where('level','siswa')->with('rdetsis')->get();
        
        //$detsis = DetailSiswa::get();
        
        $detsis = [];
        if(Auth::user()->level == "admin"){
            $rawData = User::withTrashed()->where('level','siswa')->with('rdetsis')->with('rsekolah')->get()->toArray();
        }
        foreach($rawData as $raw){
        	if(!isset($raw['rdetsis']['nama'])){
        		continue;
        	}else{
        	    array_push($detsis, $raw);
        	}
        }
        
        foreach($siswa as $s){
          if(isset($s->rdetsis->minat_melanjutkan) && $s->rdetsis->minat_melanjutkan == "Kuliah"){
            $sma++;
          }
          if(isset($s->rdetsis->minat_melanjutkan) && $s->rdetsis->minat_melanjutkan == "Kerja"){
            $smk++;
          }
          if(isset($s->rdetsis->minat_melanjutkan) && $s->rdetsis->minat_melanjutkan == "Wirausaha"){
            $ma++;
          }
        }
      @endphp
      <!--Grid row-->
      <div class="row wow fadeIn text-white">
        <div class="col-md-4 mb-4">
          <div class="card blue">
            <div class="card-body d-flex align-items-start">
              <i class="fas fa-user fa-4x"></i>
              <p class="ml-3">
                <span class="h5 dashboard-counter-title">Total Data Sekolah</span><br>
                <span class="dashboard-counter-number">{{count($sekolah)}}</span>
              <p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card blue">
            <div class="card-body d-flex align-items-start">
              <i class="fas fa-user-graduate fa-4x"></i>
              <p class="ml-3">
                <span class="h5 dashboard-counter-title">Total Akun Siswa</span><br>
                <span class="dashboard-counter-number">{{count($siswa)}}</span>
              <p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card blue">
            <div class="card-body d-flex align-items-start">
              <i class="fas fa-user-graduate fa-4x"></i>
              <p class="ml-3">
                <span class="h5 dashboard-counter-title">Total Biodata Siswa</span><br>
                <span class="dashboard-counter-number">{{count($detsis)}}</span>
              <p>
            </div>
          </div>
        </div>
      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">
            <div class="card-header">
              Grafik Minat Lanjut Siswa
            </div>
            <!--Card content-->
            <div class="card-body">
              <canvas id="minatChart"></canvas>
            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

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
    

    //pie
    var ctxP = document.getElementById("minatChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Kuliah", "Kerja",'Wirausaha'],
        datasets: [{
          data: {{json_encode([$sma,$smk,$ma])}},
          backgroundColor: ["#F7464A", "#46BFBD",'#33b5e5'],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1",'#0099CC']
        }]
      },
      options: {
        responsive: true,
      }
    });



  </script>

@endsection
