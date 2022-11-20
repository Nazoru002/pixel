@extends('bk.master')
@section('title','Detail Data '.$data->nama_user)
@section('content')
      @php
        
        use App\JawabanTesUser;
        use App\KunciJawaban;
        use App\HasilTes;
        use App\DetailSiswa;
        $biodata = DetailSiswa::where('id_user',$data->id)->first();
        $hnumerik = HasilTes::where('id_user',$data->id)->where('type','numerik')->first();
        $hbahasa = HasilTes::where('id_user',$data->id)->where('type','bahasa')->first();
        $hlogika = HasilTes::where('id_user',$data->id)->where('type','logika')->first();
        $hkepribadian = HasilTes::where('id_user',$data->id)->where('type','kepribadian')->first();
        $hdayaingat = HasilTes::where('id_user',$data->id)->where('type','daya_ingat')->first();
        
        $chartNilai = array();
        $count = 0;
        
        $rataTotal = 0;
        $nnumerik = 0;
        $nbahasa = 0;
        $nlogika = 0;
        $nkepribadian = 0;
        $ndayaingat = 0;

        if($hnumerik){
            $count++;
            $nnumerik = (int) $hnumerik->hasil;
            array_push($chartNilai,$nnumerik);
        }
        if($hbahasa){
            $count++;
            $nbahasa = (int) $hbahasa->hasil;
            array_push($chartNilai,$nbahasa);
        }
        if($hlogika){
            $count++;
            $nlogika = (int) $hlogika->hasil;
            array_push($chartNilai,$nlogika);
        }
        if($hkepribadian){
            $count++;
            $nkepribadian = (int) $hkepribadian->hasil;
        }
        if($hdayaingat){
            $count++;
            $ndayaingat = (int) $hdayaingat->hasil;
            array_push($chartNilai,$ndayaingat);
        }

        $rataTotal = round(($nbahasa+$nlogika+$ndayaingat+$nnumerik)/4);

        $predikat = ['0','S','C','D','I','0'];
        $title = ['NONE','STEADINESS (KEMANTAPAN)','COMPLIANCE (ADAPTIF)','DOMINANCE (MENDOMINASI)','INFLUENCE (BERPENGARUH)','ERROR'];
        
        $karakteristik = ['Belum Mengerjakan','Berdasarkan jawaban tersebut anda memiliki potensi untuk menjadi pendengar yang baik, anggota tim yang baik, posesif, tenang, dapat diprediksi, Memahami, ramah.','Berdasarkan jawaban tersebut anda memiliki potensi untuk menjadi akurat, analitis, teliti, berhati-hati, pencari fakta, presisi, sandar yang tinggi, sistematis.','Berdasarkan jawaban tersebut anda memiliki potensi untuk menjadi pemberi perintah langsung, mengambil keputusan, memiliki ego tinggi, pemecah masalah, pengambil risiko, memiliki inisiatif tinggi.','Berdasarkan jawaban tersebut anda memiliki potensi memiliki antusias tinggi, dapat dipercaya, optimis, persuasif, talkative, impulsif, emosional.','System Error'];
                
        $plus = ['Belum Mengerjakan','Anda cenderung dapat diandalkan, anggota yang setia, patuh pada peraturan, pendengar yang baik, sabar dan berempati, baik sebagai penengah konflik.','Memiliki perspektif yang baik, emosi yang stabil, meneliti semua aktivitas, mampu memahami situasi, mengumpulan, mengkritisi dan menguji informasi.','Pengambil keputusan, menjunjung nilai tim, menantang status quo, inovatif.','Pemecah masalah kreatif, penyemangat yang baik, memotivasi yang lain untuk mencapai tujuan, selera humor yang positif, pendamai.','System Error'];
        
        $minus = ['Belum Mengerjakan','Kamu memiliki kecenderungan untuk menolak perubahan, perlu waktu lama untuk berubah, pendendam, sensitif terhadap kritik, sulit menentukan prioritas.','Kamu memiliki kecenderungan untuk memerlukan batasan yang jelas antara tindakan dan hubungan, terikat dengan prosedur dan metode, terlalu memikirkan deti, tidak mengungkapkan perasaan secara verbal, tidak mau berdebat dan menyimpan sendiri perasaan.','Kamu memiliki kecenderungan untuk melangkahi otoritas, suka berargumen, tidak suka rutinitas, mencoba terlalu banyak sekaligus.','Kamu memiliki kecenderungan untuk lebih memikirkan popularitas daripada hasil nyata, tidak peduli pada detil, gerakan tubuh dan wajah yang berlebihan, hanya mau mendengarkan apabila menarik.','System Error'];
        $kepribadian_index = $nkepribadian;
      @endphp
      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">
          <div class="card">
            <div class="card-header">
              Informasi Akun
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Nama </b></div><div class="col-9"> : {{$data->nama_user}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Username </b></div><div class="col-9"> : {{$data->username}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Password </b></div><div class="col-9"> : {{$data->display_password}}</div></div></li>
            </div>
          </div>
        </div>

      </div>
      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">
          <!--Card-->
          <div class="card">
            <div class="card-header">
              Biodata Siswa
            </div>
            <div class="card-body">
              @if($biodata)
                <h5 class="text-center">Biodata Diri</h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Nama Siswa </b></div><div class="col-9"> : {{$biodata->nama}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Lembaga Sekolah </b></div><div class="col-9"> : {{$biodata->lembaga_sekolah}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Kelas </b></div><div class="col-9"> : {{$biodata->kelas}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Jurusan </b></div><div class="col-9"> : {{$biodata->jurusan}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Sub Jurusan </b></div><div class="col-9"> : {{$biodata->jurusan}}-{{$biodata->sub_jurusan}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Jenis Kelamin </b></div><div class="col-9"> : {{$biodata->jenis_kelamin}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Tanggal Lahir </b></div><div class="col-9"> : {{$biodata->tgl_lahir}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Cita Cita </b></div><div class="col-9"> : {{$biodata->cita_cita}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Minat Melanjutkan </b></div><div class="col-9"> : {{$biodata->minat_melanjutkan}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Hobi </b></div><div class="col-9"> : {{$biodata->hobi}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Nomor HP </b></div><div class="col-9"> : {{$biodata->no_telp}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Email </b></div><div class="col-9"> : {{$biodata->email}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Akun Facebook </b></div><div class="col-9"> : {{$biodata->facebook}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Akun Instagram </b></div><div class="col-9"> : {{$biodata->instagram}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Akun Youtube </b></div><div class="col-9"> : {{$biodata->youtube}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Kelebihan Diri </b></div><div class="col-9"> : {{$biodata->strength}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Kekurangan Diri </b></div><div class="col-9"> : {{$biodata->weakness}}</div></div></li>
                </ul>
                <h5 class="text-center mt-5">Biodata Orang Tua</h5>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Nama Ayah </b></div><div class="col-9"> : {{$biodata->nama_ayah}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Nomor HP Ayah </b></div><div class="col-9"> : {{$biodata->hp_ayah}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Pekerjaan Ayah </b></div><div class="col-9"> : {{$biodata->job_ayah}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Nama Ibu </b></div><div class="col-9"> : {{$biodata->nama_ibu}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Nomor HP Ibu </b></div><div class="col-9"> : {{$biodata->hp_ibu}}</div></div></li>
                  <li class="list-group-item"><div class="row"><div class="col-3"><b>Pekerjaan Ibu </b></div><div class="col-9"> : {{$biodata->job_ibu}}</div></div></li>
                </ul>
              @else
                Siswa/i belum mengisi biodata
              @endif
            </div>
          </div>
          <!--/.Card-->

        </div>

      </div>
      <!--Grid row-->

      <div class="row wow fadeIn">
        <div class="col-md-12 mb-4">
          <div class="card">
            <div class="card-header">
              Hasil Tes Siswa
            </div>
            <div class="card-body">
              <div class="row mb-3">
                  <div class="card hasil-header grey lighten-5">
                      <div class="card-body d-flex flex-row">
                          <div class="align-self-end w-100">
                              <div class="progress" style="width: 80%">
                                  <div class="progress-bar orange lighten-2" role="progressbar" style="width: {{20*$count}}%;" aria-valuenow="100" aria-valuemin=0 aria-valuemax="100"></div>
                              </div>
                              <p class="mt-2 bolder">{{$count}} dari 5 Tes sudah dikerjakan</p>
                          </div>
                      </div>
                  </div>
                  <div class="card hasil-header orange lighten-2 text-center text-white">
                      <div class="card-body">
                          <span class="header-nilai">{{$rataTotal}}</span><br>
                          <span class="header-nilai-label">Rata-Rata</span>
                      </div>
                  </div>
              </div>
              <div class="row mb-3">
                  <div class="col-sm-3">
                      <div class="card grey lighten-5 custom-radius">
                          <div class="card-body">
                              <h2 class="bolder text-center hasil-nilai">{{$nnumerik}}</h2>
                              <p><small>Score<br></small><span class="bolder">Tes Numerik</span></p>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="card grey lighten-5 custom-radius">
                          <div class="card-body">
                              <h2 class="bolder text-center hasil-nilai">{{$nbahasa}}</h2>
                              <p><small>Score<br></small><span class="bolder">Tes Bahasa</span></p>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="card grey lighten-5 custom-radius">
                          <div class="card-body">
                              <h2 class="bolder text-center hasil-nilai">{{$nlogika}}</h2>
                              <p><small>Score<br></small><span class="bolder">Tes Logika</span></p>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="card grey lighten-5 custom-radius">
                          <div class="card-body">
                              <h2 class="bolder text-center hasil-nilai">{{$ndayaingat}}</h2>
                              <p><small>Score<br></small><span class="bolder">Tes Daya Ingat</span></p>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row mb-3">
                  <div class="col-sm-12">
                      <div class="card grey lighten-5 custom-radius">
                          <div class="card-body">
                              <canvas id="chart"></canvas>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row mb-3">
                  <div class="col-sm-12">
                      <div class="card grey lighten-5 custom-radius">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-sm-4">
                                      <div class="card hasil-kepribadian-nilai text-center h-100 d-flex flex-row">
                                          <div class="card-body align-self-center">
                                              <span class="hasil-predikat">{{$predikat[$kepribadian_index]}}</span><hr class="hasil-line"><span class="hasil-predikat2">{{$title[$kepribadian_index]}}</span>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-8">
                                      <h5 class="hasil-kepribadian-title">Karakteristik Umum :</h5>
                                      <p class="hasil-kepribadian-desc text-justify">{{$karakteristik[$kepribadian_index]}}</p>
                                      <h5 class="hasil-kepribadian-title">Nilai Untuk Tim :</h5>
                                      <p class="hasil-kepribadian-desc text-justify">{{$plus[$kepribadian_index]}}</p>
                                      <h5 class="hasil-kepribadian-title">Kekurangan :</h5>
                                      <p class="hasil-kepribadian-desc text-justify">{{$minus[$kepribadian_index]}}</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row wow fadeIn">
        <div class="col-md-12 mb-4">
            <a class="btn btn-block btn-rounded btn-warning" href="{{route('bk-siswa-edit',$data->id)}}">Edit</a>
            <button class="btn btn-block btn-rounded btn-danger btn-delete" data-url="{{route('bk-siswa-delete',$data->id)}}">Hapus</button>
        </div>
      </div>
@endsection
@section('js_addon')
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

  <!-- Charts -->
  <script>
    var ctx = document.getElementById('chart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Tes Numerik', 'Tes Bahasa', 'Tes Logika', 'Tes Daya Ingat'],
            datasets: [{
                label: 'Score Tes',
                data: {{json_encode($chartNilai)}},
                backgroundColor: [
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
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        suggestedMax: 100
                    }
                }]
            }
        }
    });
    $(document).ready(function(){
      $('.btn-delete').on('click',function(){
        var url = $(this).data('url');
        Swal.fire({
            title: 'Anda yakin ingin menghapus data siswa ini ?',
            text: "Data Siswa termasuk Tes dan Biodata Siswa akan ikut terhapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff4444',
            confirmButtonText: 'Hapus',
        }).then((result) => {
            if (result.value) {
              window.location.href = url;
            }
        });
      });
    });
  </script>

@endsection
