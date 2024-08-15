<nav class="navbar navbar-expand-sm navbar-dark bg-teal-light text-teal-dark">
    <div class="container-fluid py-0">
    <a class="navbar-brand fs-4 text-teal-dark fw-bolder" href="">
    {{Auth()->user()->library}}

</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto me-3">
            <li class="nav-item">
                <a class="nav-link text-teal-dark" href="{{route('user.index')}}">Print</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-teal-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profile
                </a>
                <ul class="dropdown-menu me-auto" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item text-teal-dark" href="{{route('profile.edit')}}">Profile</a></li>
                  <li><a class="dropdown-item text-teal-dark" href="#">Change Password</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                        class="text-teal-dark nav-link" style="cursor: pointer !important;">
                        Logout
                </a>
                </form>

              </li>
        
        </ul>
        </div>
    </div>
  </nav>