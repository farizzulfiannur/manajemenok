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
                            $imageProfile = $user->profiles->image;
                        @endphp
                        @if ($imageProfile)
                            <img src="{{ asset('profile/' . $imageProfile) }}" alt="Profile"
                                class="profile d-block m-auto">
                        @else
                            <img src="{{ asset('adminpnl/img2/avatar6.jpg') }}" alt="Profile"
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
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="{{ route('todo') }}">
                        <i class="fa fa-fw fa-check-circle"></i>
                        <span class="nav-link-text"> To-Do List </span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="{{ route('task') }}">
                        <i class="fa fa-fw fa-tasks"></i>
                        <span class="nav-link-text"> Task List </span>
                    </a>
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
            <!-- Breadcrumbs-->
            <form action="{{ route('updateNotes', [$note->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box_general padding_bottom box_custom" style="height: 86vh;">
                    <a href="{{ route('homePM') }}" class="back_box_custom "> X </a>
                    <ol class="breadcrumb judul_box_custom">
                        <li class="breadcrumb-item" style="padding-left: 11px">
                            <h3 style="border-left: 5px solid #9c0aaf; display: inline"></h3>
                            <h3 style="color: white !important; padding-top: 3px; padding-left: 8px; display: inline">
                                Edit Note </h3>
                        </li>
                    </ol>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="color: white !important; padding-left: 10px; font-size: 16px"> Title
                                </label>
                                <input type="text" class="form-control"
                                    style="background: #26282F; border-radius: 40px; color: white; border:none; padding-left: 20px"
                                    name="title" value="{{ $note->title }}">
                            </div>
                            <div class="form-group">
                                <label style="color: white !important; padding-left: 10px; font-size: 16px"> Contents
                                </label>
                                <textarea type="text" class="form-control"
                                    style="background: #26282F; border-radius: 20px; color: white; border:none; padding-left: 20px" rows="9"
                                    name="desc"> {{ $note->desc }} </textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn_1 btn_2 medium float-right"> Edit </button>
                </div>
            </form>
        </div>
        <!-- /.container-fluid-->
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
