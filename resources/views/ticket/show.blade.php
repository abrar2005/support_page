@extends('layout.master')
@section('title', 'vib-future -- Alle tickets')
@section('content')
    <h1>Ticket</h1>
    <div class="tickets">
        <div class="ticket">
            {{-- DELETE USER --}}
            
            <header class="ticket__header">
                <div class="ticket__header__main">
                    <h3>{{ $ticket->type_problem }}</h3>
                    <a href="{{ route('user.show', $ticket->user_id) }}">
                        <span>{{ getUserName($ticket->user_id) }}</span>
                    </a>
                </div>
                <span class="date">{{ date('d/m/Y', strtotime($ticket->created_at)) }}</span>
            </header>
            
            <p class="ticket__description">{{ $ticket->problem_desc }}</p>
            

            <div class="action_buttons">
                
                <form action="{{ route('ticket.destroy', $ticket->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="red">delete</button>
                </form>
                <div class="ticket__status {{ $ticket->status }}">{{ $ticket->status }}</div>
            </div>

            <style>
                .ticket__status {
                    align-self: flex-end
                }
            </style>
        </div>
    </div>
@endsection
