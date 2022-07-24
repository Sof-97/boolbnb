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
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
    <div class="register-container">

        <div class="card">
            <h2 class="register-title">Registrazione</h2>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">


                        <input id="name" placeholder="Nome" type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">

                        <input id="surname" placeholder="Cognome" type="text"
                            class="form-control @error('surname') is-invalid @enderror" name="surname"
                            value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group ">

                        <input type="text" placeholder="Data di nascita" onfocus="(this.type='date')"
                            class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                            value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>

                        @error('birthday')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group ">


                        <input id="email" placeholder="E-mail" type="email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group ">


                        <input id="password" placeholder="Password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group ">


                        <input id="password-confirm" placeholder="Conferma Password" type="password"
                            class="form-control" name="password_confirmation" required autocomplete="new-password">

                    </div>

                    <div class="form-group">

                        <button type="submit" class="button-register">
                            {{ __('Invia') }}
                        </button>

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
