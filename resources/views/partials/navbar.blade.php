
<nav class="navbar navbar-expand-lg bg-danger navbar-dark">
    <div class="container bg-danger navbar-light" >
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse navbar-light" id="navbarNav">
        <ul class="navbar-nav navbar-light">
          <li class="nav-item">
            <a class="nav-link {{ Request()->is('') ? 'active' : ''}}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request()->is('about') ? 'active' : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request()->is('blog') ? 'active' : '' }}" href="/blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{  Request()->is('categories') ? 'active' : ''  }} " href="/categories">Categories</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
        @auth()
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                    @csrf
                <button type="submit" class="dropdown-item text-danger">Logout</button>
            </form>
            </li>
            </ul>
          </li>
        @else
            <li class="nav-item navbar-light">
                <a class="nav-link active btn" href="/login"> <i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
        @endauth
    </ul>
</div>
    </div>
  </nav>
