@extends('layouts.master')

@section('body')
    <section class="hero is-primary is-bold is-fullheight">
        <!-- Hero head: will stick at the top -->
        <div class="hero-head">
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-brand">
                        <a class="navbar-item" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Hero content: will be in the middle -->
        <div class="hero-body">
            @yield('content')
        </div>
    </section>
@endsection
