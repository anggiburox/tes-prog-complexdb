@extends('layout.auth')

@section('login')

<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="row">
                            <!-- New row for image and login form -->
                            <div class="col-md-12">
                                <img src="{{asset('assets/logo/logo.png') }}" alt="" height="100">
                            </div>
                        </div>

                        <div class="card mb-3 mt-3" id='login-form'>
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                </div>
                                @if (Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                @endif
                                <form class="row g-3" action='login' method="post">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0"><a href="#" id="signup-link">Forgot Password ? </a></p>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card mb-3" id='register-form' style="display: none;">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Forgot Your Account</h5>
                                </div>
                                @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{Session::get('success')}}
                                </div>
                                @endif


                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class='alert alert-warning alert-dismissible fade show'>
                                    Email harus terdaftar terlebih dahulu
                                </div>
                                <form class="row g-3 needs-validation" method="POST" action='/auth/updatelupapassword' id='forgot-form' novalidate>
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit" onclick="form_submit()">Submit</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">
                                        <p>Already have an account ?
                                            <a class="text-primary" href="#" id="login-link">Sign in
                                            </a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main><!-- End #main -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>

<script>
    // Ambil elemen-elemen yang diperlukan
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');
    const loginLink = document.getElementById('login-link');
    const signupLink = document.getElementById('signup-link');

    // Atur tindakan ketika tombol "Sign in" diklik
    loginLink.addEventListener('click', function(event) {
        event.preventDefault();
        loginForm.style.display = 'block';
        registerForm.style.display = 'none';
    });

    // Atur tindakan ketika tombol "Sign up" diklik
    signupLink.addEventListener('click', function(event) {
        event.preventDefault();
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
    });


    /////////////////loginregis///////////////////////
    // Periksa apakah ada data register dalam session
    const forgotpasswordFlag = '{{ session("register-form") }}';

    // Atur tampilan form berdasarkan flag register
    if (forgotpasswordFlag) {
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
    }

    document.getElementById('forgot-form').addEventListener('submit', function(event) {
        event.preventDefault();
        if (this.checkValidity()) {
            Swal.fire({
                title: "Konfirmasi",
                text: "Apakah Anda yakin ingin memperbarui data ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Batal",
                dangerMode: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('forgot-form').submit();
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Harap lengkapi semua kolom yang diperlukan!',
            });
        }
    });
</script>


@endsection