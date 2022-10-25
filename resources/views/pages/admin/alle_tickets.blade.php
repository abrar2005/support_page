@extends('layout.master')
@section('title', 'vib-future -- Alle tickets')
@section('content')
    <h1>Alle Tickets</h1>
    @if (count($tickets) === 0)
        <p>Momenteel geen tickets</p>
    @else
        <table id="tickets" class="GeneratedTable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Status</th>
                    <th>User</th>
                    <th>Type probleem</th>
                    <th>Last Update</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($tickets as $item)
                    <tr>
                        <td>
                            <a href="{{ route('ticket.show', $item->id) }}">
                                {{ date('Y-m-d', strtotime($item->created_at)) . '-' . $item->id }}
                            </a>
                        </td>
                        <td class="{{ $item->status }}">{{ $item->status }}</td>
                        <td>{{ getUserName($item->user_id) }}</td>
                        <td>{{ $item->type_problem }}</td>
                        <td>{{ date('d/m/Y', strtotime($item->updated_at)) }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <script defer>
            function updateDiv() {
                $("#tickets").load(window.location.href + " #tickets");

            }

            setInterval(() => {
                updateDiv()
            }, 2000);
        </script>
    @endif
@endsection
