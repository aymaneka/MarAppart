 

 <nav class="navbar navbar-expand-lg navbar-light bg-nav top-fixed ">
  <div class="container-fluid ">
    <a class="AppartMar mx-4 " href="#">MarAppart</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
      <div class="navbar-nav w-100 justify-content-around">
        <div class="d-lg-flex d-md-block justify-content-around w-50 ">
        <a class=" items-navbar nav-link" aria-current="page" href="/">Home</a>
        <a class="items-navbar nav-link" href="{{route('allproperties.index')}}">Filter</a>
        <a class="items-navbar nav-link" href="contact">Contact</a>
        <a class="items-navbar nav-link" href="a_propos">A propos</a>
        </div>
        <div class="d-lg-flex d-md-block justify-content-end w-25  ">
    @if (Route::has('login'))
                    @auth
                            <a href="{{ route('dashboard')}}" class="items-navbar nav-link">Dashboard</a>
                    @else
                            <a href="{{ route('login') }}" class="items-navbar nav-link">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="items-navbar nav-link">Register</a>
                        @endif
                    @endauth
            @endif
      </div>
      </div>
    </div>
    @if (Route::has('login'))
    @auth
    <div class="me-5 dropdown">
      <a class="btn btn-secondary dropdown-toggle px-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{auth()->check() ? Auth::user()->name : '' }}
      </a>
    
      <ul class="dropdown-menu">
        <li> <a class="dropdown-item " href="{{route('profile.show')}}">Profile</a></li>
        <li> <form method="post" action="{{route('logout')}}">
          @csrf
       <button type="submit" class="dropdown-item">Logout</button>
       </form></li>
      </ul>
    </div>
    @endauth
    @endif
  </div>
</nav> 


 