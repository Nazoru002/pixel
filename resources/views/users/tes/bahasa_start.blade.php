@extends('users.layouts.master')
@section('content')
<div class="text-center mb-4">
    <!--<h1 class="page-title">PIXEL</h1>-->
    <img src="{{asset('images/Logo Piccel.png')}}" class="logo logo-stroke">
</div>
<div class="card panel login-box p-3">
    <div class="card-body">
        <h2 class="box-title">Tes Bahasa</h2>
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
        <form id="form_soal" action="{{route('siswa-tes-bahasa-start')}}" method="POST">
            @csrf
            <div id="soal" class="owl-carousel bold text-left">
                <div class="p-3">
                    <p>Soal Nomor 1</p>
                    <p>Pertemuan >< ..... </p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_1" name="j_1" required value="A" data-no="1">
                            <label class="custom-control-label" for="a_1">A. Perceraian</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_1" name="j_1" required value="B" data-no="1">
                            <label class="custom-control-label" for="b_1">B. Musyawarah</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_1" name="j_1" required value="C" data-no="1">
                            <label class="custom-control-label" for="c_1">C. Perundingan</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_1" name="j_1" required value="D" data-no="1">
                            <label class="custom-control-label" for="d_1">D. Perpisahan</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 2</p>
                    <p>Deduksi >< ...</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_2" name="j_2" required value="A" data-no="2">
                            <label class="custom-control-label" for="a_2">A. Konduksi</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_2" name="j_2" required value="B" data-no="2">
                            <label class="custom-control-label" for="b_2">B. Reduksi</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_2" name="j_2" required value="C" data-no="2">
                            <label class="custom-control-label" for="c_2">C. Intuisi</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_2" name="j_2" required value="D" data-no="2">
                            <label class="custom-control-label" for="d_2">D. Induksi</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 3</p>
                    <p>Padanan >< ...</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_3" name="j_3" required value="A" data-no="3">
                            <label class="custom-control-label" for="a_3">A. Persamaan</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_3" name="j_3" required value="B" data-no="3">
                            <label class="custom-control-label" for="b_3">B. Perbandingan</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_3" name="j_3" required value="C" data-no="3">
                            <label class="custom-control-label" for="c_3">C. Pertidaksamaan</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_3" name="j_3" required value="D" data-no="3">
                            <label class="custom-control-label" for="d_3">D. Kesesuaian</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 4</p>
                    <p>Insomnia = ....</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_4" name="j_4" required value="A" data-no="4">
                            <label class="custom-control-label" for="a_4">A. Cemas</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_4" name="j_4" required value="B" data-no="4">
                            <label class="custom-control-label" for="b_4">B. Sedih</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_4" name="j_4" required value="C" data-no="4">
                            <label class="custom-control-label" for="c_4">C. Tidak bisa tidur</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_4" name="j_4" required value="D" data-no="4">
                            <label class="custom-control-label" for="d_4">D. Kenyataannya.</label>
                        </div>
                    </div>
                </div>

                <div class="p-3">
                    <p>Soal Nomor 5</p>
                    <p>Proteksi = .....</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_5" name="j_5" required value="A" data-no="5">
                            <label class="custom-control-label" for="a_5">A. Perlindungan</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_5" name="j_5" required value="B" data-no="5">
                            <label class="custom-control-label" for="b_5">B. Kesejahteraan</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_5" name="j_5" required value="C" data-no="5">
                            <label class="custom-control-label" for="c_5">C. Kenyamanan</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_5" name="j_5" required value="D" data-no="5">
                            <label class="custom-control-label" for="d_5">D. Keselamatan</label>
                        </div>
                    </div>
                </div>

                <div class="p-3">
                    <p>Soal Nomor 6</p>
                    <p>Prestise = ....</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_6" name="j_6" required value="A" data-no="6">
                            <label class="custom-control-label" for="a_6">A. Martabat</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_6" name="j_6" required value="B" data-no="6">
                            <label class="custom-control-label" for="b_6">B. Capaian</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_6" name="j_6" required value="C" data-no="6">
                            <label class="custom-control-label" for="c_6">C. Juara</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_6" name="j_6" required value="D" data-no="6">
                            <label class="custom-control-label" for="d_6">D. Unggul</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 7</p>
                    <p>Telinga : Suara = Mata : ….</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_7" name="j_7" required value="A" data-no="7">
                            <label class="custom-control-label" for="a_7">A. Cahaya</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_7" name="j_7" required value="B" data-no="7">
                            <label class="custom-control-label" for="b_7">B. Penglihatan</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_7" name="j_7" required value="C" data-no="7">
                            <label class="custom-control-label" for="c_7">C. Pupil</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_7" name="j_7" required value="D" data-no="7">
                            <label class="custom-control-label" for="d_7">D. Lensa</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 8</p>
                    <p>Gunung : Pegunungan = Individu : ....</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_8" name="j_8" required value="A" data-no="8">
                            <label class="custom-control-label" for="a_8">A. Komunitas</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_8" name="j_8" required value="B" data-no="8">
                            <label class="custom-control-label" for="b_8">B. Kelompok</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_8" name="j_8" required value="C" data-no="8">
                            <label class="custom-control-label" for="c_8">C. Populasi</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_8" name="j_8" required value="D" data-no="8">
                            <label class="custom-control-label" for="d_8">D. Manusia</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 9</p>
                    <p>Pilihlah kata yang berbeda dengan kelompok kata berikut : ...</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_9" name="j_9" required value="A" data-no="9">
                            <label class="custom-control-label" for="a_9">A. Angsa</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_9" name="j_9" required value="B" data-no="9">
                            <label class="custom-control-label" for="b_9">B. Ayam</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_9" name="j_9" required value="C" data-no="9">
                            <label class="custom-control-label" for="c_9">C. Kalkun</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_9" name="j_9" required value="D" data-no="9">
                            <label class="custom-control-label" for="d_9">D. Tapir</label>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <p>Soal Nomor 10</p>
                    <p>Pilihlah kata yang berbeda dengan kelompok kata berikut : ...</p>
                    <div>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="a_10" name="j_10" required value="A" data-no="10">
                            <label class="custom-control-label" for="a_10">A. Kepala</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="b_10" name="j_10" required value="B" data-no="10">
                            <label class="custom-control-label" for="b_10">B. Ember</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="c_10" name="j_10" required value="C" data-no="10">
                            <label class="custom-control-label" for="c_10">C. Kambing</label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="d_10" name="j_10" required value="D" data-no="10">
                            <label class="custom-control-label" for="d_10">D. Kancing</label>
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