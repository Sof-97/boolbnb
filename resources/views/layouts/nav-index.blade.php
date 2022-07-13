<header>
    <nav class="navbar">
        <div class="navbar-container">

            <div class="navbar-brand" href="{{ url('/') }}">
                <img style="height: 50px; width: 50px;" src="{{ asset('img/airbnb-logo.png') }}" alt="tag">
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
                        <a  class=" default-button " href="#" role="button"v-pre>
                            {{ Auth::user()->name }}
                        </a>

                       
                            <a class=" default-button " href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                      
                    </li>
                    @endguest
                </ul>
            </div>
        </div>

    </nav>
</header>
