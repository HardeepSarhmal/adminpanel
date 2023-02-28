<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <!-- Main Sidebar Container -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>User Table</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home">Home</a></li>
                                <li class="breadcrumb-item active">Admin Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section>
                <div class="container rounded bg-white mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-3 border-right">
                            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img
                                    class="rounded-circle mt-5" width="150px"
                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                                    class="font-weight-bold">Edogaru</span><span
                                    class="text-black-50">edogaru@mail.com.my</span><span>
                                </span></div>
                        </div>
                        <div class="col-md-5 border-right">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="text-right">Profile Settings</h4>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6"><label class="labels">Name</label><input type="text"
                                            class="form-control" name="name" value=""></div>
                                    <div class="col-md-6"><label class="labels">Surname</label><input type="text"
                                            class="form-control" value="" placeholder="surname"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                            class="form-control" placeholder="enter phone number" value=""></div>
                                    <div class="col-md-12"><label class="labels">Address Line 1</label><input
                                            type="text" class="form-control" placeholder="enter address line 1"
                                            value=""></div>
                                    <div class="col-md-12"><label class="labels">Address Line 2</label><input
                                            type="text" class="form-control" placeholder="enter address line 2"
                                            value=""></div>
                                    <div class="col-md-12"><label class="labels">Postcode</label><input type="text"
                                            class="form-control" placeholder="enter address line 2" value=""></div>
                                    <div class="col-md-12"><label class="labels">State</label><input type="text"
                                            class="form-control" placeholder="enter address line 2" value=""></div>
                                    <div class="col-md-12"><label class="labels">Area</label><input type="text"
                                            class="form-control" placeholder="enter address line 2" value=""></div>
                                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text"
                                            class="form-control" placeholder="enter email id" value=""></div>
                                    <div class="col-md-12"><label class="labels">Education</label><input type="text"
                                            class="form-control" placeholder="education" value=""></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6"><label class="labels">Country</label><input type="text"
                                            class="form-control" placeholder="country" value=""></div>
                                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text"
                                            class="form-control" value="" placeholder="state"></div>
                                </div>
                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                        type="button">Save
                                        Profile</button></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 py-5">
                                <div class="d-flex justify-content-between align-items-center experience"><span>Edit
                                        Experience</span><span class="border px-3 p-1 add-experience"><i
                                            class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                                <div class="col-md-12"><label class="labels">Experience in Designing</label><input
                                        type="text" class="form-control" placeholder="experience" value=""></div> <br>
                                <div class="col-md-12"><label class="labels">Additional Details</label><input
                                        type="text" class="form-control" placeholder="additional details" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
</body>

</html>
