<div class="container fixed-top bg-white justify-content-between nav border-bottom">
    <div>
        <ul class="nav d-flex mt-1">
            <li class="nav-item">
                <div class="d-flex flex-row bd-highlight">
                    <h1><a class="nav-link text-black" href="{{ route('home') }}">@yield('page_title')</a></h1>
                </div>
            </li>
        <ul>
    </div>
    <div>
        <!-- Right Side Of Navbar -->
        <ul class="navbar d-flex mt-1 list-unstyled">
            <!-- Authentication Links -->
            @guest
            <!-- Guest -->
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link text-black" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-black" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
            <!-- Logged In -->
            @if(Auth::user()->id == 1)
                <a class="nav-link text-black" href="{{ route('customer') }}">{{ __('Customer') }}</a>
                <a class="nav-link text-black" href="{{ route('vehicle') }}">{{ __('Vehicle') }}</a>
                <a class="nav-link text-black" href="{{ route('order') }}">{{ __('Order') }}</a>
            @endif
                <li class="dropdown">
                    <a id="navbarDropdown" class="nav-link nav-item dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @if(Auth::user()->id == 1)
                            {{ Auth::user()->email }}
                        @elseif(Auth::user()->id > 1)
                            {{ optional(Auth::user()->customer)->name }}
                        @endif
                    </a>

                    <div class="dropdown-menu dropdown-menu-right text-black" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-black" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        
                        <form id="admin-form" action="{{ route('dashboard.post') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        <form id="profile-form" action="{{ route('profile.post') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
    </div>
</div>
<br>
<br>
