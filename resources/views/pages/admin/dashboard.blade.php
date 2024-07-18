@extends('layout.admin')

@section('content')
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card rounded" style='background-image: linear-gradient(to right top,#ba75e3,#6f80dc);'>
                        <div class="card-body">
                            <h5 class="card-title text-white">Users
                                <hr>
                            </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person" style='color:#b575e2'></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class='text-white'>{{$users}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Sales Card -->


                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card rounded" style='background-image: linear-gradient(to right top,#537ec0,#5bbbea);'>

                        <div class="card-body">
                            <h5 class="card-title text-white">
                                Posts
                                <hr>
                            </h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-menu-button-wide" style='color:#5ab7e7'></i>
                                </div>
                                <div class="ps-3">
                                    <h6 class='text-white'>{{$posts}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Revenue Card -->

            </div>
            <!-- End Left side columns -->
        </div>
    </div>
</section>
@endsection