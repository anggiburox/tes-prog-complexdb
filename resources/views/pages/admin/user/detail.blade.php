@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <div class="card">
        <div class="card-title card-body">
            <h2 class='mt-3 text-black'>Form Detail User</h2>
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
                            <a href="/admin/user" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
<script>
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