@extends('layout.master')
@section('Alle tickets', 'vib-future-- Alle tickets')
@section('content')
    <div id="tickets" class="container">
        <nav class="user_nav">
            <img class="logo" src="/img/logo.png" alt="">
            <ul>
                <li>
                    <a href="{{ route('ticket.create') }}">Nieuwe ticket</a>
                </li>
            </ul>
        </nav>

        @if (count($tickets) === 0)
            <p>Momenteel zijn er geen tickets</p>
        @else
            @foreach ($tickets as $item)
                <div class="tickets">
                    <div class="ticket">
                        <header class="ticket__header">
                            <div class="ticket__header__main">
                                <h3>{{ $item->type_problem }}</h3>
                                <span>{{ getUserName($item->user_id) }}</span>
                            </div>
                            <span class="date">{{ date('d/m/Y', strtotime($item->created_at)) }}</span>
                        </header>

                        <p class="ticket__description">{{ $item->problem_desc }}</p>

                        <div class="ticket__status {{ $item->status }}">{{ $item->status }}</div>
                    </div>
                </div>
            @endforeach
        @endif

        <script defer>
            function updateDiv() {
                $("#tickets").load(window.location.href + " #tickets");

            }

            setInterval(() => {
                updateDiv()
            }, 5000);
        </script>
    </div>
@endsection
