<div class="overlay">
    <div id="sticky-anchor"></div>
    <nav id="tf-menu" class="navbar navbar-inverse">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <a class="navbar-brand logo hidden-xs hidden-sm hidden-md" href="{{ url('/') }}"><i class="fa fa-money fa-custom"></i> Consumer Decision Maker</a>
              <a class="navbar-brand logo visible-xs visible-sm visible-md" href="/"><i class="fa fa-money fa-custom"></i> ConDr</a>
            </div>

            <div id="menu" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="hidden-sm"><a href="{{ url('home') }}">Home</a></li>
                <li><a href="{{ url('about') }}">About</a></li>
                <li><a href="{{ route('products.listproducts') }}">Products</a></li>
                <li><a href="{{ route('groups.listgroups') }}">Groups</a></li>
                @if(!Auth::guest())
                  <li><a href="{{ route('products.add') }}">Add product</a></li>
                @endif
                <li><a href="{{ url('statistics') }}">Statistics</a></li>
                {{-- <li class="hidden-sm"><a href="{{ url('contact') }}">Contact</a></li> --}}

                <!-- Authentication Links -->
                @if (Auth::guest())

                    <li><a href="{{ route('login') }}" class='btn btn-primary my-btn my-btn-dropdown'>Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else

                    <li class="dropdown">
                      <a href="#" class="btn btn-primary my-btn my-btn-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My profile <span class="caret"></span></a>
                      <ul class="dropdown-menu my-profile">
                        <li><a href="{{ route('my.account.index') }}">My Account</a></li>
                        <li><a href="{{ route('my.preferences.listpreferences') }}">My Preferences</a></li>
                        <li><a href="{{ route('my.products.listproducts') }}">My Products</a></li>
                       <li><a href="{{ route('my.groups.listgroups') }}">My Groups</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                        </li>
                      </ul>
                    </li>
                @endif

              </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->

    </nav>
</div>
