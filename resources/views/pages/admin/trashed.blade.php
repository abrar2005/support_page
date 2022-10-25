@extends('layout.master')
@section('title', 'vib-future -- Trashed')
@section('content')
    <h1>Trashed</h1>
    <table class="GeneratedTable">
        <thead>
            <tr>
                <th>status</th>
                <th>User</th>
                <th>type probleem</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="closed">closed</td>
                <td><a href="/lakdfj">Ada Bate</a></td>
                <td>maintenance</td>
                <td>
                    <button class="red">delete</button>
                </td>
            </tr>
            <tr>
                <td class="closed">closed</td>
                <td><a href="/lakdfj">Robert Jorhanem</a></td>
                <td>ssl Problems</td>
                <td>
                    <button class="red">delete</button>
                </td>
            </tr>
            <tr>
                <td class="closed">closed</td>
                <td><a href="/lakdfj">Aubrey Estes</a></td>
                <td>IT support</td>
                <td>
                    <button class="red">delete</button>
                </td>
            </tr>
            <tr>
                <td class="closed">closed</td>
                <td><a href="/lakdfj">Robert Jorhanem</a></td>
                <td>IT support</td>
                <td>
                    <button class="red">delete</button>
                </td>
            </tr>

        </tbody>
    </table>
@endsection
