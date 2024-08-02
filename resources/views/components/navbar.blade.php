<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary py-3 mb-3">
    <div class="container">
        <a class="navbar-brand" href="{{ @route('pets.index') }}">Petstore</a>
        <button
          data-mdb-collapse-init
          class="navbar-toggler"
          type="button"
          data-mdb-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02"
          aria-expanded="false" aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ @request()->routeIs('pets.index') ? 'active' : '' }}" href="{{ @route('pets.index') }}">Pets list</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ @request()->routeIs('pets.create') ? 'active' : '' }}" href="{{ @route('pets.create') }}">Create new pet</a>
                </li>
            </ul>
            <form action="{{ route('pets.findPetsById') }}" method="GET" class="d-flex input-group w-auto">
                @csrf

                <input type="search" class="form-control" placeholder="Search pets by ID" aria-label="Search" name="id" />
                <button data-mdb-ripple-init class="btn btn-outline-primary" type="submit" data-mdb-ripple-color="dark">
                    Search
                </button>
            </form>
        </div>
    </div>
</nav>
