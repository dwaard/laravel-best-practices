@extends('layouts.app')

@section('content')
    <h1>My Account</h1>

    @if(session('token'))
        <div class="notification is-warning">
            Your api token: {{ session('token') }}
        </div>
    @endif

    @if (count($user->tokens) > 0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Created at</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->tokens as $token)
                <tr>
                    <th scope="row">{{ $token->name }}</th>
                    <td>{{ $token->created_at }}</td>
                    <td>
                        <a class="dropdown-item" href="{{ route('account.token.destroy', $token) }}"
                           onclick="event.preventDefault();
                               document.getElementById('destroy-form-{{$token->id}}').submit();">
                            Delete
                        </a>
                        <form id="destroy-form-{{$token->id}}" action="{{ route('account.token.destroy', $token) }}"
                              method="POST" style="display: none;">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info" role="alert">
            No tokens found
        </div>
    @endif

    <form action="{{ route('account.token.create') }}" method="POST" class="form-inline">
        @csrf
        <div class="field is-grouped">
            <p class="control">
            <div class="control has-icons-left has-icons-right">
                <input type="name" name="name"
                       class="input @error('name') is-danger @enderror"
                       value="{{ old('name') }}" required placeholder="Token name">
                <span class="icon is-small is-left">
                    <i class="fas fa-dollar-sign"></i>
                </span>
                @error('name')
                <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
                @enderror
            </div>
            @error('name')
            <p class="help is-danger">{{ $message }}</p>
            @enderror
            </p>
            <p class="control">
                <button type="submit" class="button is-primary">Create token</button>
            </p>
        </div>
    </form>
@endsection
