@extends('users.layouts.master')
@section('content')
<div class="text-center mb-4">
    <!--<h1 class="page-title">PIXEL</h1>-->
    <img src="{{asset('images/Logo Piccel.png')}}" class="logo logo-stroke">
</div>
<div class="card panel login-box p-3">
    <div class="card-body">
        <h2 class="box-title">Tes Logika</h2>
        <hr>

        <div class="">
            <ul class="pagination pg-blue justify-content-center">
                <li class="page-item active" id="no_1" data-no="1"><a class="page-link">1</a></li>
                <li class="page-item" id="no_2" data-no="2"><a class="page-link">2</a></li>
                <li class="page-item" id="no_3" data-no="3"><a class="page-link">3</a></li>
                <li class="page-item" id="no_4" data-no="4"><a class="page-link">4</a></li>
                <li class="page-item" id="no_5" data-no="5"><a class="page-link">5</a></li>
                <li class="page-item" id="no_6" data-no="6"><a class="page-link">6</a></li>
                <li class="page-item" id="no_7" data-no="7"><a class="page-link">7</a></li>
                <li class="page-item" id="no_8" data-no="8"><a class="page-link">8</a></li>
                <li class="page-item" id="no_9" data-no="9"><a class="page-link">9</a></li>
                <li class="page-item" id="no_10" data-no="10"><a class="page-link">10</a></li>
            </ul>
        </div>
        <div class="d-flex justify-content-between">
            <button type="button" id="prev" class="btn btn-sm btn-rounded btn-info">Previous</button>
            <button type="button" id="done" class="btn btn-sm btn-rounded btn-success">Selesai</button>
            <button type="button" id="next" class="btn btn-sm btn-rounded btn-info">Next</button>
        </div>
        <form id="form_soal" action="{{route('siswa-tes-logika-start')}}" method="POST">
            @csrf
            <div id="soal" class="owl-carousel bold text-left">
                <div class="p-3">
                    <p>Soal Nomor 1</p>
                    <p>Rendi dan Tiara mendengarkan music. Talia dan Rendi hobi membaca. Maka, yang sedang membaca sambil mengengarkan music adalah ….</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_1" name="j_1" required value="A" data-no="1">
                            <label class="custom-control-label" for="a_1">A. Tiara</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_1" name="j_1" required value="B" data-no="1">
                            <label class="custom-control-label" for="b_1">B. Talia dan Rendi</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_1" name="j_1" required value="C" data-no="1">
                            <label class="custom-control-label" for="c_1">C. Rendi</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_1" name="j_1" required value="D" data-no="1">
                            <label class="custom-control-label" for="d_1">D. Talia</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 2</p>
                    <p>Semua makhluk hidup bernapas. Semua hewan adalah makhluk hidup...</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_2" name="j_2" required value="A" data-no="2">
                            <label class="custom-control-label" for="a_2">A. Semua yang bernapas pasti hidup</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_2" name="j_2" required value="B" data-no="2">
                            <label class="custom-control-label" for="b_2">B. Ada hewan yang makhluk hidup</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_2" name="j_2" required value="C" data-no="2">
                            <label class="custom-control-label" for="c_2">C. Semua makhluk hidup ada yang hewan</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_2" name="j_2" required value="D" data-no="2">
                            <label class="custom-control-label" for="d_2">D. Semua hewan bernapas</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 3</p>
                    <p>Jika Bayu rajin belajar, maka Bayu lulus ujian.Bayu tidak lulus ujian, berarti ….</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_3" name="j_3" required value="A" data-no="3">
                            <label class="custom-control-label" for="a_3">A. Bayu rajin belajar</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_3" name="j_3" required value="B" data-no="3">
                            <label class="custom-control-label" for="b_3">B. Bayu tidak rajin belajar</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_3" name="j_3" required value="C" data-no="3">
                            <label class="custom-control-label" for="c_3">C. Bayu tidak belajar</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_3" name="j_3" required value="D" data-no="3">
                            <label class="custom-control-label" for="d_3">D. Bayu rajin dan terampil</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 4</p>
                    <p>Doni mendorong adiknya, Dini, hingga ia terjatuh dan menimpa vas bunga, sehingga vas bunganya  pecah. Kemudian, ibunya, Ajeng, memanggil keduanya untuk menghukum yang bersalah. Siapakah yang bersalah?</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_4" name="j_4" required value="A" data-no="4">
                            <label class="custom-control-label" for="a_4">A. Doni</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_4" name="j_4" required value="B" data-no="4">
                            <label class="custom-control-label" for="b_4">B. Dini</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_4" name="j_4" required value="C" data-no="4">
                            <label class="custom-control-label" for="c_4">C. Ibu</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_4" name="j_4" required value="D" data-no="4">
                            <label class="custom-control-label" for="d_4">D. Ajeng</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 5</p>
                    <p>Semua atlet berada di pusat pelatihan atau di rumah, pusat pelatihan kosong.</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_5" name="j_5" required value="A" data-no="5">
                            <label class="custom-control-label" for="a_5">A. Semua atlet berada di ruang pelatihan dan di rumah mereka</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_5" name="j_5" required value="B" data-no="5">
                            <label class="custom-control-label" for="b_5">B. Semua atlet berada di rumah masing-masing</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_5" name="j_5" required value="C" data-no="5">
                            <label class="custom-control-label" for="c_5">C. Semua atlet berlatih di rumah mereka sendiri</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_5" name="j_5" required value="D" data-no="5">
                            <label class="custom-control-label" for="d_5">D. Di rumah, tidak ada atlet yang berlatih</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 6</p>
                    <p>Ada perhiasan berlian yang berkilau yang terbuat dari berlian.</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_6" name="j_6" required value="A" data-no="6">
                            <label class="custom-control-label" for="a_6">A. Hanya cincin yang ada kilaunya</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_6" name="j_6" required value="B" data-no="6">
                            <label class="custom-control-label" for="b_6">B. Cincin berlian lah yang berkilau</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_6" name="j_6" required value="C" data-no="6">
                            <label class="custom-control-label" for="c_6">C. Semua cincin berlian mempunyai kilau</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_6" name="j_6" required value="D" data-no="6">
                            <label class="custom-control-label" for="d_6">D. Cincin berlian yang memiliki kilau</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 7</p>
                    <p>Kinara sering pergi ke tempat wisata di akhir pekan pada semua tempat di luar kota</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_7" name="j_7" required value="A" data-no="7">
                            <label class="custom-control-label" for="a_7">A. Kinara sering pergi wisata di luar kota</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_7" name="j_7" required value="B" data-no="7">
                            <label class="custom-control-label" for="b_7">B. Kinara tidak suka pergi ketampat wisata</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_7" name="j_7" required value="C" data-no="7">
                            <label class="custom-control-label" for="c_7">C. Kadangkala Kinara berwisata di dalam kota</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_7" name="j_7" required value="D" data-no="7">
                            <label class="custom-control-label" for="d_7">D. Kadangkala Kinara tidak berwisata</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 8</p>
                    <p>Jika Karina senang maka nilainya tinggi. Jika nilainya Karina tinggi maka ayah dan ibunya senang.<br> Kesimpulan yang dapat di ambil dari premis di atas ialah?</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_8" name="j_8" required value="A" data-no="8">
                            <label class="custom-control-label" for="a_8">A. Jika Karina senang maka nilainya tinggi</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_8" name="j_8" required value="B" data-no="8">
                            <label class="custom-control-label" for="b_8">B. Jika nilai tinggi maka Karina akan senang</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_8" name="j_8" required value="C" data-no="8">
                            <label class="custom-control-label" for="c_8">C. Jika Karina senang maka ayah dan ibunya senang</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_8" name="j_8" required value="D" data-no="8">
                            <label class="custom-control-label" for="d_8">D. Jika nilai tinggi maka keluarga Karina akan membuat pesta</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 9</p>
                    <p>Hanya barang-barang dari plastik yang dijual di toko Kurnia. Tekstil terbuat dari bahan dasar kapas. Kesimpulan:</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_9" name="j_9" required value="A" data-no="9">
                            <label class="custom-control-label" for="a_9">A. Barang plastik hanya dijual di toko Kurnia</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_9" name="j_9" required value="B" data-no="9">
                            <label class="custom-control-label" for="b_9">B. Semua barang di toko Kurnia bahan dasarnya plastik</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_9" name="j_9" required value="C" data-no="9">
                            <label class="custom-control-label" for="c_9">C. Tidak ada tekstil yang dijual di toko kurnia.</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_9" name="j_9" required value="D" data-no="9">
                            <label class="custom-control-label" for="d_9">D. Toko kurnia menjual barang dari kapas dan plastik.</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 10</p>
                    <p>Lima orang pedagang asongan menghitung hasil penjualan dalam satu hari. Pedagang III lebih banyak menjual dari pedagang IV, tetapi tidak melebihi pedagang I. Penjualan pedagang II tidak melebihi pedagang V dan melebihi pedagang I. Pedagang mana yang hasil penjualannya paling banyak?</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_10" name="j_10" required value="A" data-no="10">
                            <label class="custom-control-label" for="a_10">A. I</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_10" name="j_10" required value="B" data-no="10">
                            <label class="custom-control-label" for="b_10">B. II</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_10" name="j_10" required value="C" data-no="10">
                            <label class="custom-control-label" for="c_10">C. V</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_10" name="j_10" required value="D" data-no="10">
                            <label class="custom-control-label" for="d_10">D. IV</label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <hr>
    </div>
