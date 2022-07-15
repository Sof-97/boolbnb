<header>
    <nav class="navbar">
        <div class="navbar-guest">

            <div class="nav-logo" href="{{ url('/') }}"><a href="/" style="text-decoration: none; color:inherit">
                    <img style="height: 50px; width: 50px;" src="{{ asset('img/airbnb-logo.png') }}" alt="tag">
                    <span class="title">BoolBnB</span></a>
            </div>
            <div class="navbar-options">

                <ul class="navbar-nav ">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <button class="button_accent" style="margin-right: 20px">
                                <a " href="{{ route('login') }}">{{ __('Accedi') }}</a>
                                </button>
                            </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <button class="button_accent">
                                <a " href="{{ route('register') }}">{{ __('Iscriviti') }}</a>
                                    </button>
                                </li>
                        @endif
                                @else
                        <li class="flex">
                            <button class="button_accent" style="margin-right: 20px">
                                <a href="/admin/dashboard" role="button"v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                            </button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="button_accent m-right" type="submit" style="cursor: pointer">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>

    </nav>
</header>
