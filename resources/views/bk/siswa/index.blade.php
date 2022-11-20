@extends('bk.master')
@section('title','Data Siswa')
@section('content')

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">
            @if(session()->has('error'))
              <div class="alert alert-danger" role="alert">
                <b>Error :</b> {{session()->get('error')}}
              </div>
            @endif
            @if(session()->has('success'))
              <div class="alert alert-success" role="alert">
                <b>Sukses :</b> {{session()->get('success')}}
              </div>
            @endif
            <!--Card content-->
            <div class="card-body">
              <a href="{{route('bk-siswa-create')}}" class="btn btn-rounded btn-primary">Tambah Data Siswa</a>
              <a href="{{route('bk-siswa-export')}}" class="btn btn-info btn-rounded">Export Biodata Siswa</a>
              <a href="{{route('bk-siswa-export2')}}" class="btn btn-success btn-rounded">Export Username Siswa</a>
              <a href="{{route('bk-hasilTes-export')}}" class="btn btn-rounded btn-warning mr-3">Export Hasil Tes Siswa</a>
              @php
                use App\User;
                use App\HasilTes;
                $data = User::where('id_sekolah',Auth::user()->id_sekolah)->where('level','siswa')->with('rdetsis')->paginate(10);
              @endphp
              <table id="data_siswa" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Biodata</th>
                    <th>Tes</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $d)
                    @php
                        $count = HasilTes::where('id_user',$d->id)->count();
                        $kelas = false;
                        if($d->rdetsis && $d->rdetsis->kelas != null && $d->rdetsis->kelas != ""){
                            $kelas=true;
                        }
                    @endphp
                    <tr>
                      <td>{{$d->id}}</td>
                      <td>{{$d->nama_user}}</td>
                      <td>{{($kelas)?substr($d->rdetsis->kelas,-2)."-".$d->rdetsis->jurusan." ".$d->rdetsis->sub_jurusan:'Biodata Belum'}}</td>
                      <td>{{$d->username}}</td>
                      <td>{{$d->display_password}}</td>
                      <td>{{($d->rdetsis)?'Sudah':'Belum'}}</td>
                      <td>{{($count >= 5)?'Sudah':'Belum'}}</td>
                      <td><a href="{{route('bk-siswa-detail',$d->id)}}" class="btn btn-rounded btn-primary mr-3">Lihat Detail</a><a href="{{route('bk-siswa-edit',$d->id)}}" class="btn btn-rounded btn-warning mr-3">Edit</a><button href="#" class="btn btn-rounded btn-danger btn-delete" data-url="{{route('bk-siswa-delete',$d->id)}}">Hapus</button></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-center">
                {{$data->onEachSide(0)->links()}}
              </div>
            </div>

          </div>
          <!--/.Card-->

        </div>

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
  </script>

@endsection
