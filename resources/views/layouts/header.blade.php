<header role="header" class="container-fluid headroom header--fixed px-0">
    <div class="container text-center text-xl-left align-middle">
        <a href="#mmenu" class="mobile-menu d-xl-none"><i class="mdi mdi-sort-variant mdi-24px text-info"></i></a>
        <a href="/">
            <img class="logo" src="/img/logo.svg?v4" alt="BoxToShop" />
            <img class="logo white" src="/img/logo.white.svg?v4" alt="BoxToShop" />
        </a>
        <a href="#account" class="mobile-account d-xl-none" data-target=".modal-account" data-toggle="modal"><i class="mdi mdi-account mdi-24px text-info"></i></a>
        <nav id="mmenu" class="menu" role="navigation">
            <ul class="float-right d-none d-xl-block">
                <li><a class="btn active" href="{{ route('app.send-parcels') }}">Send a parcel</a></li>
                <li><a class="btn" href="/static.php">How it works ?</a></li>
                <li><a class="btn" href="/static.php">Aide</a></li>
                <li class="menu-languages">
                    <span class="d-xl-none">Langues</span>
                    <ul>
                        <li><a href="#"><span class="d-none d-xl-block">FR</span><span class="d-xl-none">Français</span></a></li>
                        <li><a href="#"><span class="d-none d-xl-block">EN</span><span class="d-xl-none">English</span></a></li>
                    </ul>
                </li>
                <li class="menu-account">
                    <span class="d-xl-none">My account</span>
                    @if (Auth::check())
                        
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('app.list-parcels') }}">My parcels</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                            </div>
                        </div>
                    @else

                        <ul>
                            <li><a class="btn btn-info" href="{{route('app.login.show')}}">Log in</a></li>
                            <li><a class="btn btn-raised btn-info" href="{{route('app.register.show')}}">Create an account</a></li>
                        </ul>
                    @endif
                </li>
            </ul>
        </nav>
        
    </div>
</header>