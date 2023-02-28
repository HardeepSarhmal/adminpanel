<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin|Profile</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('../../plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <style>
        body:not(.layout-fixed) .main-sidebar .sidebar {
            overflow-y: unset;
        }

        .sidebar {
            overflow-x: unset;

        }

        .sidebar .form-inline .input-group {
            flex-wrap: nowrap;
            display: flex;
        }

        .form-inline {
            display: block;
        }

        input[type="file"] {
            display: block;
        }

        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }

        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }

        .remove {
            display: block;
            background: #444;
            border: 1px solid black;
            color: white;
            text-align: center;
            cursor: pointer;
        }

        .remove:hover {
            background: white;
            color: black;
        }

        .btn_upload {
            cursor: pointer;
            display: inline-block;
            overflow: hidden;
            position: relative;
            color: #fff;
            background-color: #0d6efd;
            border: 1px solid #166b8a;
            padding: 5px 10px;
        }

        .btn_upload:hover,
        .btn_upload:focus {
            background-color: #7ca9e6;
        }

        .yes {
            display: flex;
            align-items: flex-start;
            margin-top: 10px !important;
        }

        .btn_upload input {
            cursor: pointer;
            height: 100%;
            position: absolute;
            filter: alpha(opacity=1);
            -moz-opacity: 0;
            opacity: 0;
        }

        .it {
            height: 100px;
            margin-left: 10px;
        }

        .btn-rmv1,
        .btn-rmv2,
        .btn-rmv3,
        .btn-rmv4,
        .btn-rmv5 {
            display: none;
        }

        .rmv {
            cursor: pointer;
            color: #fff;
            border-radius: 30px;
            border: 1px solid #fff;
            display: inline-block;
            background: rgba(255, 0, 0, 1);
            margin: -5px -10px;
        }

        .rmv:hover {
            background: rgba(255, 0, 0, 0.5);
        }

    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Admin Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">


                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        @if ($admindata['image'])
                                            <img class="rounded-circle" src="{{ url('/' . $admindata['image']) }}"
                                                width="200" height="200">
                                        @else
                                            <img class="rounded-circle" src="{{ url('/no_image.jpg') }}">
                                        @endif
                                    </div>


                                    <h3 class="profile-username text-center">{{ $admindata['name'] }}</h3>

                                    <p class="text-muted text-center">Software Engineer</p>

                                    <p class="text-muted text-center">{{ $admindata['email'] }}</p>




                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->

                            <!-- /.card -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-9 ">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item {{ request()->is('/updateProfile') ? 'active' : '' }}"
                                            class="nav-item"><a class="nav-link active" href="#Deatails"
                                                data-toggle="tab">Details</a></li>

                                        <li class="nav-item"><a class="nav-link" href="#settings"
                                                data-toggle="tab">Settings</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="Deatails">
                                            <!-- Post -->
                                            <form class="form-horizontal" action="{{ url('/updateProfile') }}"
                                                enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">
                                                        <h4>Name</h4>
                                                    </label>

                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName"
                                                            name="name" value="{{ $admindata['name'] }}">
                                                    </div>

                                                </div>
                                                <div class=" form-group row">
                                                    <label for="Email" class="col-sm-2 col-form-label">
                                                        <h4>Email</h4>
                                                    </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputExperience"
                                                            name="email" value="{{ $admindata['email'] }}" readonly="readonly
                                                            "></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label" for="inputCity">Image</label>
                                                    <div class="col-sm-10">
                                                        <div class="yes">
                                                            <span class="btn_upload">
                                                                <input type="file" accept=".jpg,.png" id="imag" title=""
                                                                    class="input-img" />
                                                                Choose Image
                                                            </span>
                                                            <img id="ImgPreview" src="" class="preview1" />
                                                            <input type="button" id="removeImage1" value="x"
                                                                class="btn-rmv1" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" value="update"
                                                            class="btn btn-danger">Submit</button>
                                                    </div>
                                                </div>

                                            </form>
                                            {{-- msg --}}
                                            @if (\Session::has('success'))
                                                <div class="alert alert-success">
                                                    <ul>
                                                        <li>{!! \Session::get('success') !!}</li>
                                                    </ul>
                                                </div>
                                            @endif


                                            <!-- /.card -->
                                            <!-- About Me Box -->

                                            <!-- /.card -->



                                            <!-- /.post -->
                                        </div>

                                        <!-- /.tab-pane -->

                                        <!-- /.tab-pane -->

                                        <div class="tab-pane" id="settings">
                                            @include('layouts.changePassword')

                                        </div>
                                    </div>


                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                {{ $admindata['Education'] }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">
                                {{ $admindata['Country'] }},{{ $admindata['State_Region'] }}</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">{{ $admindata['Experience_in_Designing'] }}</span>

                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">{{ $admindata['Additional_Details'] }}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

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
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>

</html>
<script>
    function readURL(input, imgControlName) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(imgControlName).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imag").change(function() {
        // add your logic to decide which image control you'll use
        var imgControlName = "#ImgPreview";
        readURL(this, imgControlName);
        $('.preview1').addClass('it');
        $('.btn-rmv1').addClass('rmv');
    });


    $("#removeImage1").click(function(e) {
        e.preventDefault();
        $("#imag").val("");
        $("#ImgPreview").attr("src", "");
        $('.preview1').removeClass('it');
        $('.btn-rmv1').removeClass('rmv');
    });

</script>
