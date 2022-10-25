@extends('layout.master')
@section('title', 'Waiting verification')
@section('content')
    <style>
        main {
            padding: 0;
            margin: 0;
        }

        .await {
            padding-top: 7rem;
            height: 100vh;
        }

        h1 {
            padding: 0 1rem;
            font-family: serif;
            text-align: center;
            max-width: 50rem;

            margin: 0 auto;
        }

        .spinner {
            margin-top: 12rem;
        }

        .stock_photo {
            position: absolute;
            bottom: 0;
            right: 0;
            height: 70vh
        }
    </style>
    <div class="await" id="await">
        <h1>Uw account bevindt zich nog in het verificatieproces...</h1>

        <div class="spinner">
            <div class="circle one"></div>
            <div class="circle two"></div>
            <div class="circle three"></div>
        </div>

        <img src="/img/photos/umbrella_girl.svg" alt="__" class="stock_photo">
    </div>
    <script defer>
        function updateDiv() {
            $("#await").load(window.location.href + " #await");

        }

        setInterval(() => {
            updateDiv()
        }, 5000);
    </script>
@endsection
