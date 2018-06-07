<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Route::has('login'))
                <!-- Authentication Links -->
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <!--<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>-->
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>