@extends('layout.master')
@section('title', 'vib-future -- Users')
@section('content')
    <h1>Users</h1>

    @if (count($users) === 0)
        <p>Momenteel geen gebruikers</p>
    @else
        <table class="GeneratedTable" id="users">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $item)
                    <tr>
                        <td id="name">
                            <a href="{{ route('user.show', $item->id) }}">
                                {{ $item->first_name }} {{ $item->surname }}
                            </a>
                        </td>
                        <td class="email">{{ $item->email }}</td>
                        <td class="action_buttons">
                            {{-- DELETE USER --}}
                            <form action="{{ route('user.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="red">delete</button>
                            </form>


                            <a href="{{ route('user.show', $item->id) }}">
                                <button class="orange">update</button>
                            </a>

                            {{-- VERIFY USER --}}
                            @if ($item->is_verified === 0)
                                <form action="/verify_user/{{ $item->id }}" method="post">
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit" class="blue">verify</button>
                                </form>
                            @else
                            @endif

                        </td>
                    </tr>
                @endforeach

                <script defer>
                    function updateDiv() {
                        $("#users").load(window.location.href + " #users");
                    }
                    setInterval(() => {
                        updateDiv()
                    }, 3000);
                </script>

            </tbody>
        </table>
    @endif
@endsection
