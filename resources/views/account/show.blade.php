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
                                    <th scope="col">#</th>
                                    <th scope="col">Token</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->tokens as $token)
                                    <tr>
                                        <th scope="row">{{ $token->name }}</th>
                                        <td>{{ $token->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info" role="alert">
                                No tokens found
                            </div>
                        @endif

                        <form action="{{ route('account.token.create') }}" method="POST">
                            @csrf
                            <input type="text" name="name"/>
                            <input type="submit" class="btn btn-success" value="Create token"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
