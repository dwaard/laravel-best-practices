@extends('layouts.app')

@section('content')
    <h1>Accounts</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Verified</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{($user->email_verified_at ? 'Yes' : 'No') }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
