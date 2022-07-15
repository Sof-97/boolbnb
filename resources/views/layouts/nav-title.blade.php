<nav>
    <section class="title-border">
        <div class="title flex-between">
            <div class="flex margin-nav">
                @include('layouts.navbar-side')
            </div>
            <div class="nav-logo" href="{{ url('/') }}"><a href="/" style="text-decoration: none; color:inherit">
                    <img style="height: 50px; width: 50px;" src="{{ asset('img/airbnb-logo.png') }}" alt="tag">
                    <span class="title">BoolBnB</span></a>
            </div>
            <div class="flex-between query-changes">
                <a class="button_accent" href="/" style="margin-right: 20px;">Cerca una casa</a>
            </div>
        </div>
    </section>
</nav>
