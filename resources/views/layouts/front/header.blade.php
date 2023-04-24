<header>

    <nav class="collapsible-nav ml-auto mr-3 " id="collapsible-nav">
        <a href="{{ route("home") }}" class="nav-link {{ Route::is('home') ? "active" : "" }}">ANASAYFA</a>
        <a href="{{ route("resume") }}" class="nav-link {{ Route::is('resume') ? "active" : "" }}">ÖZGEÇMİŞ</a>
        <a href="{{ route("portfolio") }}" class="nav-link {{ Route::is('portfolio') ? "active" : "" }}">PORTFOLYO</a>
        <a href="{{ route("contact") }}" class="nav-link {{ Route::is('contact') ? "active" : "" }}">İLETİŞİM</a>
    </nav>
    <button class="btn btn-menu-toggle btn-white rounded-circle" data-toggle="collapsible-nav"
            data-target="collapsible-nav"><img src="{{ asset("assets/front/images/hamburger.svg")}}" alt="hamburger"></button>
</header>
