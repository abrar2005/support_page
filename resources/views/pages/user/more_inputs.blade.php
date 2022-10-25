@extends('layout.master')
@section('title', 'More info needed')
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
                        <p class="text-danger mb-4 h6">*Je moet meer informatie geven om een ticket te maken.</p>

                        <form class="form" action='/more_info/{{ auth()->user()->id }}' method="post">
                            @csrf
                            @method('PATCH')    

                            <div class="form-group">
                                <label for="occupation">Bedrijfs naam:</label><br>
                                <input type="occupation" name="occupation" id="occupation" class="form-control"
                                    value={{ old('occupation') }}>
                                <span class="text-danger">
                                    @error('occupation')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="phone">Telefoonnummer:</label><br>
                                <input type="phone" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                                <span class="text-danger">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <button class="btn btn-primary btn-md mt-4" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
