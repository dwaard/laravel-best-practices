@extends('layouts.hero')

@section('content')
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-6-tablet is-5-desktop is-4-widescreen">
                <div class="title">{{ __('Reset Password') }}</div>
                <div class="box">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="field">
                            <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                            <div class="control has-icons-left has-icons-right">
                                <input type="email" name="email"
                                       class="input @error('email') is-danger @enderror"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                        <div class="field">
                            <label for="password_confirmation" class="label">{{ __('Confirm Password') }}</label>
                            <div class="control has-icons-left has-icons-right">
                                <input type="password" name="password_confirmation"
                                       class="input @error('password_confirmation') is-danger @enderror"
                                       value="{{ old('password_confirmation') }}" required autocomplete="password_confirmation">
                                <span class="icon is-small is-left">
                                <i class="fas fa-key"></i>
                            </span>
                                @error('password_confirmation')
                                <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                                @enderror
                            </div>
                            @error('password_confirmation')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="field is-grouped">
                            {{-- Here are the form buttons: save, reset and cancel --}}
                            <div class="control">
                                <button type="submit" class="button is-success">{{ __('Reset Password') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
