<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    {{-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> --}}
                    <a class="p-2 text-dark" href="{{ route('home') }}">Home</a>           
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link" href="contact">Contact Us</a> --}}
                    <a class="p-2 text-dark" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link" href="about">About Us</a> --}}
                    <a class="p-2 text-dark" href="{{ route('posts.index') }}">Blog Posts</a>
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link" href="customers">Customers</a> --}}
                    <a class="p-2 text-dark" href="{{ route('posts.create') }}">Add Blog Post</a>
                </li>
            </ul>
            

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                {{-- @guest
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest --}}
                @guest
                    @if (Route::has('register'))
                       <a class="p-2 text-dark" href="{{ route('register') }}">Register</a> 
                    @endif
                    <a class="p-2 text-dark" href="{{ route('login') }}">Login</a>
                @else
                    <a class="p-2 text-dark"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                     href="{{ route('logout') }}">Logout ({{Auth::user()->name}})</a>
                     <form id="logout-form" action="{{route('logout')}}" 
                            method="POST" style="display:none;">
                        @csrf
                     </form>
                @endguest
            </ul>
        </div>
    </div>
</nav>