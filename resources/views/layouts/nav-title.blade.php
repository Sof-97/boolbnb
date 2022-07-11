<nav>
    <section class="title-border">
        <div class="title flex-between">
            <div class="flex margin-nav">
                @include('layouts.navbar-side')
            </div>
            <div class="flex">
                <img style="height: 50px; width: 50px;" src="{{ asset('img/airbnb-logo.png') }}" alt="tag">
                <span class="align-center">BoolBnB</span>
            </div>
            <div class="flex-between">
                <a class="button_accent" href="/" style="margin-right: 20px;">Cerca una casa</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="button_accent m-right" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </section>
</nav>
