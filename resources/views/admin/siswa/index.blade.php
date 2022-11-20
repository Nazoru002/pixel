@extends('admin.master_dashboard')
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
                <div class="row">
                    <div class="col mb-1"><a href="{{route('admin-siswa-create')}}" class="btn btn-rounded btn-primary btn-block">Tambah Data Siswa</a></div>
                    <div class="col mb-1"><a href="{{route('admin-siswa-export')}}" class="btn btn-info btn-rounded btn-block">Export Biodata Siswa</a></div>
                    <div class="col mb-1"><a href="{{route('admin-siswa-export2')}}" class="btn btn-success btn-rounded btn-block">Export Username Siswa</a></div>
                    <div class="col mb-1"><a href="{{route('admin-hasilTes-export')}}" class="btn btn-rounded btn-warning mr-3 btn-block">Export Hasil Tes Siswa</a></div>
                </div>
              @php
                use App\User;
                $data = User::where('level','siswa')->orderBy('updated_at','DESC')->with('rsekolah')->paginate(40);
              @endphp
              <table id="data_siswa" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Siswa</th>
                    <th>Asal Sekolah</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($data as $d)
                    <tr>
                      <td>{{$d->id}}</td>
                      <td>{{$d->nama_user}}</td>
                      <td>{{$d->rsekolah->nama_sekolah}}</td>
                      <td><a href="{{route('admin-siswa-detail',$d->id)}}" class="btn btn-rounded btn-primary mr-3">Lihat Detail</a><a href="{{route('admin-siswa-edit',$d->id)}}" class="btn btn-rounded btn-warning mr-3">Edit</a><button href="#" class="btn btn-rounded btn-danger btn-delete" data-url="{{route('admin-siswa-delete',$d->id)}}">Hapus</button></td>
                    </tr>
                  @empty
                    <tr>
                      <th> Tidak ada data</th>
                      <th> Tidak ada data</th>
                      <th> Tidak ada data</th>
                    </tr>
                  @endforelse
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
