<div class="navbar">
    <div class="container nav-container">
        <input class="checkbox" type="checkbox" name="" id="" />
        <div class="hamburger-lines">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
        </div>
        <div class="menu-items">
            <li class="logo flex">
                <img style="height: 50px; width: 50px;" src="{{ asset('img/airbnb-logo.png') }}" alt="tag">
                <span class="align-center">BoolBnB</span>
            </li>
            <ul class="navbar-ul">
                <li class="navbar-li"><a href="/admin/dashboard">Dashboard</a></li>
                <li class="navbar-li"><a href="/admin/apartments">I tuoi appartamenti</a></li>
                <li class="navbar-li"><a href="#">Statistiche</a></li>
                <li class="navbar-li"><a href="{{ route('admin.message') }}">Messaggi</a></li>
            </ul>
        </div>
    </div>
</div>
