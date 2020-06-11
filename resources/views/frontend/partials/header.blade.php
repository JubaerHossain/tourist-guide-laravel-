<nav class="navbar navbar-expand-sm bg-nav navbar-light ftco_navbar">
    <div class="container">
        
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-0 social">                
                 <li class="nav-item clock"><a href="mailto:#"><i class="far fa-envelope"></i> <b class="pl-2">info@touristguide.xyz</b></a></li>
            </ul>
            <ul class="navbar-nav ml-auto social">                
                 <li class="nav-item clock"><i class="far fa-clock"></i> <b class="pl-2">09:00<span>am</span> — 10:00<span>pm</span></b></li>
            </ul>
            <ul class="navbar-nav ml-auto social">                
                 <li class="nav-item clock"><i class="fa fa-phone"></i> <b class="pl-2">+8801716967050</b></li>
            </ul>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto social">                
                 <a href="#" class="nav-link facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>                 
              <li class="nav-item">
                 <a href="#" class="nav-link twitter" target="_blank"><i class="fab fa-twitter"></i></a>
              </li>
              <li class="nav-item">
                 <a href="#" class="nav-link youtube" target="_blank"><i class="fab fa-youtube"></i></a>
              </li>
              <li class="nav-item">
                 <a href="#" class="nav-link linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>
              </li>
            </ul>
          </div>
      </div>

  </nav>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
<div class="container">
 <a class="navbar-brand" href="{{route('front.home')}}">Tourist Guide</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="oi oi-menu"></span> Menu
  </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="{{route('front.home')}}" class="nav-link">Home</a></li>
       {{--  @if (Auth::user())  --}}
        @if (@Auth::user()->user_role->role_id != 2)
        <li class="nav-item "><a href="{{route('front.tourist_guide')}}" class="nav-link"> Become a tourist guide</a></li>
        @endif
       {{--  @endif --}}
        <li class="nav-item"><a href="{{route('front.restaurants')}}" class="nav-link">Restaurants</a></li>
        <li class="nav-item"><a href="{{route('front.hotel')}}" class="nav-link">Hotels</a></li> 
        
          @if (@Auth::user()->user_role->role_id == 3 || @Auth::user()->user_role->role_id == 2)
        <li class="nav-item cta dropdown"><a href="#"  class="nav-link"><span>
          <i class="fas fa-user pr-1"></i> <i class="fa fa-caret-down"></i>
            <div class="dropdown-menu m">
                @if (Auth::user()->user_role->role_id == 3)
                <a class="dropdown-item" href="{{route('customer.profile')}}">My account</a>
                @endif
                @if (Auth::user()->user_role->role_id == 2)
                <a class="dropdown-item" href="{{route('front.guide_dashboard')}}">Dashboard</a>
                @endif
                <a class="dropdown-item" href="{{ __('Logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <span class="icon"></span>
                    Log Out
                </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
            </div>
           </span></a>
        </li>
        @else         
          <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
          <li class="nav-item"><a href="{{route('register')}}" class="nav-link">Sign up</a></li>
        @endif
        {{-- <span class="nav-item cta"><a href="contact.html" class="nav-link"><span>Add listing</span></a></li> --}}
      </ul>
    </div>
</div>
</nav>