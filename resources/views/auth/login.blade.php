@extends('layouts.hero')

@section('content')
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-5-tablet is-4-desktop is-3-widescreen">
                <div class="title">{{ __('Login') }}</div>
                <div class="box">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="field">
                            <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input @error('email') is-danger @enderror"
                                       type="email" name="email" value="{{ old('email') }}"
                                       required autocomplete="email" autofocus>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                @error('email')
                                <span class="icon is-small is-right">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                @enderror
                            </div>
                            @error('email')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="password" class="label">{{ __('Password') }}</label>
                            <div class="control has-icons-left has-icons-right">
                                <input id="password" type="password"
                                       class="input @error('password') is-danger @enderror"
                                       name="password" required autocomplete="current-password"/>
                                <span class="icon is-small is-left">
                                    <i class="fa fa-lock"></i>
                                </span>
                                @error('password')
                                <span class="icon is-small is-right">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                @enderror
                            </div>
                            @error('password')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="checkbox" for="remember">
                                <input type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="field">
                            <button class="button is-success">
                                {{ __('Login') }}
                            </button>
                        </div>
                        <div class="field">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link level-right" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                    <div class="col-md-6 offset-4">

                        <div class="has-text-centered">- OR -</div>
                        <div class="field">
                            <a href="/register" class="button is-success is-link is-fullwidth">
                                {{ __('Register') }}
                            </a>
                        </div>
                        <div class="field">
                            <a href="/login/facebook" class="button is-link is-fullwidth"
                               style="background-color: #3b5998; color: #fff;">
                                <i class="fab fa-facebook"></i>&nbsp{{ __('Sign in using') }} Facebook
                            </a>
                        </div>
                        <div class="field">
                            <a href="/login/twitter" class="button is-link is-fullwidth"
                               style="background-color: #4099ff; color: #fff;">
                                <i class="fab fa-twitter"></i>&nbsp{{ __('Sign in using') }} Twitter
                            </a>
                        </div>
                        <div class="field">
                            <a href="/login/linkedin" class="button is-link is-fullwidth"
                               style="background-color: #0074AD; color: #fff;">
                                <i class="fab fa-linkedin"></i>&nbsp{{ __('Sign in using') }} LinkedIn
                            </a>
                        </div>
                        <div class="field">
                            <a href="/login/google" class="button is-link is-fullwidth"
                               style="background-color: #FFFFFF; color: grey;">
                                <i class="fab fa-google"></i>&nbsp{{ __('Sign in using') }} Google
                            </a>
                        </div>
                        <div class="field">
                            <a href="/login/github" class="button is-link is-fullwidth"
                               style="background-color: #eff3f6; color: #24292e;">
                                <i class="fab fa-github"></i>&nbsp{{ __('Sign in using') }} GitHub
                            </a>
                        </div>
                        <div class="field">
                            <a href="/login/gitlab" class="button is-link is-fullwidth"
                               style="background-color: #292961; color: #fff;">
                                <i class="fab fa-gitlab"></i>&nbsp{{ __('Sign in using') }} GitLab
                            </a>
                        </div>
                        <div class="field">
                            <a href="/login/bitbucket" class="button is-link is-fullwidth"
                               style="background-color: #0052CC; color: #fff;">
                                <i class="fab fa-bitbucket"></i>&nbsp{{ __('Sign in using') }} Bitbucket
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
