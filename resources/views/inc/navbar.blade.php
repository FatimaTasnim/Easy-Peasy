<nav class="navbar navbar-expand-sm navbar-light" style="background-color: #7FFFD4; margin-bottom:10px;">
  <div class = "container">
  <a class="navbar-brand" href="/"><span style="color:#7D0541"><b>Easy</b></span>
    <span style="color:#057D41"><b>Peasy</b></span>
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/sells">Books for Sell</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="/posts">Reviews</a>
      </li>
    </ul>
    <ul class="navbar-nav">  
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/about') }}">About Us</a>
        </li>
    </ul>
    <!-- Right Side -->
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
      @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/dashboard">
                    Dashboard
                  </a>
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
      @endguest
  </ul>
  </div>
  </div>
</nav>

 