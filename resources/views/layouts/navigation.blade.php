<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href="#">Laraclass</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ request()->routeIs('subject.*') ? 'active' : '' }} dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="subjectDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Matières
                    </a>
                    <div class="dropdown-menu" aria-labelledby="subjectDropdown">
                        <a class="dropdown-item" href="{{ route('subject.index')}}">Voir tous</a>
                        <a class="dropdown-item" href="{{ route('subject.create') }}">Ajouter</a>
                    </div>
                </li>
                <li class="nav-item {{ request()->routeIs('level.*') ? 'active' : '' }} dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="levelDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Niveaux
                    </a>
                    <div class="dropdown-menu" aria-labelledby="levelDropdown">
                        <a class="dropdown-item" href="{{ route('level.index')}}">Voir tous</a>
                        <a class="dropdown-item" href="{{ route('level.create') }}">Ajouter</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
