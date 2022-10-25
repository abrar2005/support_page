@extends('layout.master')
@section('Alle tickets', 'vib-future-- Alle tickets')
@section('content')
    <div class="container">
        <nav class="user_nav">
            <img class="logo" src="/img/logo.png" alt="">
            <ul>
                <li>
                    <img src="/img/icons/arrow_left.svg" alt="">
                    <a href="/alle_tickets">Mijn Tickets</a>
                </li>
            </ul>
        </nav>

        <div class="tickets">
            <div class="ticket">
                <header class="ticket__header">
                    <div class="ticket__header__main">
                        <span>{{ auth()->user()->first_name}} {{ auth()->user()->surname }}</span>
                    </div>
                </header>
                <form action="{{ route('ticket.store') }}" method="post">
                    @csrf

                    <select name="type_problem">
                        <option value="IT probleem">IT probleem</option>
                        <option value="SSL probleem">SSL probleem</option>
                        <option value="Administratieve">Administratieve</option>
                        <option value="Maintanance">Maintanance</option>
                        <option value="Other">Other</option>
                    </select>
                    @error('type_problem')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <textarea name="problem_desc" id="" columns="30" rows="5" placeholder="Beschrijving van je probleem"></textarea>
                    @error('problem_desc')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    <button type="submit" class="blue">submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
