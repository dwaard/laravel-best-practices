@extends('layouts.master')

@section('body')
    <nav class="navbar is-primary  has-text-white">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                   data-target="navMenu">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div class="navbar-menu" id="navbarSupportedContent">
                <div class="navbar-start">
                    <!-- Left Side Of Navbar -->
                    <a class="navbar-item" href="{{ route('home') }}">Dashboard</a>
                    <a class="navbar-item" href="{{ route('users.index') }}">Accounts</a>
                </div>                    <!-- Right Side Of Navbar -->
                <div class="navbar-end">
                    <!-- Authentication Links -->
                    @guest
                        <a class="navbar-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="navbar-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @else
                        <div class="navbar-item">
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link">
                                    <figure class="image is-32x32">
                                        <img class="is-rounded"
                                             src="{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}"/>
                                    </figure>
                                </a>

                                <div class="navbar-dropdown">
                                    <div class="navbar-item">
                                        <p>Signed in as <strong>{{ Auth::user()->name }}</strong></p>
                                    </div>
                                    <hr class="navbar-divider">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>&nbsp
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>

                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <div class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-8-desktop is-12-tablet">
                    <div class="content">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
