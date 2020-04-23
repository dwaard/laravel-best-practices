@extends('layouts.hero')

@section('content')
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-6-tablet is-5-desktop is-4-widescreen">
                <div class="title">{{ __('Confirm Password') }}</div>
                <div class="box">
                    {{ __('Please confirm your password before continuing.') }}
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="field">
                            <div class="control has-icons-left has-icons-right">
                                <input type="password" name="password"
                                       class="input @error('password') is-danger @enderror"
                                       value="{{ old('password') }}" required autocomplete="password" autofocus>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-key"></i>
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
                        <div class="field is-grouped">
                            {{-- Here are the form buttons: save, reset and cancel --}}
                            <div class="control">
                                <button type="submit" class="button is-success">{{ __('Confirm Password') }}</button>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
