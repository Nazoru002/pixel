@extends('users.layouts.master')
@section('content')
    <div class="text-center mb-4">
        <!--<h1 class="page-title">PIXEL</h1>-->
        <img src="{{asset('images/Logo Piccel.png')}}" class="logo logo-stroke">
    </div>
    
    <!-- START : CARD -->
    <div class="card panel p-3">
        <div class="card-body">
            <!--<span style="font-family: 'Myriad Pro Bold' !important;font-size: 72px;font-weight: bolder !important;">PSC</span>-->
            <!--<hr style="height: 4px;border: none;color: #333;background-color: #333;margin-top: 5px;">-->
            <div class="mb-4">
                <h3 class="text-center">Professional Startup Class (PSC)</h3>
                <br>
                <p class="text-justify">&nbsp;&nbsp;&nbsp;&nbsp;PSC merupakan program pra-kuliah yang diadakan oleh International Professional Institute (IPI) bagi Siswa/Siswi kelas 12 SMA/SMK/MA sederajat dan bersertifikat.</p>
                <p class="text-left">
                    Syarat untuk bergabung dalam program PSC :
                    <ol class="text-justify pl-3">
                        <li>Siswa/Siswi yang sudah mengisi biodata dalam program pixel</li>
                        <li>Siswa/Siswi yang sudah melakukan pendaftaran dan booking quota di International Professional Institute (IPI)</li>
                    </ol>
                </p>
                <p class="text-justify"><i>*untuk teknis pendaftaran dan booking quota bisa hubungi admin kami, Bpk. Irwansyah di nomor : 081381590019 (WA).</i></p>
                <p class="text-left">PROGRAM PSC :
                    <ol class="text-left pl-3">
                        <li>SKOR - Speedy Korean Revolution :
                            <ul>
                               <li class="text-justify">Siswa/Siswi dapat berbicara Bahasa Korea melalui kegiatan menyenangkan (K-drama dan K-Pop).</li> 
                            </ul>
                        </li>
                        <li>IEL - IPI E-Sport Legion :
                            <ul>
                               <li class="text-justify">Bagi siswa/siswi mempunyai hobi bermain game online, maka kami menyediakan secara khusus forum pengembangan E-Sport Professional.</li> 
                            </ul>
                        </li>
                        <li>SPIDER - Speedy English Revolution :
                            <ul>
                               <li class="text-justify">Siswa/Siswi dapat berbicara bahasa inggris secara cepat dan menyenangkan (film dan musik).</li> 
                            </ul>
                        </li>
                        <li>HCI - Hotel and Cruise Ship Information :
                            <ul>
                               <li class="text-justify">Siswa/Siswi akan mendapatkan informasi aktual terkait jenjang karir di Hotel *5 dan Kapal Pesiar dengan gaji <b>Rp.5.000.000 - Rp.25.000.000</b>/bulan.</li> 
                            </ul>
                        </li>
                    </ol>
                </p>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <a target="_blank" class="btn btn-block btn-dark btn-rounded" disabled>Sedang Nonaktif</a>
                </div>
            </div>
        </div>
    </div>
    <!-- END : CARD -->
@endsection

@section('js_addon')
@endsection