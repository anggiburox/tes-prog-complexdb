@extends('layout.users')

@section('content')
<div class="pagetitle">
    <div class="card">
        <div class="card-title card-body">
            <h2 class='mt-3 text-black'>Perbaharui Data Users</h2>
        </div>
    </div>
</div>


@if(Session::has('errors'))
<div class="alert alert-danger">
    {{Session::get('errors')}}
</div>
@endif
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<div class="col-xl-12 col-xxl-12">

    <div class="card">
        <div class="card-body">

            <h6 class="mb-5 mt-3" style='color:red;'>(*) Data wajib diisi</h6>
            <!-- Custom Styled Validation -->

            @foreach($pgw as $p)
            <form class="row g-3 needs-validation" id="form-perbaharui" action="/users/profile/editprofile" method="POST">
                {{ csrf_field() }}
                <input type='hidden' name='user_id' value='{{$p->user_id}}'>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Name <label style='color:red;'>(*)</label> </label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" required value="{{ $p->name }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Email <label style='color:red;'>(*)</label> </label>
                    <div class="col-sm-10">
                        <input type="email" name="email" required class="form-control" id="email" value="{{ $p->email }}">
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Password <label style='color:red;'>(*)</label> </label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name='password' required id="password" value="{{ $p->password }}">
                            <span class="input-group-text" onclick="showPassword()"><i class="bi bi-eye-fill"></i></span>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary" type="button" onclick="showConfirmation()">
                        Perbaharui</button>
                    &nbsp;&nbsp;
                    <a href="/users/user" class="btn btn-danger">Kembali</a>
                </div>
            </form><!-- End Custom Styled Validation -->
            @endforeach

        </div>
    </div>

</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function showConfirmation() {
        // Menjalankan validasi form sebelum menampilkan konfirmasi
        if (document.getElementById('form-perbaharui').checkValidity()) {
            swal({
                title: "Konfirmasi",
                text: "Apakah Anda yakin memperbaharui data ini?",
                icon: "warning",
                buttons: ["Batal", "Ya"],
                dangerMode: true,
            }).then((confirm) => {
                if (confirm) {
                    document.getElementById('form-perbaharui').submit();
                }
            });
        } else {
            // Menampilkan pesan error jika validasi form gagal
            swal({
                icon: 'error',
                title: 'Oops...',
                text: 'Harap lengkapi semua kolom yang diperlukan!',
            });
        }
    }

    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection