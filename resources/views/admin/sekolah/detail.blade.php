@extends('admin.master_dashboard')
@section('title','Grafik Data '.$data->nama_sekolah)
@section('content')
      @php
        use App\User;
        use App\JawabanTesUser;
        use App\KunciJawaban;
        use App\HasilTes;
        use App\DetailSiswa;
        
        $siswa = User::where('id_sekolah',$data->id)->where('level','siswa')->with('rdetsis')->get();
        $count = 0;
        $smk = 0;
        $sma = 0;
        $ma = 0;
        $lk = 0;
        $pr = 0;

        // List Hobi : K-Pop,Olah Raga, Esport (Game Online), Youtuber, Bahasa Inggris, Nonton Film, Photographer, Menggambar, Yang Lainnya
        $hobbies = ['Music (K-Pop)','Olah Raga','Esport (Game Online)','Youtuber','English Club','Nonton Film (Drakor)','Photographer','Menggambar','Yang Lainnya...'];
        $h1 = 0;
        $h2 = 0;
        $h3 = 0;
        $h4 = 0;
        $h5 = 0;
        $h6 = 0;
        $h7 = 0;
        $h8 = 0;
        $h9 = 0;
        $ids = User::where('id_sekolah',$data->id)->where('level','siswa')->pluck('id')->toArray();
        foreach($siswa as $s){
          $numerik = HasilTes::where('id_user',$s->id)->where('type','numerik')->first();
          $logika = HasilTes::where('id_user',$s->id)->where('type','logika')->first();
          $kepribadian = HasilTes::where('id_user',$s->id)->where('type','kepribadian')->first();
          $bahasa = HasilTes::where('id_user',$s->id)->where('type','bahasa')->first();
          $dayaingat = HasilTes::where('id_user',$s->id)->where('type','daya_ingat')->first();

          if($numerik && $logika && $kepribadian && $bahasa && $dayaingat){
            $count++;
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
          if(isset($s->rdetsis->jenis_kelamin) && $s->rdetsis->jenis_kelamin == "Laki-Laki"){
            $lk++;
          }
          if(isset($s->rdetsis->jenis_kelamin) && $s->rdetsis->jenis_kelamin == "Perempuan"){
            $pr++;
          }
          if(isset($s->rdetsis->hobi) && $s->rdetsis->hobi == $hobbies[0]){
            $h1++;
          }
          else if(isset($s->rdetsis->hobi) && $s->rdetsis->hobi == $hobbies[1]){
            $h2++;
          }
          else if(isset($s->rdetsis->hobi) && $s->rdetsis->hobi == $hobbies[2]){
            $h3++;
          }
          else if(isset($s->rdetsis->hobi) && $s->rdetsis->hobi == $hobbies[3]){
            $h4++;
          }
          else if(isset($s->rdetsis->hobi) && $s->rdetsis->hobi == $hobbies[4]){
            $h5++;
          }
          else if(isset($s->rdetsis->hobi) && $s->rdetsis->hobi == $hobbies[5]){
            $h6++;
          }
          else if(isset($s->rdetsis->hobi) && $s->rdetsis->hobi == $hobbies[6]){
            $h7++;
          }
          else if(isset($s->rdetsis->hobi) && $s->rdetsis->hobi == $hobbies[7]){
            $h8++;
          }
          else if(isset($s->rdetsis->hobi)){
            $h9++;
          }
          else{
          
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
        
        $detsis = DetailSiswa::whereIn('id_user',$ids)->count();
      @endphp
      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">
          <div class="card">
            <div class="card-header">
              Informasi Sekolah
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Nama Sekolah </b></div><div class="col-9"> : {{$data->nama_sekolah}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Kode Sekolah </b></div><div class="col-9"> : {{$data->kode_sekolah}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Nama Guru BK </b></div><div class="col-9"> : {{$data->rbk->nama_user}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Username BK </b></div><div class="col-9"> : {{$data->rbk->username}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Password BK </b></div><div class="col-9"> : {{$data->rbk->display_password}}</div></div></li>
            </div>
          </div>
        </div>

      </div>
      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">
          <div class="card">
            <div class="card-header">
              Data Siswa Sekolah
              <a href="{{route('hasilTesExportPerSekolah', $data->id)}}" class="btn btn-primary float-right">Export Hasil Tes Siswa</a>
            </div>
            <div class="card-body">
            <table class="table table-hover table-bordered" id="data">
              <thead>
                <tr>
                  <th> ID </th>
                  <th> Nama Siswa</th>
                  <th> Minat</th>
                  <th> Hobi</th>
                  <th> Aksi </th>
                </tr>
              </thead>
              <tbody>
                  @foreach($siswa as $s)
                    <tr>
                      <td>{{$s->id}}</td>
                      <td>{{$s->nama_user}}</td>
                      <td>{{($s->rdetsis)?$s->rdetsis->minat_melanjutkan:'Belum Mengisi Biodata'}}</td>
                      <td>{{($s->rdetsis)?$s->rdetsis->hobi:'Belum Mengisi Biodata'}}</td>
                      <td><a href="{{route('admin-siswa-detail',$s->id)}}" class="btn btn-rounded btn-primary mr-3">Lihat Detail</a><a href="{{route('admin-siswa-edit',$s->id)}}" class="btn btn-rounded btn-warning mr-3">Edit</a><button href="#" class="btn btn-rounded btn-danger btn-delete" data-url="{{route('admin-siswa-delete',$s->id)}}">Hapus</button></td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
            </div>
          </div>
        </div>

      </div>
      <!--Grid row-->
      <div class="row wow fadeIn text-white">
        <div class="col-md-4 mb-4">
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
        <div class="col-md-4 mb-4">
          <div class="card blue">
            <div class="card-body d-flex align-items-start">
              <i class="fas fa-list-alt fa-4x"></i>
              <p class="ml-3">
                <span class="h5 dashboard-counter-title">Jumlah Selesai Tes</span><br>
                <span class="dashboard-counter-number">{{$count}}</span>
              <p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card blue">
            <div class="card-body d-flex align-items-start">
              <i class="fas fa-user-graduate fa-4x"></i>
              <p class="ml-3">
                <span class="h5 dashboard-counter-title">Jumlah Biodata</span><br>
                <span class="dashboard-counter-number">{{$detsis}}</span>
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
              Grafik Jenis Kelamin Siswa
            </div>
            <!--Card content-->
            <div class="card-body">
              <canvas id="genderChart"></canvas>
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
              Grafik Hobi Siswa
            </div>
            <!--Card content-->
            <div class="card-body">
              <canvas id="hobiChart"></canvas>
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
      
$('#data').DataTable({
  "paging": true,
  "lengthChange": true,
  "searching": true,
  "ordering": true,
  "info": true,
  "autoWidth": false,
  "responsive": true,
  "columnDefs": [ {
    "targets": 4,
    "orderable": false
  }]
});
  </script>
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
    //pie
    var ctxP = document.getElementById("genderChart").getContext('2d');
    var genderChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Laki-Laki", "Perempuan"],
        datasets: [{
          data: {{json_encode([$lk,$pr])}},
          backgroundColor: ["#e91e63", "#3f51b5"],
          hoverBackgroundColor: ["#e91e63", "#3f51b5"]
        }]
      },
      options: {
        responsive: true,
      }
    });


    //pie
    var ctxP = document.getElementById("hobiChart").getContext('2d');
    var hobiChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: {!!json_encode($hobbies)!!},
        datasets: [{
          data: {{json_encode([$h1,$h2,$h3,$h4,$h5,$h6,$h7,$h8,$h9])}},
          backgroundColor: ["#00bcd4", "#d4e157","#4caf50","#ff5722","#45526e","#f44336 ","#9c27b0","#e91e63","#76ff03"],
          hoverBackgroundColor: ["#00bcd4", "#d4e157","#4caf50","#ff5722","#45526e","#f44336 ","#9c27b0","#e91e63","#76ff03"]
        }]
      },
      options: {
        responsive: true,
      }
    });
  </script>

@endsection
