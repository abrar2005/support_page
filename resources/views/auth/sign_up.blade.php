@extends('layout.master')
@section('title', 'VIB Sign up')
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
                        <h3 class="text-center">Sign up</h3>

                        <form id="login-form" class="form" action={{ route('register_sign_up') }} method="post">
                            @csrf

                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="first_name">Voornaam:</label><br>
                                    <input type="text" name="first_name" id="first_name" class="form-control"
                                        value={{ old('first_name') }}>
                                    <span class="text-danger">
                                        @error('first_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="surname">Achternaam:</label><br>
                                    <input type="text" name="surname" id="surname" class="form-control"
                                        value={{ old('surname') }}>
                                    <span class="text-danger">
                                        @error('surname')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control"
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

                            <div class="form-group">
                                <div class="form-check">
                                    <input name="agreements" class="form-check-input" type="checkbox" id="gridCheck" />
                                    <label class="form-check-label" for="gridCheck"> Akkord met overeenkomsten</label>
                                </div>
                                <span class="text-danger">
                                    @error('agreements')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <button class="btn btn-primary btn-md mt-4" type="submit">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
