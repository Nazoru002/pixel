@extends('admin.master_dashboard')
@section('title',"Edit data Siswa")
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
              <form action="{{route('admin-siswa-edit',$data->id)}}" method="POST">
                @csrf
                 <div class="form-group md-form">
                    <input type="text"class="form-control" name="nama_user" id="name" required value="{{$data->nama_user}}">
                    <label for="name">Nama Siswa</label>
                </div>
                <div class="form-group text-left" style="position: relative;">
                  <label for="as">Asal Sekolah</label>
                  <select id="as" class="custom-select" name="id_sekolah">
                    @php
                      use App\Sekolah;
                      $sekolah = Sekolah::all();
                    @endphp
                    @foreach($sekolah as $s)
                      <option value="{{$s->id}}" {{($data->id_sekolah == $s->id)?'selected':''}}>{{$s->nama_sekolah}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group md-form">
                    <input type="text"class="form-control" name="username" id="usn" required value="{{$data->username}}">
                    <label for="usn">Username </label>
                </div>
                <div class="form-group md-form">
                    <input type="text"class="form-control" name="password" id="pwd" required value="{{$data->display_password}}">
                    <label for="pwd">Password </label>
                </div>
                <button type="submit" class="btn btn-rounded btn-primary">Simpan</button>
                <a href="{{route('admin-siswa')}}" class="btn btn-rounded btn-danger">Kembali</a>
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
