<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ayam Geprek Pejuang</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="icon" href="/pic/AGP.png" type="image/png"/>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Styles -->
    <link href="css/logo-nav.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

</head>
<body>
    <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-red">
            <div class="container">
              <a class="navbar-brand" href="/">
                <img src="/pic/AGP.png" width="92" height="76" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mr-auto">
                @guest
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('pesan_online') }}">Pesan Online
                      <span class="sr-only">(current)</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Booking</a>
                  </li>
                @else
                    @if (Route::currentRouteName() != 'login')
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('pesan_online') }}">Pesan Online
                          <span class="sr-only">(current)</span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('booking') }}">Booking</a>
                      </li>
                    @endif
                @endguest

                </ul>
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item active" style="padding-left: 10px; padding-right: 30px;">
                        <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                    </li>
                    <li class="nav-item active" style="padding-left: 10px; padding-right: 30px;">
                        <a class="nav-link" href="{{route('login')}}">Masuk</a>
                    </li> 
                    @else
                    <li class="nav-item active" style="padding-left: 10px; padding-right: 30px;">
                        <a class="nav-link" href="{{ route('lokasi') }}">Lokasi AGP</a>
                    </li>
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
                    @endguest
                </ul>
              </div>
            </div>
          </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @if(session('info'))
<div id="test" class="modal">
  <img src="/pic/crosscheck.png" width="56" height="56" alt="" style="display: block; margin-left: auto; margin-right: auto;">
  <p> {{ session('info') }}</p>
</div>
<script>
$("#test").modal('show');
</script>
@endif
    <script src="{{ asset('/js/app.js') }}"></script>
</body>

</html>
