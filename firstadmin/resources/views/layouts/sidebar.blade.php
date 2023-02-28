@extends('layouts.app')

<head>
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

    </style>

    <!-- limonte-sweetalert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css"
        integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js"
        integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ url('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https: //cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css"></script>

</head>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home" class="brand-link">
        <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href=""
                        class="nav-link {{ (request()->is('Active') ? 'active' : '' || request()->is('Block')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/users') }}"
                                class="nav-link {{ request()->is('Active') ? 'active' : '' }}">
                                <i class=" far fa-circle nav-icon"></i>
                                <p>Active</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/Block') }}"
                                class="nav-link {{ request()->is('Block') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Block </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href=""
                        class="nav-link {{ request()->is('Profile') || request()->is('logout') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ request()->is('Profile') ? 'active' : '' }}">
                            <a href="{{ url('/profile') }}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('logout') ? 'active' : '' }}" id="logout">
                                <i class="far fa-circle nav-icon"></i>
                                <p>logout </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<script>
    $('#logout').click(function() {
        swal({
                title: "Are you sure you want to logout",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((res) => {
                if (res) {
                    window.location.href = "{{ url('logout') }}";
                }
            });
    });

</script>
