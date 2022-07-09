<nav>
    <section>
        <div class="title flex">
            <div>
                <img style="height: 50px; width: 50px;" src="{{ asset('img/airbnb-logo.png') }}" alt="tag">
                <span style="color: $color-accent">BoolBnB</span>
            </div>
            <div class="flex">
                <a class="button" href="/" style="margin-right: 20px;">Cerca una casa</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="button" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </section>
</nav>
