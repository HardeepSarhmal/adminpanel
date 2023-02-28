<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User|Profile</title>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

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

    <style>
        video {
            border: 1px solid black;
            display: block;
        }

        /* image */
        .btn_upload {
            cursor: pointer;
            display: inline-block;
            overflow: hidden;
            position: relative;
            color: #fff;
            background-color: #2a72d4;
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

    </Style>
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
                                <li class="breadcrumb-item active">User|Profile</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section>
                <div>
                    <div class="container rounded bg-white mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-5 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    {{-- <img
                                    class="rounded-circle mt-5" width="150px"
                                    src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"> --}}
                                    <div class="text-center">
                                        @if ($userdata['image'])
                                            <img class="rounded-circle" src="{{ url('/' . $userdata['image']) }}"
                                                width="200" height="200">
                                        @else
                                            <img class="rounded-circle" src="{{ url('/AdminLTELogo.png') }}">
                                        @endif
                                    </div>
                                    <span class="font-weight-bold">{{ $userdata['name'] }}</span>
                                    <span class="text-black-50">{{ $userdata['email'] }}</span><span>
                                    </span>
                                </div>
                            </div>
                            <form action="{{ url('/updateUser') }}" method="post" enctype="multipart/form-data">
                                @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                        <ul>
                                            <li>{!! \Session::get('success') !!}</li>
                                        </ul>
                                    </div>
                                @endif
                                @csrf
                                <div class="col-md-10 border-right">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="text-right">Profile Settings</h4>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6"><label class="labels">Name</label><input type="text"
                                                    class="form-control" name="name" value="{{ $userdata['name'] }}">
                                            </div>
                                            <div class="col-md-6"><label class="labels">Surname</label><input
                                                    type="text" class="form-control" value="" placeholder="surname">
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12"><label class="labels">Mobile Number</label><input
                                                    type="text" class="form-control" placeholder="enter phone number"
                                                    value=""></div>
                                            {{-- <div class="col-md-12"><label class="labels">Image</label><input type="file"
                                                class="form-control" name="image" placeholder="enter address line 1"
                                                value="dist / img /{{ $userdata['image'] }}"></div> --}}

                                            <div class="col-md-12"><label class="labels">Address Line 1</label><input
                                                    type="text" class="form-control" name="Address"
                                                    placeholder="enter address line 1"
                                                    value="{{ $userdata['Address'] }}">
                                            </div>
                                            {{-- <div class="col-md-12"><label class="labels">Audio</label><input type="file"
                                                class="form-control" name="audio" placeholder="enter address line 2"
                                                value=""></div> --}}
                                            {{-- Audio --}}
                                            <div class="col-md-12 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="audioUploadSwitch">
                                                    <label class="custom-control-label font-weight-light"
                                                        for="audioUploadSwitch">Disable upload and use default audio
                                                        file</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="file-upload-wrapper">
                                                    <div class="card card-body w-100 view file-upload">
                                                        <input type="file" id="audiofile" name="audio"
                                                            class="file_upload" accept=".mp3">
                                                        <p class="file-upload-infos-message">Audio upload - Drag and
                                                            drop or
                                                            click</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mx-auto">
                                                <audio id="track" src="" type="audio/mp3"></audio>
                                                <div class="player d-none" style="width:300px;">
                                                    <div class="progress p-1">
                                                        <input id="timeslieder" class="timeslieder" type="range"
                                                            value="0" min="0" max="100" step="0.001" />
                                                        <div class="time d-flex justify-content-around"
                                                            style="width:100%;">
                                                            <span id="currentTime" style="width: 30px;">00:00:00</span>
                                                            <div id="pause" class="control-icon d-none"><i
                                                                    class="fas fa-pause"></i></div>
                                                            <div id="start" class="control-icon"><i
                                                                    class="fas fa-play"></i>
                                                            </div>
                                                            <div id="reset" class="control-icon"><i
                                                                    class="fas fa-redo-alt"></i></div>
                                                            <span id="duration">00:00:00</span>
                                                        </div>
                                                        <span><a class="text-decoration-none pt-1 pb-1" href="#"
                                                                target="_blank">Link</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end audio --}}
                                            {{-- <div class="col-md-12"><label class="labels">Postcode</label><input type="text"
                                                class="form-control" name="" placeholder="enter address line 2"
                                                value=""></div> --}}
                                            {{-- video --}}
                                            <div class="col-md-12">
                                                <label class="labels">vedio</label>
                                                <input id="file-input" type="file" name="vedio" accept="video/*">
                                                <br>
                                                <video id="video" width="400" height="100" controls></video>
                                            </div>
                                            {{-- video end --}}
                                            <div class="col-md-12"><label class="labels">State</label><input type="text"
                                                    class="form-control" name="" placeholder="enter address line 2"
                                                    value=""></div>
                                            <div class="col-md-12"><label class="labels">Document</label><input
                                                    type="file" class="form-control" name="file"
                                                    accept=".doc,.docx,.pdf" placeholder="enter address line 2"
                                                    value=""></div>
                                            {{-- Document --}}
                                            {{-- <div class="col-md-12">
                                            <label class="labels" for="inputCity">Document</label>
                                            <div class="">
                                                <span class="btn_upload">
                                                    <input type="file" id="imag" title="" class="form-control"
                                                        name="file" accept=".doc,.docx,.pdf" />
                                                    Choose Document
                                                </span>
                                                <img id="ImgPreview" src="" class="preview1" style="width: 60px;" />
                                                <input type="button" id="removeImage1" value="x" class="btn-rmv1" />
                                            </div>
                                        </div> --}}
                                            {{-- end Doc --}}
                                            <div class="col-md-12"><label class="labels">Email ID</label><input
                                                    type="text" class="form-control" name="email" readonly="readonly"
                                                    placeholder="enter email id" value="{{ $userdata['email'] }}">
                                            </div>
                                            {{-- image --}}
                                            <div class="col-md-12">
                                                <label>Image</label>
                                                <div class="yes">
                                                    <span class="btn_upload" style="align-left">

                                                        <input type="file" id="imag" accept=".jpg,.png" title="Image"
                                                            class="input-img" />
                                                        Choose Image
                                                    </span>
                                                    <img id="ImgPreview" src="" class="preview1" />
                                                    <input type="button" id="removeImage1" value="x" class="btn-rmv1" />
                                                </div>

                                            </div>
                                            {{-- end image --}}

                                            <div class="col-md-12"><label class="labels">Education</label><input
                                                    type="text" class="form-control" name="Education"
                                                    placeholder="education" value=" {{ $userdata['Education'] }} ">
                                            </div>
                                        </div>
                                        <div class=" row mt-3">
                                            <div class="col-md-6"><label class="labels">Country</label><input
                                                    type="text" class="form-control" name="Country"
                                                    placeholder="country" value=" {{ $userdata['Country'] }} ">
                                            </div>
                                            <div class="col-md-6"><label class="labels">State/Region</label><input
                                                    type="text" class="form-control" name="State_Region"
                                                    value=" {{ $userdata['State_Region'] }} " placeholder="state">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                        <span>Edit
                                            Experience{{-- </span><span class="border px-3 p-1 add-experience"><i
                                                class="fa fa-plus"></i>&nbsp;Experience</span>
                                </div> --}}<br>
                                        <div class="col-md-12"><label class="labels">Experience in
                                                Designing</label><input type="text" class="form-control"
                                                name="Experience_in_Designing" placeholder="experience"
                                                value=" {{ $userdata['Experience_in_Designing'] }} "></div>
                                        <br>
                                        <div class="col-md-12"><label class="labels">Additional
                                                Details</label><input type="text" class="form-control"
                                                name="Additional_Details" placeholder="additional details"
                                                value=" {{ $userdata['Additional_Details'] }} ">
                                        </div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-12"></div>
                                        <div class="col-md-12"></div>
                                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                                type="submit">Save
                                                Profile</button></div>
                                    </div>
                                </div>
                            </form>
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
<script>
    /* Audio enable & disable switch */
    $("#audioUploadSwitch").change((e) => {
        var value = e.target.checked;
        var sampleUrl =
            "https://upload.wikimedia.org/wikipedia/commons/f/f3/Anthem_of_Europe_%28US_Navy_instrumental_short_version%29.ogg";
        if (value == true) {
            $("#track").attr("src", sampleUrl);
            document.getElementById("track").load();
            $("div.player").toggleClass('d-none');
            $(".file-upload-wrapper").toggleClass('d-none');
        } else {
            $("div.player").toggleClass('d-none');
            $(".file-upload-wrapper").toggleClass('d-none');
        }
    });

    /* upload audio file */
    function handleFiles(event) {
        var files = event.target.files;
        $("#track").attr("src", URL.createObjectURL(files[0]));
        document.getElementById("track").load();
        console.log(event);
        $("div.player").toggleClass('d-none');
        $(".file-upload-wrapper").toggleClass('d-none');
    }
    document.getElementById("audiofile").addEventListener("change", handleFiles, false);

    $('#track').each(function(index, audio) {
        $(audio).on('canplay', function() {
            console.log(audio.duration);
            $("#duration")[0].innerHTML = sec2time(audio.duration);
            $("#timeslieder")[0].max = audio.duration * 1000;
        });
    });

    /* start button */
    $("#start").click(function() {
        $("#track")[0].play();
        $(this).toggleClass('d-none');
        $("#pause").toggleClass('d-none');
    });
    /* pause button */
    $("#pause").click(function() {
        $("#track")[0].pause();
        $(this).toggleClass('d-none');
        $("#start").toggleClass('d-none');
    });
    /* reset button */
    $("#reset").click(function() {
        $("#track")[0].load();
        $("#start").toggleClass('d-none');
        $("#pause").toggleClass('d-none');
    });
    /* timeupdate log */
    $("#track")[0].addEventListener('timeupdate', function() {
        var currentTimeSec = this.currentTime;
        var currentTimeMs = this.currentTime * 1000;
        $("#currentTime")[0].innerHTML = sec2time(currentTimeSec);
        $("#timeslieder")[0].value = currentTimeMs;
        initRangeEl();
        var arrayTime = [sec2time(currentTimeSec), currentTimeMs];
        console.log(currentTimeMs);
    }, false);

    function sec2time(timeInSeconds) {
        var pad = function(num, size) {
                return ('000' + num).slice(size * -1);
            },
            time = parseFloat(timeInSeconds).toFixed(3),
            hours = Math.floor(time / 60 / 60),
            minutes = Math.floor(time / 60) % 60,
            seconds = Math.floor(time - minutes * 60),
            milliseconds = time.slice(-3);
        return pad(hours, 2) + ':' + pad(minutes, 2) + ':' + pad(seconds, 2);
    }


    /* timeline slieder */
    function valueTotalRatio(value, min, max) {
        return ((value - min) / (max - min)).toFixed(2);
    }

    function getLinearGradientCSS(ratio, leftColor, rightColor) {
        return [
            '-webkit-gradient(',
            'linear, ',
            'left top, ',
            'right top, ',
            'color-stop(' + ratio + ', ' + leftColor + '), ',
            'color-stop(' + ratio + ', ' + rightColor + ')',
            ')'
        ].join('');
    }

    function updateRangeEl(rangeEl) {
        var ratio = valueTotalRatio(rangeEl.value, rangeEl.min, rangeEl.max);
        rangeEl.style.backgroundImage = getLinearGradientCSS(ratio, '#3b87fd', '#fffcfc');
    }

    function initRangeEl() {
        var rangeEl = document.getElementById("timeslieder");
        updateRangeEl(rangeEl);
        rangeEl.addEventListener("input", function(e) {
            updateRangeEl(e.target);
        });
    }

    $("#timeslieder")[0].addEventListener("input", function(e) {
        updateRangeEl(e.target);
        this.value = e.target.value;
        $("#track")[0].currentTime = e.target.value / 1000;
    });

</script>
{{-- vedio --}}
<script>
    const input = document.getElementById('file-input');
    const video = document.getElementById('video');
    const videoSource = document.createElement('source');

    input.addEventListener('change', function() {
        const files = this.files || [];

        if (!files.length) return;

        const reader = new FileReader();

        reader.onload = function(e) {
            videoSource.setAttribute('src', e.target.result);
            video.appendChild(videoSource);
            video.load();
            video.play();
        };

        reader.onprogress = function(e) {
            console.log('progress: ', Math.round((e.loaded * 100) / e.total));
        };

        reader.readAsDataURL(files[0]);
    });

</script>
<script>
    $(document).ready(function() {
        $("#video").click(function() {
            $this.hide();
        });
        $("#file-input").click(function() {
            $("video").show();
        });
    });

</script>
