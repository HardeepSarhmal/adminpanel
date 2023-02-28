<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }

    </style>
    <title>Login</title>
</head>

<body>




    @csrf
    <section class="auto gradient-custom">

        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="{{ url('/login') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-md-5 mt-md-4 pb-2">
                                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                    @if (\Session::has('success'))
                                        <div class="alert alert-success">
                                            <ul>
                                                <li>{!! \Session::get('success') !!}</li>
                                            </ul>
                                        </div>
                                    @endif
                                    <p class="text-white-50 mb-5">Please enter your login and password!</p>
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" name="email" id="typeEmailX" placeholder="Email"
                                            class="form-control form-control-lg" />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="password" id="typePasswordX" placeholder="Password"
                                            class="form-control form-control-lg" />
                                    </div>
                                    {{-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot
                                            password?</a>
                                    </p> --}}
                                    {{-- <p class=""><a class="text-white-50"
                                            href="{{ url('/register') }}">Registraction</a>
                                    </p> --}}
                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                        <a href="#!" class="text-white"><i class="bi bi-facebook"></i></i></a>&ensp;
                                        <a href="#!" class="text-white"><i class="bi bi-twitter"></i></a>&ensp;
                                        <a href="#!" class="text-white"><i class="bi bi-google"></i></i></a>
                                    </div>
                                </div>
                                <div>
                                    <p class="mb-0">Don't have an account? <a href="{{ url('/register') }}"
                                            class="text-white-50 fw-bold">Sign
                                            Up</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


</body>

</html>
