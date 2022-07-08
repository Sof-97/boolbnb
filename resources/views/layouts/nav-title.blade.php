<nav>
    <section>
        <div class="title flex">
            <div>
                <img style="height: 50px; width: 50px;" src="{{ asset('img/airbnb-logo.png') }}" alt="tag">
                <span style="color: $color-accent">BoolBnB</span>
            </div>
            <div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="button" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </section>
</nav>

<style>
    @import "../../resources/sass/app.scss";
</style>


