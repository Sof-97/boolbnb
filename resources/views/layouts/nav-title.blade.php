<nav>
    <section class="title-border">
        <div class="title flex-between">
            <div class="flex margin-nav">
                @include('layouts.navbar-side')
            </div>

            <div class="nav-logo" href="{{ url('/') }}"><a href="/"
                    style="text-decoration: none; color:inherit">
                    <img style="height: 50px; width: 50px;" src="{{ asset('img/airbnb-logo.png') }}" alt="tag">
                    <span class="title">BoolBnB</span></a>
            </div>

            <div class="flex align-center">
                <div>
                    <button class="button_accent">
                        <a class="text_decoration_none" href="{{ route('admin.apartments.create') }}">
                            Aggiungi appartamento
                        </a>
                    </button>
                </div>
            </div>

        </div>
    </section>
</nav>
