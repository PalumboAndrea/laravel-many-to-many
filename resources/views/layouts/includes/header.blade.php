<link rel="stylesheet" href="{{ mix('/scss/app.scss') }}">

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm navbar-container">
    <div class="container">
        <h2 class="me-2 my-0 portfolio-title">
            <a href="{{ route('admin.dashboard') }}" class="text-decoration-none" style="color:black">Andrea Palumbo</a>
        </h1>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link admin-name {{ str_contains(Route::current()->getName(), 'posts') ? 'active' : ''}}" href="{{ route('admin.posts.index') }}">Posts List</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link admin-name {{ str_contains(Route::current()->getName(), 'types') ? 'active' : ''}}" href="{{ route('admin.types.index') }}">Types List</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link admin-name {{ str_contains(Route::current()->getName(), 'technologies') ? 'active' : ''}}" href="{{ route('admin.technologies.index') }}">Technologies List</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle admin-name" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                        <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
