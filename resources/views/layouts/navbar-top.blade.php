<div class="pos-rel">
    <section>
        <div class="nav-bar">
            <ul class="nav-ul">
                <li class="nav-li"><a href=""></a>I tuoi appartamenti</li>
                <li class="nav-li"><a href=""></a>Statistiche</li>
                <li class="nav-li"><a href=""></a>Sponsorship</li>
            </ul>
            <div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="button" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </section>
</div>
