@extends('users.layouts.master')
@section('content')
<div class="text-center mb-4">
    <!--<h1 class="page-title">PIXEL</h1>-->
    <img src="{{asset('images/Logo Piccel.png')}}" class="logo logo-stroke">
</div>
<div class="card panel login-box p-3">
    <div class="card-body">
        <h2 class="box-title">Tes Daya Ingat</h2>
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
            <!-- <button type="button" id="prev" class="btn btn-sm btn-rounded btn-info">Previous</button> -->
            <button type="button" id="done" class="btn btn-sm btn-rounded btn-success disabled">Selesai</button>
            <button type="button" id="next" class="btn btn-sm btn-rounded btn-info disabled">Next</button>
        </div>
        <form id="form_soal" action="{{route('siswa-tes-dayaingat-start')}}" method="POST">
            @csrf
            <button type="button" id="start" class="btn btn-lg btn-block btn-rounded btn-success my-3">Mulai Tes</button>
            <div id="soal" class="owl-carousel bold text-left ingat-soal" style="display:none;">
                <div class="p-3">
                    <p>Soal Nomor 1</p>
                    <div id="soal_1">
                        <input type="hidden" name="n_1" class="jawaban">
                        <div class="card ingat-button-container mb-3">
                            <div class="card-body">
                                <div class="progress">
                                    <div class="progress-bar orange lighten-2" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin=0 aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-3">
                            <p class="label h3 bolder">Ingatlah Tata Letak Berikut</p>
                            <p class="soal d-none h3 bolder">Dimanakah letak huruf "K" ?</p>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="1">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>X</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="2">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>K</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="3">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>Y</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="4">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>W</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="5">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>V</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="6">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>W</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="7">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>T</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="8">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>L</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-3">
                    <p>Soal Nomor 2</p>
                    <div id="soal_2">
                        <input type="hidden" name="n_2" class="jawaban">
                        <div class="card ingat-button-container mb-3">
                            <div class="card-body">
                                <div class="progress">
                                    <div class="progress-bar orange lighten-2" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin=0 aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-3">
                            <p class="label h3 bolder">Ingatlah Tata Letak Berikut</p>
                            <p class="soal d-none h3 bolder">Dimanakah letak huruf "T" ?</p>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="1">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>N</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="2">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>M</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="3">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>Y</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="4">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>H</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="5">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>D</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="6">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>T</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="7">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>X</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="8">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>A</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="p-3">
                    <p>Soal Nomor 3</p>
                    <div id="soal_3">
                        <input type="hidden" name="n_3" class="jawaban">
                        <div class="card ingat-button-container mb-3">
                            <div class="card-body">
                                <div class="progress">
                                    <div class="progress-bar orange lighten-2" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin=0 aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-3">
                            <p class="label h3 bolder">Ingatlah Tata Letak Berikut</p>
                            <p class="soal d-none h3 bolder">Dimanakah letak huruf "D" ?</p>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="1">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>O</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="2">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>P</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="3">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>U</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="4">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>C</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="5">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>S</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="6">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>D</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="7">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>R</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="8">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>G</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="p-3">
                    <p>Soal Nomor 4</p>
                    <div id="soal_4">
                        <input type="hidden" name="n_4" class="jawaban">
                        <div class="card ingat-button-container mb-3">
                            <div class="card-body">
                                <div class="progress">
                                    <div class="progress-bar orange lighten-2" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin=0 aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-3">
                            <p class="label h3 bolder">Ingatlah Tata Letak Berikut</p>
                            <p class="soal d-none h3 bolder">Dimanakah letak huruf "B" ?</p>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="1">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>P</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="2">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>D</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="3">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>R</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="4">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>U</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="5">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>Q</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="6">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>C</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="7">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>B</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="8">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>Y</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="p-3">
                    <p>Soal Nomor 5</p>
                    <div id="soal_5">
                        <input type="hidden" name="n_5" class="jawaban">
                        <div class="card ingat-button-container mb-3">
                            <div class="card-body">
                                <div class="progress">
                                    <div class="progress-bar orange lighten-2" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin=0 aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-3">
                            <p class="label h3 bolder">Ingatlah Tata Letak Berikut</p>
                            <p class="soal d-none h3 bolder">Dimanakah letak huruf "Y" ?</p>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="1">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>V</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="2">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>Y</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="3">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>U</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="4">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>M</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="5">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>N</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="6">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>X</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="7">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>H</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="8">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>Q</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="p-3">
                    <p>Soal Nomor 6</p>
                    <div id="soal_6">
                        <input type="hidden" name="n_6" class="jawaban">
                        <div class="card ingat-button-container mb-3">
                            <div class="card-body">
                                <div class="progress">
                                    <div class="progress-bar orange lighten-2" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin=0 aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-3">
                            <p class="label h3 bolder">Ingatlah Tata Letak Berikut</p>
                            <p class="soal d-none h3 bolder">Dimanakah letak huruf "L" ?</p>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="1">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>T</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="2">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>X</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="3">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>H</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="4">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>Z</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="5">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>Y</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="6">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>J</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="7">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>L</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="8">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>I</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="p-3">
                    <p>Soal Nomor 7</p>
                    <div id="soal_7">
                        <input type="hidden" name="n_7" class="jawaban">
                        <div class="card ingat-button-container mb-3">
                            <div class="card-body">
                                <div class="progress">
                                    <div class="progress-bar orange lighten-2" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin=0 aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-3">
                            <p class="label h3 bolder">Ingatlah Tata Letak Berikut</p>
                            <p class="soal d-none h3 bolder">Dimanakah letak huruf "K" ?</p>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="1">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>V</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="2">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>Y</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="3">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>U</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="4">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>M</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="5">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>N</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="6">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>X</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="7">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>H</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="8">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>K</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="p-3">
                    <p>Soal Nomor 8</p>
                    <div id="soal_8">
                        <input type="hidden" name="n_8" class="jawaban">
                        <div class="card ingat-button-container mb-3">
                            <div class="card-body">
                                <div class="progress">
                                    <div class="progress-bar orange lighten-2" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin=0 aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-3">
                            <p class="label h3 bolder">Ingatlah Tata Letak Berikut</p>
                            <p class="soal d-none h3 bolder">Dimanakah letak huruf "V" ?</p>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="1">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>X</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="2">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>K</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="3">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>Y</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="4">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>W</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="5">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>V</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="6">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>W</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="7">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>T</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="8">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>L</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="p-3">
                    <p>Soal Nomor 9</p>
                    <div id="soal_9">
                        <input type="hidden" name="n_9" class="jawaban">
                        <div class="card ingat-button-container mb-3">
                            <div class="card-body">
                                <div class="progress">
                                    <div class="progress-bar orange lighten-2" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin=0 aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-3">
                            <p class="label h3 bolder">Ingatlah Tata Letak Berikut</p>
                            <p class="soal d-none h3 bolder">Dimanakah letak huruf "G" ?</p>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="1">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>O</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="2">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>P</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="3">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>U</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="4">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>C</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="5">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>S</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="6">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>D</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="7">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>R</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="8">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>G</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="p-3">
                    <p>Soal Nomor 10</p>
                    <div id="soal_10">
                        <input type="hidden" name="n_10" class="jawaban">
                        <div class="card ingat-button-container mb-3">
                            <div class="card-body">
                                <div class="progress">
                                    <div class="progress-bar orange lighten-2" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin=0 aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-3">
                            <p class="label h3 bolder">Ingatlah Tata Letak Berikut</p>
                            <p class="soal d-none h3 bolder">Dimanakah letak huruf "H" ?</p>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="1">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>N</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="2">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>M</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="3">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>Y</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="4">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>H</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="5">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>D</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="6">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>T</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="7">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>X</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a class="ingat-action" data-value="8">
                                        <div class="card ingat-button orange lighten-2">
                                            <div class="card-body">
                                                <span>A</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
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
    var handlerElement = null;
    var hasAnswered = false;
    var duration = 5;
    var owl = $('#soal');
    var no = 1;
    function ingatHandler(){
        handlerElement.find('.ingat-button').removeClass('blue');
        handlerElement.find('.ingat-button').removeClass('orange');
        handlerElement.find('.ingat-button').addClass('orange');
        $(this).find('.ingat-button').addClass('blue');
        $(this).find('.ingat-button').removeClass('orange');
        handlerElement.find('.jawaban').val($(this).data('value'));
        hasAnswered = true;
        $('#next').removeClass('disabled');
        if(no >= 10){
            $('#next').addClass('disabled');
            $('#done').removeClass('disabled');
        }
    }
    function progress(timeLeft,timeTotal,$element){
        var width = timeLeft * $element.width() / timeTotal;
        $element.find('.progress').find('div').animate({width:width},500);
        if(timeLeft > -1){
            setTimeout(function(){
                progress(timeLeft - 1,timeTotal,$element);
            },1000);
        }
        else{
            $element.find('.label').addClass('d-none');
            $element.find('.soal').removeClass('d-none');
            $element.find('.ingat-button').find('span').html('?');
            handlerElement = $element;
            $element.find('.ingat-action').on('click',ingatHandler);
        }
    }
    $(document).ready(function(){
        $('#next').click(function() {
            if(!hasAnswered){
                return;
            }
            if(no < 10){
                $('#no_'+no).removeClass('active');
                ++no;
                $('#no_'+no).addClass('active');
            }
            $('#next').addClass('disabled');
            owl.trigger('next.owl.carousel',[500]);
            progress(duration,duration,$('#soal_'+no));
        });

        $('#done').click(function(){
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
        });
        $('#start').click(function(){
            $('#start').fadeOut('slow',function(){
                $('#soal').fadeIn('slow',function(){
                    owl.owlCarousel({items:1,touchDrag:false,mouseDrag:false,pullDrag:false,freeDrag:false,});
                    progress(duration,duration,$('#soal_1'));
                });
            });
        });
    });
</script>
@endsection