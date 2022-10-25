@extends('layout.master')
@section('title', 'VIB support Login')
@section('content')
    {{-- bootstrap css cdn --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    {{-- ================== --}}

    <div id="login">

        <img src="/img/logo.png" alt="" class="login_logo">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <h3 class="text-center">Login</h3>

                        <form id="login-form" class="form" action={{ route('register_login') }} method="post">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email:</label><br>
                                <input type="email" name="email" id="email" class="form-control"
                                    value={{ old('email') }}>
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <br>
                            <div id="register-link" class="text-right">
                                <a href={{ route('sign_up') }}>Register here</a>
                            </div>

                            <button class="btn btn-primary btn-md mt-4" type="submit">Log in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
