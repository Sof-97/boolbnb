@extends('layouts.app')

@section('content')
    <div class="container">
        <nav class="navbar">
            <div class="navbar-container">

                <div class="navbar-brand" href="{{ url('/') }}">
                    <img style="height: 50px; width: 50px;" src="{{ secure_asset('img/airbnb-logo.png') }}" alt="tag">
                    <span class="title" style="color: $color-accent">BoolBnB</span>
                </div>
                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
            </button> --}}

                <div class="navbar-options">

                    <ul class="navbar-nav ">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class=" button-login " href="{{ route('login') }}">{{ __('Accedi') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class=" button-login " href="{{ route('register') }}">{{ __('Iscriviti') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>
        <div class="login-container">
            <div>

                <div class="card">
                    <h2 class="login-title">Accedi</h2>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group ">


                                <div>

                                    <input id="email" placeholder="E-Mail Address" type="email"
                                        class="form-control  @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group ">

                                <div>
                                    <input id="password" placeholder="Password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Ricordati di me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="login-reset-area">
                                    <button type="submit" class="button-login">
                                        {{ __('Accedi') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn" href="{{ route('password.request') }}">
                                            {{ __('Password dimenticata?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
