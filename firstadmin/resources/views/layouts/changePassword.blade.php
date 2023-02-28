@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-right">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #0d6efd;"></div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('changePassword') }}">

                            @if (\Session::has('error'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{!! \Session::get('error') !!}</li>
                                    </ul>
                                </div>
                            @endif

                            @if (\Session::has('success_update'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{!! \Session::get('success_update') !!}</li>
                                    </ul>
                                </div>
                            @endif

                            @csrf

                            @foreach ($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Old Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="old_password"
                                        autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                                <div class="col-md-6">
                                    <input id="new_password" type="password" class="form-control" name="new_password"
                                        autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm
                                    Password</label>

                                <div class="col-md-6">
                                    <input id="new_confirm_password" type="password" class="form-control"
                                        name="new_confirm_password" autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" style="background-color: #0d6efd;,color: white;"
                                        class=" btn btn-primary">
                                        Update Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
