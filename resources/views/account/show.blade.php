@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Account</div>

                    <div class="card-body">
                        @if(session('token'))
                            <div class="alert alert-warning" role="alert">
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
                                            <form id="destroy-form-{{$token->id}}" action="{{ route('account.token.destroy', $token) }}" method="POST" style="display: none;">
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
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">Password</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                       name="name" placeholder="Token name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Create token</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
