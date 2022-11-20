@extends('admin.master_dashboard')
@section('title',"Pengaturan")
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
            @if ($errors->any())
                <div class="alert alert-danger text-left">
                    <b>Terdapat Error pada pengisian formulir : </b>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <h4 class="text-left">Ganti Password</h4>
                <form action="{{route('admin-settings')}}" method="POST">
                    @csrf
                    <div class="md-form input-with-post-icon">
                        <input type="password" id="password" class="form-control" name="password_lama" required>
                        <label for="password">Password Lama</label>
                        <!-- <small class="form-text text-muted">Masukan kode sekolah dikolom ini</small> -->
                    </div>
                    <div class="md-form input-with-post-icon">
                        <input type="password" id="password" class="form-control" name="password_baru" required>
                        <label for="password">Password Baru</label>
                        <!-- <small class="form-text text-muted">Masukan kode sekolah dikolom ini</small> -->
                    </div>
                    <div class="md-form input-with-post-icon">
                        <input type="password" id="password" class="form-control" name="konfirmasi_password_baru" required>
                        <label for="password">Konfirmasi Password Baru</label>
                        <!-- <small class="form-text text-muted">Masukan kode sekolah dikolom ini</small> -->
                    </div>
                    <button type="submit" class="btn btn-primary btn-rounded waves-effect waves-light btn-block">Rubah</button>
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
