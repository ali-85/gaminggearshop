<nav class="navbar sticky-top navbar-expand-lg navbar navbar-dark bg-primary transparent shadow-sm">
  <a class="navbar-brand" href="{{ route('product.index') }}" style="font-family:Roboto;">GamingGear</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      @if(Auth()->check() && Auth::user()->role == 1)
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.allproduct') }}"><i class="far fa-fw fa-list-alt"></i> Manage Products
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.slider') }}"><i class="fas fa-fw fa-tv"></i> Manage Slider
        </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.order') }}"><i class="fas fa-fw fa-clipboard-list"></i> Manage Orders
        </a>
        </li>
      @endif
    <form class="form-inline" action="{{ route('product.search') }}">
      <input id="searchNav" class="form-control" type="search" placeholder="Search" aria-label="Search" name="keyword">
      <button class="btn btn-outline-white btn-md my-2 my-sm-0" type="submit">Search</button>
    </form>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('product.cart') }}"><i class="fas fa-fw fa-shopping-cart" aria-hidden="true"></i> Shopping cart 
        <span class="badge badge-pill badge-light">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
      </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-user" aria-hidden="true"></i> User Management
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @if(Auth::check())
            <a class="dropdown-item" href="{{ route('user.profile') }}">My Profile</a>
            <a class="dropdown-item" href="{{ route('user.order') }}">My Order</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
          @else
            <a class="dropdown-item" href="{{ route('user.signin') }}">Sign In</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('user.signup') }}">Sign Up</a>
          @endif
        </div>
      </li>
    </ul>
  </div>
</nav>