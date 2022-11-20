@extends('bk.master')
@section('title',"Tambah data Siswa")
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
                <h4>Isian Data Tunggal</h4>
              <form action="{{route('bk-siswa-create')}}" method="POST">
                @csrf
                 <div class="form-group md-form">
                    <input type="text"class="form-control" name="nama_user" id="name" required>
                    <label for="name">Nama Siswa</label>
                </div>
                <div class="form-group md-form">
                    <input type="text"class="form-control" name="username" id="usn" required>
                    <label for="usn">Username </label>
                </div>
                <div class="form-group md-form">
                    <input type="text"class="form-control" name="password" id="pwd" required>
                    <label for="pwd">Password </label>
                </div>
                <input type="hidden" name="id_sekolah" value="{{session()->get('id_sekolah')}}">
                <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                <a href="{{route('bk-siswa')}}" class="btn btn-rounded btn-danger">Kembali</a>
              </form>
              <hr>
              <h4>Import Dari Excel</h4>
              <form action="{{route('bk-siswa-import')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                      </div>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="file"
                          aria-describedby="inputGroupFileAddon01" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                        <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>
                      </div>
                    </div>
                  <button type="submit" class="btn btn-primary btn-rounded">Import</button>
              </form>
              <p class="float-right mt-3"><i>Download format-nya </i><a href="{{asset('files/format-import-admin.xlsx')}}">disini</a></p>
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
