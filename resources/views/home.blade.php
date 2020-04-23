@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>

    @if (session('status'))
        <div class="notification notification-success">
            {{ session('status') }}
        </div>
    @endif

    You are logged in!
@endsection
