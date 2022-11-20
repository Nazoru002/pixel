@extends('admin.master_dashboard')
@section('title',"Tambah data Sekolah")
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
            <div class="card-body">
              <form action="{{route('admin-sekolah-create')}}" method="POST">
                @csrf
                 <div class="form-group md-form">
                    <input type="text"class="form-control" name="nama_sekolah" id="name" required>
                    <label for="name">Nama Sekolah</label>
                </div>
                 <div class="form-group md-form">
                    <input type="text"class="form-control" name="kode_sekolah" id="name3" required>
                    <label for="name3">Kode Sekolah</label>
                </div>
                 <div class="form-group md-form">
                    <input type="text"class="form-control" name="nama_user" id="name2" required>
                    <label for="name2">Nama Guru BK</label>
                </div>
                <div class="form-group md-form">
                    <input type="text"class="form-control" name="username" id="usn" required>
                    <label for="usn">Username Guru BK</label>
                </div>
                <div class="form-group md-form">
                    <input type="text"class="form-control" name="password" id="pwd" required>
                    <label for="pwd">Password Guru BK</label>
                </div>
                <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                <a href="{{route('admin-sekolah')}}" class="btn btn-rounded btn-danger">Kembali</a>
              </form>
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

  </script>

@endsection
