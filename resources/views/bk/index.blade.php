@extends('bk.master')

@section('title','Dashboard')
@section('content')
      @php
        use App\User;
        use App\JawabanTesUser;
        use App\KunciJawaban;
        use App\HasilTes;
        $siswa = User::where('id_sekolah',session()->get('id_sekolah'))->where('level','siswa')->with('rdetsis')->get();
        $count = 0;
        $smk = 0;
        $sma = 0;
        $ma = 0;
        $kelas12 = 0;
        $kelas11 = 0;
        $kelas10 = 0;
        $ids = User::where('id_sekolah',session()->get('id_sekolah'))->where('level','siswa')->pluck('id')->toArray();
        foreach($siswa as $s){
          $numerik = HasilTes::where('id_user',$s->id)->where('type','numerik')->first();
          $logika = HasilTes::where('id_user',$s->id)->where('type','logika')->first();
          $kepribadian = HasilTes::where('id_user',$s->id)->where('type','kepribadian')->first();
          $bahasa = HasilTes::where('id_user',$s->id)->where('type','bahasa')->first();
          $dayaingat = HasilTes::where('id_user',$s->id)->where('type','daya_ingat')->first();

          if($numerik && $logika && $kepribadian && $bahasa && $dayaingat){
            $count++;
            if($s->rdetsis->kelas == 'Kelas 12'){
                $kelas12++;
            }
            if($s->rdetsis->kelas == 'Kelas 11'){
                $kelas11++;
            }
            if($s->rdetsis->kelas == 'Kelas 10'){
                $kelas10++;
            }
          }
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

        $numerik = HasilTes::where('type','numerik')->whereIn('id_user',$ids)->pluck('hasil')->toArray();
        $numerik = array_count_values($numerik);
        $logika = HasilTes::where('type','logika')->whereIn('id_user',$ids)->pluck('hasil')->toArray();
        $logika = array_count_values($logika);
        $dayaingat = HasilTes::where('type','daya_ingat')->whereIn('id_user',$ids)->pluck('hasil')->toArray();
        $dayaingat = array_count_values($dayaingat);
        $bahasa = HasilTes::where('type','bahasa')->whereIn('id_user',$ids)->pluck('hasil')->toArray();
        $bahasa = array_count_values($bahasa);
        
      @endphp
      <!--Grid row-->
      <div class="row wow fadeIn text-white">
        <div class="col-md-6 mb-4">
          <div class="card blue">
            <div class="card-body d-flex align-items-start">
              <i class="fas fa-user fa-4x"></i>
              <p class="ml-3">
                <span class="h5 dashboard-counter-title">Jumlah Data Siswa</span><br>
                <span class="dashboard-counter-number">{{count($siswa)}}</span>
              <p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card blue">
            <div class="card-body d-flex align-items-start">
              <i class="fas fa-user-graduate fa-4x"></i>
              <p class="ml-3">
                <span class="h5 dashboard-counter-title">Jumlah Siswa Selesai Tes</span><br>
                <span class="dashboard-counter-number">{{$count}}</span>
              <p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card blue">
            <div class="card-body d-flex align-items-start">
              <i class="fas fa-user-graduate fa-4x"></i>
              <p class="ml-3">
                <span class="h5 dashboard-counter-title">Jumlah Siswa Kelas 12 Selesai Tes</span><br>
                <span class="dashboard-counter-number">{{$kelas12}}</span>
              <p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card blue">
            <div class="card-body d-flex align-items-start">
              <i class="fas fa-user-graduate fa-4x"></i>
              <p class="ml-3">
                <span class="h5 dashboard-counter-title">Jumlah Siswa Kelas 11 Selesai Tes</span><br>
                <span class="dashboard-counter-number">{{$kelas11}}</span>
              <p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card blue">
            <div class="card-body d-flex align-items-start">
              <i class="fas fa-user-graduate fa-4x"></i>
              <p class="ml-3">
                <span class="h5 dashboard-counter-title">Jumlah Siswa Kelas 10 Selesai Tes</span><br>
                <span class="dashboard-counter-number">{{$kelas10}}</span>
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


      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">
            <div class="card-header">
              Grafik Hasil Tes Numerik
            </div>
            <!--Card content-->
            <div class="card-body">
              <canvas id="numerikChart"></canvas>
            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">
            <div class="card-header">
              Grafik Hasil Tes Bahasa
            </div>
            <!--Card content-->
            <div class="card-body">
              <canvas id="bahasaChart"></canvas>
            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->


      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">
            <div class="card-header">
              Grafik Hasil Tes Logika
            </div>
            <!--Card content-->
            <div class="card-body">
              <canvas id="logikaChart"></canvas>
            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->



      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">
            <div class="card-header">
              Grafik Hasil Tes Daya Ingat
            </div>
            <!--Card content-->
            <div class="card-body">
              <canvas id="dayaingatChart"></canvas>
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
    var ctx = document.getElementById("numerikChart").getContext('2d');
    var numerikChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['0', '10', '20', '30', '40', '50','60','70','80','90','100'],
        datasets: [{
          label:'Jumlah Murid',
          data: [{{(isset($numerik[0]))? $numerik[0] : 0}},{{(isset($numerik[10]))? $numerik[10] : 0}},{{(isset($numerik[20]))? $numerik[20] : 0}},{{(isset($numerik[30]))? $numerik[30] : 0}},{{(isset($numerik[40]))? $numerik[40] : 0}},{{(isset($numerik[50]))? $numerik[50] : 0}},{{(isset($numerik[60]))? $numerik[60] : 0}},{{(isset($numerik[70]))? $numerik[70] : 0}},{{(isset($numerik[80]))? $numerik[80] : 0}},{{(isset($numerik[90]))? $numerik[90] : 0}},{{(isset($numerik[100]))? $numerik[100] : 0}},],
                backgroundColor: [
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                ],
                borderColor: [
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                ],
        }],
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });


    var ctx2 = document.getElementById("logikaChart").getContext('2d');
    var logikaChart = new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: ['0', '10', '20', '30', '40', '50','60','70','80','90','100'],
        datasets: [{
          label:'Jumlah Murid',
          data: [{{(isset($logika[0]))? $logika[0] : 0}},{{(isset($logika[10]))? $logika[10] : 0}},{{(isset($logika[20]))? $logika[20] : 0}},{{(isset($logika[30]))? $logika[30] : 0}},{{(isset($logika[40]))? $logika[40] : 0}},{{(isset($logika[50]))? $logika[50] : 0}},{{(isset($logika[60]))? $logika[60] : 0}},{{(isset($logika[70]))? $logika[70] : 0}},{{(isset($logika[80]))? $logika[80] : 0}},{{(isset($logika[90]))? $logika[90] : 0}},{{(isset($logika[100]))? $logika[100] : 0}},],
                backgroundColor: [
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                ],
                borderColor: [
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                ],
        }],
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
    var ctx3 = document.getElementById("bahasaChart").getContext('2d');
    var bahasaChart = new Chart(ctx3, {
      type: 'bar',
      data: {
        labels: ['0', '10', '20', '30', '40', '50','60','70','80','90','100'],
        datasets: [{
          label:'Jumlah Murid',
          data: [{{(isset($bahasa[0]))? $bahasa[0] : 0}},{{(isset($bahasa[10]))? $bahasa[10] : 0}},{{(isset($bahasa[20]))? $bahasa[20] : 0}},{{(isset($bahasa[30]))? $bahasa[30] : 0}},{{(isset($bahasa[40]))? $bahasa[40] : 0}},{{(isset($bahasa[50]))? $bahasa[50] : 0}},{{(isset($bahasa[60]))? $bahasa[60] : 0}},{{(isset($bahasa[70]))? $bahasa[70] : 0}},{{(isset($bahasa[80]))? $bahasa[80] : 0}},{{(isset($bahasa[90]))? $bahasa[90] : 0}},{{(isset($bahasa[100]))? $bahasa[100] : 0}},],
                backgroundColor: [
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                ],
                borderColor: [
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                ],
        }],
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
    var ctx4 = document.getElementById("dayaingatChart").getContext('2d');
    var dayaingatChart = new Chart(ctx4, {
      type: 'bar',
      data: {
        labels: ['0', '10', '20', '30', '40', '50','60','70','80','90','100'],
        datasets: [{
          label:'Jumlah Murid',
          data: [{{(isset($dayaingat[0]))? $dayaingat[0] : 0}},{{(isset($dayaingat[10]))? $dayaingat[10] : 0}},{{(isset($dayaingat[20]))? $dayaingat[20] : 0}},{{(isset($dayaingat[30]))? $dayaingat[30] : 0}},{{(isset($dayaingat[40]))? $dayaingat[40] : 0}},{{(isset($dayaingat[50]))? $dayaingat[50] : 0}},{{(isset($dayaingat[60]))? $dayaingat[60] : 0}},{{(isset($dayaingat[70]))? $dayaingat[70] : 0}},{{(isset($dayaingat[80]))? $dayaingat[80] : 0}},{{(isset($dayaingat[90]))? $dayaingat[90] : 0}},{{(isset($dayaingat[100]))? $dayaingat[100] : 0}},],
                backgroundColor: [
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                    '#ffb74d80',
                ],
                borderColor: [
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                    '#ff9800',
                ],
        }],
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });

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
