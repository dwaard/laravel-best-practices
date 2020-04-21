@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        {{-- social auth buttons --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-4">
                                <p>- OR -</p>
                                <a href="/login/facebook" class="btn btn-block"
                                   style="background-color: #3b5998; color: #fff;">
                                    Sign in using Facebook
                                </a>
                                <a href="/login/twitter" class="btn btn-block"
                                   style="background-color: #4099ff; color: #fff;">
                                    Sign in using Twitter
                                </a>
                                <a href="/login/linkedin" class="btn btn-block"
                                   style="background-color: #0074AD; color: #fff;">
                                    Sign in using LinkedIn
                                </a>
                                <a href="/login/google" class="btn btn-block"
                                   style="background-color: #FFFFFF; color: grey;">
                                    Sign in using Google
                                </a>
                                <a href="/login/github" class="btn btn-block"
                                   style="background-color: #eff3f6; color: #24292e;">
                                    Sign in using GitHub
                                </a>
                                <a href="/login/gitlab" class="btn btn-block"
                                   style="background-color: #292961; color: #fff;">
                                    Sign in using GitLab
                                </a>
                                <a href="/login/bitbucket" class="btn btn-block"
                                   style="background-color: #0052CC; color: #fff;">
                                    Sign in using Bitbucket
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
