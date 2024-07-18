@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <div class="card">
        <div class="card-title card-body">
            <h2 class='mt-3 text-black'>Form Edit User</h2>
        </div>
    </div>
</div>

<section class="section">

    <!-- row -->

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <h6 class="mb-3 mt-3" style='color:red;'>(*) Data wajib diisi</h6>

                    @foreach($users as $p)
                    <form action="/admin/user/update" method="POST" id="form-submit">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $p->user_id }}">

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
                            <button class="btn btn-primary" type="submit" onclick="alertSubmit()">Submit</button>
                            &nbsp;&nbsp;
                            <a href="/admin/user" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>


<script>
    function alertSubmit() {
        document.getElementById('form-submit').addEventListener('submit', function(event) {
            event.preventDefault();
            // Jika semua validasi berhasil, lanjutkan submit form

            if (document.getElementById('form-submit').checkValidity()) {
                Swal.fire({
                    title: "Konfirmasi",
                    text: "Apakah Anda yakin ingin menyimpan data ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya",
                    cancelButtonText: "Batal",
                    dangerMode: true,
                }).then((confirm) => {
                    if (confirm.isConfirmed) {
                        document.getElementById('form-submit').submit();
                    }
                });
            } else {
                // Menampilkan pesan error jika validasi form gagal
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Harap lengkapi semua kolom yang diperlukan!',
                });
            }
        });
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


@if(Session::has('errors'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire("Warning", "{{ Session::get('errors') }}", "warning");
    });
</script>
@endif

@endsection