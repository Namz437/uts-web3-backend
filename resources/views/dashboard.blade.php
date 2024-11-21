<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Kontrakan</title>

    <!-- Feather Icons & ApexCharts -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Shortcut icon -->
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/takumi.png">

    <!-- Stylesheets -->
    <link href="../../../../../css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">
</head>

<body>
    <!-- BEGIN: Header-->
    @include('layouts.header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('layouts.sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row"></div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">

                        <!-- Card Statistics -->
                        <div class="col-xl-8 col-md-12 col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <h4 class="card-title">Statistics Sewa Kontrakan</h4>
                                    <div class="d-flex align-items-center">
                                        <p class="card-text font-small-2 me-25 mb-0">Update</p>
                                    </div>
                                </div>
                                <div class="card-body statistics-body">
                                    <div class="row">
                                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-column align-items-center"
                                                style="margin-top: 10px;">
                                                <!-- Centered alignment -->
                                                <div class="avatar bg-light-primary mb-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <!-- Centering text -->
                                                    <h4 class="fw-bolder mb-0">{{ $totalKontrakan }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Kontrakan</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                                            <div class="d-flex flex-column align-items-center"
                                                style="margin-top: 10px;">
                                                <div class="avatar bg-light-info mb-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="user" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <h4 class="fw-bolder mb-0">{{ $totalUser }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Users</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 col-12">
                                            <div class="d-flex flex-column align-items-center"
                                                style="margin-top: 10px;">
                                                <div class="avatar bg-light-danger mb-1">
                                                    <div class="avatar-content">
                                                        <i data-feather="box" class="avatar-icon"></i>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <h4 class="fw-bolder mb-0">{{ $totalPesanan }}</h4>
                                                    <p class="card-text font-small-3 mb-0">Pesanan</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Card Statistics -->

                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->
            </div>
        </div>
    </div>


    <!-- BEGIN: Footer-->
    @include('layouts.footer')
    <!-- END: Footer-->

</body>

</html>
