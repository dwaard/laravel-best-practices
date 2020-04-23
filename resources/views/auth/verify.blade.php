@extends('layouts.hero')

@section('content')
<div class="container">
    <div class="columns is-centered">
        <div class="column is-6-tablet is-5-desktop is-4-widescreen">
            <div class="title">{{ __('Verify Your Email Address') }}</div>
            <div class="box">
                @if (session('resent'))
                    <div class="notification is-success">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="button is-primary">{{ __('click here to request another') }}</button>
                    .
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
