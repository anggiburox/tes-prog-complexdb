@extends('layout.users')

@section('content')
<div class="pagetitle">
    <div class="card">
        <div class="card-title card-body">
            <h2 class='mt-3 text-black'>Form Tambah Posts</h2>
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

                    <form action="/users/posts/storeweb" method="POST" id="form-submitTambah">
                        @csrf

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Title <label style='color:red;'>(*)</label></label>
                            <div class="col-sm-10">
                                <input type="text" name="title" required class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Body <label style='color:red;'>(*)</label></label>
                            <div class="col-sm-10">
                                <textarea name="body" id="" required class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name <label style='color:red;'>(*)</label></label>
                            <div class="col-sm-10">
                                <input type="hidden" name="user_id" required class="form-control" value="{{session('user_id')}}" readonly required style="background-color: #e6e6fa;">
                                <input type="text" name="" required class="form-control" value="{{session('name')}}" readonly required style="background-color: #e6e6fa;">
                                <!-- <select name='user_id' required class="form-control" id="select_user_id"> -->
                                <!-- <option value="">-- Pilih Data --</option> -->
                                <!-- @foreach ($users as $u) -->
                                <!-- <option value="{{ $u->user_id }}" {{$currentUser->user_id == $u->user_id ? 'selected' : ''}}> -->
                                <!-- {{ $u->name }} -->
                                <!-- </option> -->
                                <!-- @endforeach -->
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary" type="button" onclick="alertSubmit()">Submit</button>
                            &nbsp;&nbsp;
                            <a href="/users/posts" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#select_user_id').select2({});
    })

    function alertSubmit() {
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin mengisi data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            dangerMode: true,
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-submitTambah').submit();
            }
        });
    }
</script>

@endsection