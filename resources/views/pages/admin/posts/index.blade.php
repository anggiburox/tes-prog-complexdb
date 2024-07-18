@extends('layout.admin')

@section('content')
<div class="pagetitle">
    <div class="card">
        <div class="card-title card-body">
            <h2 class='mt-3 text-black'>Data Posts</h2>
        </div>
    </div>
</div>

<section class="section">

    <!-- row -->

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/admin/posts/tambah" class="btn btn-primary">Tambah Post</a></a>
                    </h5>

                    <!-- Table with stripped rows -->
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($posts as $u)
                                <?php $no++; ?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{ $u->title }}</td>
                                    <td>{{ $u->body }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->created_at }}</td>
                                    <td>{{ $u->updated_at }}</td>
                                    <td>
                                        <a href="posts/edit/{{ $u->id }}" data-toggle="tooltip" data-placement="top" title="Perbaharui" class="btn mb-1 btn-warning btn-sm" type="button"><i class="ri-edit-box-line"></i></a>
                                        <a href="posts/detail/{{ $u->id }}" data-toggle="tooltip" data-placement="top" title="Detail" class="btn mb-1 btn-success btn-sm" type="button"><i class="ri-eye-line"></i></a>
                                        <a href="posts/hapusdata/{{ $u->id}}" data-id="{{ $u->id }}" class="delete btn mb-1 btn-danger btn-sm" onclick="showConfirmation(event)" data-toggle="tooltip" data-placement="top" title="Hapus" type="button"><i class="bi bi-trash-fill"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>


<script>
    function showConfirmation(event) {
        event.preventDefault();
        var deleteLink = event.currentTarget.getAttribute('href');
        var humasId = event.currentTarget.getAttribute('data-id');
        deleteLink = deleteLink.replace(':id', humasId);

        Swal.fire({
            title: "Konfirmasi",
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: "Batal",
            dangerMode: true,
            html: "Apakah Anda yakin ingin <b>Hapus</b> ?",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = deleteLink;
            }
        });
    }
</script>


<!-- simpan -->
@if(Session::has('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire("Sukses", "{{ Session::get('success') }}", "success");
    });
</script>
@endif

<!-- hapus -->
@if(Session::has('danger'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire("Sukses", "{{ Session::get('danger') }}", "success");
    });
</script>
@endif

@endsection