</div> 
@endsection

@section('js_addon')
<script type="text/javascript">
    $(document).ready(function(){
        var owl = $('#soal');
        var no = 1;
        owl.owlCarousel({items:1,touchDrag:false,mouseDrag:false,pullDrag:false,freeDrag:false,});
        $('#next').click(function() {
            if(no < 10){
                $('#no_'+no).removeClass('active');
                ++no;
                $('#no_'+no).addClass('active');
            }
            owl.trigger('next.owl.carousel',[500]);
        });
        $('#prev').click(function() {
            if(no > 1){
                $('#no_'+no).removeClass('active');
                --no;
                $('#no_'+no).addClass('active');
            }
            owl.trigger('prev.owl.carousel',[500]);
        });
        $('.page-item').click(function(){
            no = $(this).data('no');
            $('.page-item').removeClass('active');
            $('#no_'+no).addClass('active');
            owl.trigger('to.owl.carousel',[no-1,300]);
        });

        $('#done').click(function(){
            var radioNameHash = {},
                uncheckedRadioButtonGroups = 0,soalNo = [],soalNo2 = [];
            $('#form_soal input[type="radio"]').each(function(i, radioButton){

                if(radioNameHash[$(this).attr('name')] === undefined){
                    uncheckedRadioButtonGroups++;
                    radioNameHash[$(this).attr('name')] = true;
                }

                if($(this).prop("checked") === true){
                    uncheckedRadioButtonGroups--;
                    soalNo2.push($(this).data('no'));
                }
                else{
                    if(soalNo.indexOf($(this).data('no')) < 0 && soalNo2.indexOf($(this).data('no')) < 0){
                        soalNo.push($(this).data('no'));
                    }
                }
            });

            if(uncheckedRadioButtonGroups > 0){
                Swal.fire({title:"Soal belum terisi!",text:"Ada soal yang belum terisi \nNomor Soal yang belum terisi : "+soalNo.toString(),icon:'error'});
            }
            else{
                Swal.fire({
                    title: 'Anda yakin selesai ?',
                    text: "Jawaban tidak bisa dirubah",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#00c851',
                    cancelButtonColor: '#33b5e5',
                    confirmButtonText: 'Selesai',
                }).then((result) => {
                    if (result.value) {
                        $('#form_soal').submit();
                    }
                });
            }
        });
    });
</script>
@endsection