<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>SiNotes - Admin Dashboard</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap core CSS-->
    <link href="{{ asset('adminpnl/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Main styles -->
    <link href="{{ asset('adminpnl/css/admin.css') }}" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="{{ asset('adminpnl/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Plugin styles -->
    <link href="{{ asset('adminpnl/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <!-- Your custom styles -->
    <link href="{{ asset('adminpnl/css/custom.css') }}" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
        <a class="navbar-brand" style="margin-top: 3px;" href="index.html"><img
                src="{{ asset('adminpnl/img2/SiNotes.png') }}" alt="" width="150" height="36"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <div class="mt-2 mb-2">
                        @php
                            use App\Models\profile;
                            $user = Auth::user()->id;
                            $profile = profile::where('user_id', $user)->get()->first();
                            // dd($profile);
                        @endphp
                        @if (!$profile->image)
                        <img src="{{ asset('adminpnl/img2/avatar6.jpg') }}" alt="Profile"
                                    class="profile d-block m-auto">
                        @else
                        <img src="{{ asset('profile/' . $profile->image) }}" alt="Profile"
                                    class="profile d-block m-auto">
                        @endif
                    </div>
                    <h3 class="namaprofile"> {{ Auth::user()->name }} </h3>
                    <a class="editprofile" href="{{ route('editprofilePM', [Auth::user()->id]) }}">
                        <p>Edit Profile</p>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="{{ route('homePM') }}">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents">
                        <i class="fa fa-fw fa-gear"></i>
                        <span class="nav-link-text">Components</span>
                    </a>
                    <ul class="sidenav-second-level collapse" id="collapseComponents">
                        <li>
                            <a href="charts.html">Charts</a>
                        </li>
                        <li>
                            <a href="tables.html">Tables</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <div class="nav-link text-center">
                        <p>SiNotes</p>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Greetings -->
            <div class="row greeting">
                <div class="col-12">
                    <h1>Welcome {{ Auth::user()->name }} </h1>
                </div>
                <div class="col-8">
                    {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut adipisci similique ullam error,
                        voluptate
                        cupiditate officiis, a dicta quibusdam eum asperiores, labore dignissimos quam minus quod nemo
                        necessitatibus
                        eius. Molestias.</p> --}}
                    <p class="mt-3"> Anda Login Sebagai Project Manager </p>
                </div>
            </div>
            <div class="saved">
                <div class="row">
                    <i class="fa fa-paperclip" style="color: white; margin-top: 4px;"> </i>
                    <div class="col-10">
                        <p> Saved notes </p>
                    </div>
                    <div class="col-1"><i class="fa fa-plus"></i></div>
                </div>
            </div>

            <div class="container square">
                <div class="row">
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card body-square">
                            <a href="">
                                <div class="card-body">
                                    <!-- <a href="">
                    <div class="d-flex justify-content-end"><i class="fa fa-close custom-close"></i></div>
                  </a> -->
                                    <h5 class="card-title mb-4 mt-3"
                                        style="color: white !important; text-align: center;">Special title treatment
                                    </h5>
                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card body-square">
                            <a href="">
                                <div class="card-body">
                                    <!-- <a href="">
                    <div class="d-flex justify-content-end"><i class="fa fa-close custom-close"></i></div>
                  </a> -->
                                    <h5 class="card-title mb-4 mt-3"
                                        style="color: white !important; text-align: center;">Special title treatment
                                    </h5>
                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card body-square">
                            <a href="">
                                <div class="card-body">
                                    <!-- <a href="">
                    <div class="d-flex justify-content-end"><i class="fa fa-close custom-close  "></i></div>
                  </a> -->
                                    <h5 class="card-title mb-4 mt-3"
                                        style="color: white !important; text-align: center;">Special title treatment
                                    </h5>
                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="card body-square">
                            <a href="">
                                <div class="card-body">
                                    <!-- <a href="">
                    <div class="d-flex justify-content-end"><i class="fa fa-close custom-close"></i></div>
                  </a> -->
                                    <h5 class="card-title mb-4 mt-3"
                                        style="color: white !important; text-align: center;">Special title treatment
                                    </h5>
                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div>

            </div>
            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Apakah anda yakin ingin logout</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-logout" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fa fa-angle-up"></i>
            </a>
            <!-- Logout Modal-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="#0">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="{{ asset('adminpnl/vendor/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('adminpnl/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
            <!-- Core plugin JavaScript-->
            <script src="{{ asset('adminpnl/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
            <!-- Page level plugin JavaScript-->
            <script src="{{ asset('adminpnl/vendor/chart.js/Chart.js') }}"></script>
            <script src="{{ asset('adminpnl/vendor/datatables/jquery.dataTables.js') }}"></script>
            <script src="{{ asset('adminpnl/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
            <script src="{{ asset('adminpnl/vendor/jquery.magnific-popup.min.js') }}"></script>
            <!-- Custom scripts for all pages-->
            <script src="{{ asset('adminpnl/js/admin.js') }}"></script>
            <!-- Custom scripts for this page-->
            <script src="{{ asset('adminpnl/js/admin-charts.js') }}"></script>

</body>

</html>
