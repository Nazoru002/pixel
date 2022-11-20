@extends('admin.master_dashboard')
@section('title','Data Sekolah')
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
              <a href="{{route('admin-sekolah-create')}}" class="btn btn-rounded btn-primary">Tambah Data Sekolah</a>
              @php
                use App\Sekolah;
                use App\User;
                use App\DetailSiswa;
                use App\HasilTes;
                $data = Sekolah::with('rsiswaAll')->paginate(10);
              @endphp
              <table id="data_sekolah" class="table table-striped table-bordered table-responsive-md" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Sekolah</th>
                    <th>Jumlah Siswa</th>
                    <th>Jumlah Biodata</th>
                    <th>Jumlah Selesai Tes</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($data as $d)
                    @php
                        $siswa = User::where('level','siswa')->where('id_sekolah',$d->id)->pluck('id')->toArray();
                        $count = 0;
                        foreach($d->rsiswaAll as $s){
                          $counter = HasilTes::where('id_user',$s->id)->count();
                          if($counter >= 5){
                            $count++;
                          }
                        }
                        $detsis = DetailSiswa::whereIn('id_user', $siswa)->whereNotNull('nama')->count();
                    @endphp
                    <tr>
                      <td>{{$d->id}}</td>
                      <td>{{$d->nama_sekolah}}</td>
                      <td>{{$d->rsiswaAll()->count()}}</td>
                      <td>{{$detsis}}</td>
                      <td>{{$count}}</td>
                      <td><a href="{{route('admin-sekolah-detail',$d->id)}}" class="btn btn-rounded btn-primary mr-3">Lihat Grafik</a><a href="{{route('admin-sekolah-edit',$d->id)}}" class="btn btn-rounded btn-warning mr-3">Edit</a><button href="#" class="btn btn-rounded btn-danger btn-delete" data-url="{{route('admin-sekolah-delete',$d->id)}}">Hapus</button></td>
                    </tr>
                  @empty
                    <tr>
                      <th> Tidak ada data</th>
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
          text: "Semua data yang terkait dengan sekolah ini akan ikut terhapus!",
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
