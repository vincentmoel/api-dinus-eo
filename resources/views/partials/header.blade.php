<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
            <img src="/assets/img/logo.svg" alt="">
            <span class="color-gia ms-2" style="font-family: var(--font-secondary);">GIA Pringgading</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>

                <li><a class="{{ (request()->segment(1) == '') ? 'active' : '' }}" href="/">Home</a></li>
                @auth
                    <li><a class="{{ (request()->segment(1) == 'events') ? 'active' : '' }}" href="/events">Events</a></li>
                    <li><a class="{{ (request()->segment(1) == 'rooms') ? 'active' : '' }}" href="/rooms">Rooms</a></li>
                    <li><a class="{{ (request()->segment(1) == 'buildings') ? 'active' : '' }}" href="/buildings">Buildings</a></li>
                @endauth
                <li><a class="" href="/schedules">Schedules</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle d-none"></i>
        </nav><!-- .navbar -->
        
        @auth
        <form action="/logout" method="post" class="mb-0">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>
        @else
            <a class="btn-getstarted" href="/login">Login</a>

        @endauth

    </div>
</header>