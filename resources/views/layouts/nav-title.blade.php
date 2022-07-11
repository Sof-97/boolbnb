<nav>
    <section>
        <div class="title flex-between">
            <div style="display: flex">
                <img style="height: 50px; width: 50px;" src="{{ asset('img/airbnb-logo.png') }}" alt="tag">
                <span class="align-center" style="color: $color-accent">BoolBnB</span>
            </div>
            <div class="flex-between">
                <a class="button_accent" href="/" style="margin-right: 20px;">Cerca una casa</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="button_accent" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </section>
</nav>
