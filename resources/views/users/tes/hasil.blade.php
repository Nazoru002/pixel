@extends('users.layouts.master')
@section('content')
<div class="hasil-tes">
    <div class="text-center mb-4">
        <h1 class="page-title">HASIL</h1>
    </div>
    @php
        use App\JawabanTesUser;
        use App\KunciJawaban;
        use App\HasilTes;
        $hnumerik = HasilTes::where('id_user',Auth::user()->id)->where('type','numerik')->first();
        $hbahasa = HasilTes::where('id_user',Auth::user()->id)->where('type','bahasa')->first();
        $hlogika = HasilTes::where('id_user',Auth::user()->id)->where('type','logika')->first();
        $hkepribadian = HasilTes::where('id_user',Auth::user()->id)->where('type','kepribadian')->first();
        $hdayaingat = HasilTes::where('id_user',Auth::user()->id)->where('type','daya_ingat')->first();
        
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
@endsection

@section('js_addon')
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
</script>
@endsection