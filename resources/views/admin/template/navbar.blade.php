<nav class="navbar navbar-expand-md background-blue shadow-lg">
    <div class="container-fluid">

        <div>
            <a class="navbar-brand text-white merriweather-regular" href="">Admin Page</a>
        </div>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white merriweather-regular"href="{{ url('admin/reservasi', []) }}">Reservasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white merriweather-regular" href="{{ url('admin/unit', []) }}">Unit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white merriweather-regular" href="{{ url('admin/fasilitas', []) }}">Fasilitas</a>
                </li>


            </ul>

        </div>

        <div class="nav-item">
            @if (Auth::check())
            <a href="{{ url('/logout') }}" class="nav-link text-white merriweather-regular"> Log Out <i class="bi bi-box-arrow-right"></i></a>
            @else
            <a href="{{ url('/login') }}" class="nav-link text-white merriweather-regular">Log In <i class="bi bi-box-arrow-left"></i></a>
            @endif
        </div>

    </div>
  </nav>
