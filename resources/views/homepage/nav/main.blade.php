<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top"><a href="#" class="navbar-brand">IBU</a>
      <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><span></span><span></span><span></span></button>
      <div id="navbarSupportedContent" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto align-items-start align-items-lg-center">
          <li class="nav-item"><a href="#about-us" class="nav-link link-scroll"></a></li>
          <li class="nav-item"><a href="#features" class="nav-link link-scroll"></a></li>
          <li class="nav-item"><a href="#testimonials" class="nav-link link-scroll"></a></li>
          <li class="nav-item"><a href="{{route('topics')}}" class="nav-link">Topics</a></li>
        </ul>
        <div class="navbar-text">
        @guest
        <a href="{{route('login')}}" class="btn btn-primary navbar-btn btn-shadow btn-gradient">Log In</a>
        @else
        <a href="{{route('home')}}" class="btn btn-primary navbar-btn btn-shadow btn-gradient">Dashboard</a>
        @endguest
        </div>
      </div>
    </nav>
  </header>
