@extends('users.layouts.master')
@section('content')
<div class="text-center mb-4">
    <!--<h1 class="page-title">PIXEL</h1>-->
    <img src="{{asset('images/Logo Piccel.png')}}" class="logo logo-stroke">
</div>
<div class="card panel login-box p-3">
    <div class="card-body">
        <h2 class="box-title">Tes Kepribadian</h2>
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
        <p class="mt-3 bold">Pilih salah satu opsi yang paling menggambarkan diri Anda di setiap barisnya.
Pastikan Anda berada di situasi yang tenang agar hasilnya dapat optimal.
</p>
        <form id="form_soal" action="{{route('siswa-tes-kepribadian-start')}}" method="POST">
            @csrf
            <div id="soal" class="owl-carousel bold text-left" style="margin-top: -20px;">
                <div class="p-3">
                    <p>Soal Nomor 1</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_1" name="j_1" required value="A" data-no="1">
                            <label class="custom-control-label" for="a_1">A. Suka Membalas Dendam</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_1" name="j_1" required value="B" data-no="1">
                            <label class="custom-control-label" for="b_1">B. Sering Resah/Gelisah</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_1" name="j_1" required value="C" data-no="1">
                            <label class="custom-control-label" for="c_1">C. Perlu Dorongan/Bimbingan</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_1" name="j_1" required value="D" data-no="1">
                            <label class="custom-control-label" for="d_1">D. Gegabah/Terburu-buru</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 2</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_2" name="j_2" required value="A" data-no="2">
                            <label class="custom-control-label" for="a_2">A. Riang/Gembira</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_2" name="j_2" required value="B" data-no="2">
                            <label class="custom-control-label" for="b_2">B. Konsisten/Tidak Mudah Berubah</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_2" name="j_2" required value="C" data-no="2">
                            <label class="custom-control-label" for="c_2">C. Berbudaya/Terpelajar</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_2" name="j_2" required value="D" data-no="2">
                            <label class="custom-control-label" for="d_2">D. Berani Mengambil Resiko</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 3</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_3" name="j_3" required value="A" data-no="3">
                            <label class="custom-control-label" for="a_3">A. Idealis</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_3" name="j_3" required value="B" data-no="3">
                            <label class="custom-control-label" for="b_3">B. Mandiri</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_3" name="j_3" required value="C" data-no="3">
                            <label class="custom-control-label" for="c_3">C. Percaya pada Ide Teman</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_3" name="j_3" required value="D" data-no="3">
                            <label class="custom-control-label" for="d_3">D. Suka Memberi Inspirasi</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 4</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_4" name="j_4" required value="A" data-no="4">
                            <label class="custom-control-label" for="a_4">A. Penuh Pertimbangan</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_4" name="j_4" required value="B" data-no="4">
                            <label class="custom-control-label" for="b_4">B. Senang Dibimbing</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_4" name="j_4" required value="C" data-no="4">
                            <label class="custom-control-label" for="c_4">C. Suka Bersaing</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_4" name="j_4" required value="D" data-no="4">
                            <label class="custom-control-label" for="d_4">D. Suka Meyakinkan</label>
                        </div>
                    </div>
                </div>

                <div class="p-3">
                    <p>Soal Nomor 5</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_5" name="j_5" required value="A" data-no="5">
                            <label class="custom-control-label" for="a_5">A. Kurang Disiplin</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_5" name="j_5" required value="B" data-no="5">
                            <label class="custom-control-label" for="b_5">B. Tidak Simpatik</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_5" name="j_5" required value="C" data-no="5">
                            <label class="custom-control-label" for="c_5">C. Kurang Antusias/Tidak Bergairah (Cuek)</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_5" name="j_5" required value="D" data-no="5">
                            <label class="custom-control-label" for="d_5">D. Tidak Mudah Memaafkan</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 6</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_6" name="j_6" required value="A" data-no="6">
                            <label class="custom-control-label" for="a_6">A. Perantara/Penengah</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_6" name="j_6" required value="B" data-no="6">
                            <label class="custom-control-label" for="b_6">B. Gemar Musik Lembut</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_6" name="j_6" required value="C" data-no="6">
                            <label class="custom-control-label" for="c_6">C. Cepat Bertindak</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_6" name="j_6" required value="D" data-no="6">
                            <label class="custom-control-label" for="d_6">D. Mudah Berbaur/Bergaul</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 7</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_7" name="j_7" required value="A" data-no="7">
                            <label class="custom-control-label" for="a_7">A. Perencana</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_7" name="j_7" required value="B" data-no="7">
                            <label class="custom-control-label" for="b_7">B. Sabar</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_7" name="j_7" required value="C" data-no="7">
                            <label class="custom-control-label" for="c_7">C. Berpikir Positif</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_7" name="j_7" required value="D" data-no="7">
                            <label class="custom-control-label" for="d_7">D. Suka Memuji/Menyanjung</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 8</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_8" name="j_8" required value="A" data-no="8">
                            <label class="custom-control-label" for="a_8">A. Praktis</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_8" name="j_8" required value="B" data-no="8">
                            <label class="custom-control-label" for="b_8">B. Spontan</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_8" name="j_8" required value="C" data-no="8">
                            <label class="custom-control-label" for="c_8">C. Ketat pada Waktu</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_8" name="j_8" required value="D" data-no="8">
                            <label class="custom-control-label" for="d_8">D. Pemalu</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 9</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_9" name="j_9" required value="A" data-no="9">
                            <label class="custom-control-label" for="a_9">A. Lincah/Suka Membuka Diri</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_9" name="j_9" required value="B" data-no="9">
                            <label class="custom-control-label" for="b_9">B. Mampu Memutuskan</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_9" name="j_9" required value="C" data-no="9">
                            <label class="custom-control-label" for="c_9">C. Cinta Keluarga</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_9" name="j_9" required value="D" data-no="9">
                            <label class="custom-control-label" for="d_9">D. Tekun/Ulet</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 10</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_10" name="j_10" required value="A" data-no="10">
                            <label class="custom-control-label" for="a_10">A. Mudah Menerima Saran</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_10" name="j_10" required value="B" data-no="10">
                            <label class="custom-control-label" for="b_10">B. Suka Memimpin</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_10" name="j_10" required value="C" data-no="10">
                            <label class="custom-control-label" for="c_10">C. Berpikir Matematis</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_10" name="j_10" required value="D" data-no="10">
                            <label class="custom-control-label" for="d_10">D. Lucu/Humoris</label>
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