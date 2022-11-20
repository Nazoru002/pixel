@extends('users.layouts.master')
@section('content')
<div class="text-center mb-4">
    <!--<h1 class="page-title">PIXEL</h1>-->
    <img src="{{asset('images/Logo Piccel.png')}}" class="logo logo-stroke">
</div>
<div class="card panel p-3">
    <form action="{{route('siswa-biodata-edit')}}" method="POST">
    @csrf
        <div class="card-body">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    <b>Sukses:</b> {{session()->get('success')}}
                </div>
            @endif
            @php
                use App\DetailSiswa;
                $biodata = DetailSiswa::where('id_user',Auth::user()->id)->first();
            @endphp
            <h5 class="text-center">Biodata Diri</h5>
            <ul class="list-group list-group-flush text-left">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-3"><b>Nama Siswa </b> <a href="" class="ml-2 edit-biodata" onclick="editBio('{{implode(explode(' ', $biodata->nama),'-')}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{implode(explode(' ', $biodata->nama),'-')}}">
                            <div class="d-none input-group"> : &nbsp;<input type="text" class="form-control" name="nama" value="{{$biodata->nama}}">
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->nama}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item"><div class="row"><div class="col-3"><b>Lembaga Sekolah </b></div><div class="col-9"> : {{$biodata->lembaga_sekolah}}</div></div></li>
                <li class="list-group-item"><div class="row"><div class="col-3"><b>Kelas </b></div><div class="col-9"> : {{$biodata->kelas}}</div></div></li>
                <li class="list-group-item"><div class="row"><div class="col-3"><b>Jurusan </b></div><div class="col-9"> : {{$biodata->jurusan}}</div></div></li>
                <li class="list-group-item"><div class="row"><div class="col-3"><b>Sub Jurusan </b></div><div class="col-9"> : {{$biodata->jurusan}}-{{$biodata->sub_jurusan}}</div></div></li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-3"><b>Jenis Kelamin </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{$biodata->jenis_kelamin}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{$biodata->jenis_kelamin}}">
                            <div class="d-none input-group text-left m-0" style="position: relative;">
                                 : &nbsp;<select class="custom-select" name="jenis_kelamin">
                                    <option value="Laki-Laki" {{(($biodata->jenis_kelamin == 'Laki-Laki')?'selected':'')}}>Laki-Laki</option>
                                    <option value="Perempuan" {{(($biodata->jenis_kelamin == 'Perempuan')?'selected':'')}}>Perempuan</option>
                                </select>
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->jenis_kelamin}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-3"><b>Tanggal Lahir </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{$biodata->tgl_lahir}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{$biodata->tgl_lahir}}">
                            <div class="d-none input-group m-0">
                                 : &nbsp;<input type="date"class="form-control" name="tgl_lahir" value="{{$biodata->tgl_lahir}}">
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->tgl_lahir}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-3"><b>Cita Cita </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{implode(explode(' ', $biodata->cita_cita),'-')}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{implode(explode(' ', $biodata->cita_cita),'-')}}">
                            @php
                                $ctct = [
                                    'Pegawai Kantoran',
                                    'Programmer',
                                    'Jalan-Jalan Keliling Dunia',
                                    'Photographer',
                                    'Staf Hotel',
                                    'Crew Kapal Pesiar',
                                    'Chef Restoran/Hotel',
                                    'Pemandu Wisata',
                                    'Atlit Esport',
                                    'Desain grafis/ilustrator/animator',
                                    'Ahli IT/Komputer',
                                    'Barista',
                                    'Pramugari/Pramugara'
                                ];
                            @endphp
                            <div class="d-none input-group text-left m-0" style="position: relative;">
                                 : &nbsp;<select id="ct" class="custom-select" name="cita_cita">
                                    @foreach($ctct as $ct)
                                        <option value="{{$ct}}" {{(($biodata->cita_cita == $ct)?'selected':'')}}>{{$ct}}</option>
                                    @endforeach
                                    
                                    <option value="other">Lainnya... Sebutkan :</option>
                                </select>
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->cita_cita}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-3"><b>Minat Melanjutkan </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{$biodata->minat_melanjutkan}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{$biodata->minat_melanjutkan}}">
                            <div class="d-none input-group text-left m-0" style="position: relative;">
                                 : &nbsp;<select class="custom-select" name="minat_melanjutkan">
                                    <option value="Kuliah" {{(($biodata->minat_melanjutkan == 'Kuliah')?'selected':'')}}>Kuliah</option>
                                    <option value="Kerja" {{(($biodata->minat_melanjutkan == 'Kerja')?'selected':'')}}>Kerja</option>
                                    <option value="Wirausaha" {{(($biodata->minat_melanjutkan == 'Wirausaha')?'selected':'')}}>Wirausaha</option>
                                </select>
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->minat_melanjutkan}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-3"><b>Hobi </b><a href="" class="edit-biodata" onclick="editBio('{{implode(explode(' ', $biodata->hobi),'-')}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{implode(explode(' ', $biodata->hobi),'-')}}">
                            @php
                                $hobi = [
                                    'Musik (K-Pop)',
                                    'Olah Raga',
                                    'Esport (Game Online)',
                                    'Youtuber',
                                    'English Club',
                                    'Music',
                                    'Nonton Film (Drakor)',
                                    'Photographer',
                                    'Menggambar'
                                ];
                            @endphp
                            <div class="d-none m-0 input-group text-left" style="position: relative;">
                                 : &nbsp;<select id="hb" class="custom-select" name="hobi">
                                    @foreach($hobi as $hb)
                                        <option value="{{$hb}}" {{(($biodata->hobi == $hb)?'selected':'')}}>{{$hb}}</option>
                                    @endforeach
                                    <option value="other">Lainnya... Sebutkan:</option>
                                </select>
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->hobi}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-3"><b>Nomor HP </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{$biodata->no_telp}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{$biodata->no_telp}}">
                            <div class=" d-none input-group"> : &nbsp;<input type="number" class="form-control" name="no_telp" value="{{$biodata->no_telp}}">
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->no_telp}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        @php
                            if(!$biodata->email){
                                $getemail = 'email';
                            }else{
                                $getemail = implode(explode('.', implode(explode('@', $biodata->email),'-')),'-');
                            }
                        @endphp
                        <div class="col-3"><b>Email </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{$getemail}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{$getemail}}">
                            <div class="d-none input-group"> : &nbsp;<input type="email" class="form-control" name="email" value="{{$biodata->email}}">
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->email}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        @php
                            if(!$biodata->facebook){
                                $getfacebook = 'facebook';
                            }
                        @endphp
                        <div class="col-3"><b>Akun Facebook </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{$getfacebook ?? ''}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{$getfacebook ?? ''}}">
                            <div class="d-none input-group"> : &nbsp;<input type="text" class="form-control" name="facebook" value="{{$biodata->facebook}}">
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->facebook}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        @php
                            if(!$biodata->instagram){
                                $getinstagram = 'instagram';
                            }
                        @endphp
                        <div class="col-3"><b>Akun Instagram </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{$getinstagram}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{$getinstagram}}">
                            <div class="d-none input-group"> : &nbsp;<input type="text" class="form-control" name="instagram" value="{{$biodata->instagram}}">
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->instagram}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        @php
                            if(!$biodata->youtube){
                                $getyoutube = 'youtube';
                            }
                        @endphp
                        <div class="col-3"><b>Akun Youtube </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{$getyoutube}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{$getyoutube}}">
                            <div class="d-none input-group"> : &nbsp;<input type="text" class="form-control" name="youtube" value="{{$biodata->youtube}}">
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->youtube}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-3"><b>Kelebihan Diri </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{$biodata->strength}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{$biodata->strength}}">
                            <div class="d-none input-group"> : &nbsp;<input type="text" class="form-control" name="strength" value="{{$biodata->strength}}">
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->strength}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-3"><b>Kekurangan Diri </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{$biodata->weakness}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{$biodata->weakness}}">
                            <div class="d-none input-group"> : &nbsp;<input type="text" class="form-control" name="weakness" value="{{$biodata->weakness}}">
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->weakness}}</p>
                        </div>
                    </div>
                </li>
            </ul>
            <h5 class="text-center mt-5">Biodata Orang Tua</h5>
            <ul class="list-group list-group-flush text-left">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-3"><b>Nama Ayah </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{implode(explode(' ', $biodata->nama_ayah),'-')}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{implode(explode(' ', $biodata->nama_ayah),'-')}}">
                            <div class="d-none input-group"> : &nbsp;<input type="text" class="form-control" name="nama_ayah" value="{{$biodata->nama_ayah}}">
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->nama_ayah}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-3"><b>Nomor HP Ayah </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{$biodata->hp_ayah}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{$biodata->hp_ayah}}">
                            <div class="d-none input-group"> : &nbsp;<input type="number" class="form-control" name="hp_ayah" value="{{$biodata->hp_ayah}}">
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->hp_ayah}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        @php
                            $dadjob = [
                                'Pegawai Negeri/TNI/POLRI/BUMN/BUMD',
                                'Pegawai Swasta',
                                'Wiraswasta/Pengusaha/Pedagang'
                            ];
                            
                            if(!$biodata->job_ayah){
                                $getjob_ayah = 'job_ayah';
                            }else{
                                $getjob_ayah = implode(explode('/', implode(explode(' ', $biodata->job_ayah),'-')),'-');
                            }
                        @endphp
                        <div class="col-3"><b>Pekerjaan Ayah </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{$getjob_ayah}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{$getjob_ayah}}">
                            <div class="d-none input-group text-left" style="position: relative;">
                                 : &nbsp;<select class="custom-select" name="job_ayah">
                                    @foreach($dadjob as $dj)
                                    <option value="{{$dj}}" {{(($biodata->job_ayah == $dj)?'selected':'')}}>{{$dj}}</option>
                                    @endforeach
                                    <option value="other">Lainnya... Sebutkan:</option>
                                </select>
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->job_ayah}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-3"><b>Nama Ibu </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{implode(explode(' ', $biodata->nama_ibu),'-')}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{implode(explode(' ', $biodata->nama_ibu),'-')}}">
                            <div class="d-none input-group"> : &nbsp;<input type="text" class="form-control" name="nama_ibu" value="{{$biodata->nama_ibu}}">
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->nama_ibu}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-3"><b>Nomor HP Ibu </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{$biodata->hp_ibu}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{$biodata->hp_ibu}}">
                            <div class="d-none input-group"> : &nbsp;<input type="number" class="form-control" name="hp_ibu" value="{{$biodata->hp_ibu}}">
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->hp_ibu}}</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        @php
                            $momjob = [
                                'Ibu Rumah Tangga',
                                'Pegawai Negeri/TNI/POLRI/BUMN/BUMD',
                                'Pegawai Swasta',
                                'Wiraswasta/Pengusaha/Pedagang'
                            ];
                            
                            if(!$biodata->job_ibu){
                                $getjob_ibu = 'job_ibu';
                            }else{
                                $getjob_ibu = implode(explode('/', implode(explode(' ', $biodata->job_ibu),'-')),'-');
                            }
                        @endphp
                        <div class="col-3"><b>Pekerjaan Ibu </b><a href="" class="ml-2 edit-biodata" onclick="editBio('{{$getjob_ibu}}')"><i class="fas fa-edit"></i></a></div>
                        <div class="col-9 biodata get-{{$getjob_ibu}}">
                            <div class="d-none input-group text-left" style="position: relative;">
                                 : &nbsp;<select class="custom-select" name="job_ibu">
                                    @foreach($momjob as $mj)
                                    <option value="{{$mj}}" {{(($biodata->job_ibu == $mj)?'selected':'')}}>{{$mj}}</option>
                                    @endforeach
                                    <option value="other">Lainnya... Sebutkan:</option>
                                </select>
                                <button class="btn btn-md btn-primary m-0 px-3" type="submit">edit</button>
                            </div>
                            <p class="m-0"> : {{$biodata->job_ibu}}</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </form>
</div>
@endsection
@section('js_addon')
<script type="text/javascript">
    $(document).ready(function(){
        $(".edit-biodata").on("click", function(e){
           e.preventDefault(); 
        });
    });
    
    function editBio(edit_bio_ret){
        $('.biodata.get-'+edit_bio_ret+" div").toggleClass('d-none');
        $('.biodata.get-'+edit_bio_ret+" p").toggleClass('d-none');
    }
</script>
@endsection