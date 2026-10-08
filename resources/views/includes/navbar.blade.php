<nav class="navbar navbar-expand-lg navbar-dark shadow" style="background-color: #25c72f;">
    <div class="container-fluid px-4">

        <!-- LOGO Y NOMBRE -->
        <div class="navbar-brand d-flex align-items-center">
            <a href="{{ url('/') }}" class="me-2 text-decoration-none">
                <span class="bg-white rounded p-1 d-inline-flex align-items-center justify-content-center">
                    <img src="https://pautonoticias.com/sites/default/files/Article/sena-colombia-logo-green39a900png-20250120.png"
                        alt="Logo SENA" width="40" height="40" class="img-fluid">
                </span>
            </a>

            <a href="{{ url('/') }}" class="text-decoration-none">
                <span class="text-white fw-bold">Admin SENA</span>
            </a>
        </div>

        <!-- BOTÓN MÓVIL -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- CONTENIDO -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-lg-center gap-2 ms-lg-3">
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="{{ url('/about') }}">Quiénes Somos</a>
                </li>

                <!-- MENÚ ADMINISTRACIÓN (Siempre visible) -->
                <li class="nav-item dropdown" id="adminDropdownNav">
                    <a class="btn btn-light dropdown-toggle text-dark fw-medium px-3" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Administración
                    </a>
                    <ul class="dropdown-menu shadow-sm border-0 mt-2">
                        <li><a class="dropdown-item py-2" href="{{ route('areas.index') }}">Lista Áreas</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('trainingcenters.index') }}"> Lista Centros</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('computer.index') }}"> Lista Computadores</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('teacher.index') }}"> Lista Instructores</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('course.index') }}"> Lista Cursos</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('apprentice.index') }}"> Lista Aprendices</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('programs.index') }}"> Lista Programas</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('environments.index') }}"> Lista Ambientes</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('announcements.index') }}"> Lista Anuncios</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('offers.index') }}"> Lista Ofertas</a></li>
                        <li><a class="dropdown-item py-2" href="{{ route('cohorts.index') }}"> Lista Ficha</a></li>
                    </ul>
                </li>
            </ul>

            <!-- BUSCADOR -->
            <form action="{{ route('apprentice.index') }}" method="GET" class="d-flex align-items-center my-2 my-lg-0 me-lg-4" role="search">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">🔍</span>
                    <input class="form-control border-start-0" type="search" name="search" placeholder="Buscar..." aria-label="Buscar" value="{{ request('search') }}">
                    <button class="btn btn-light text-success fw-bold border" type="submit">Buscar</button>
                </div>
            </form>

            <!-- PERFIL / MENÚ DE USUARIO DIRECTO -->
            <div id="auth-nav-container">
                <div class="dropdown ms-lg-2 my-2 my-lg-0">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="rounded-circle bg-white text-success fw-bold d-flex align-items-center justify-content-center shadow-sm me-2" style="width: 38px; height: 38px; border: 2px solid rgba(255,255,255,.8);">
                            👤
                        </div>
                        <span class="fw-bold text-white d-none d-md-inline" id="user-display-name">Administrador</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2" aria-labelledby="profileDropdown" style="border-radius: 12px;">
                        <li>
                            <div class="px-3 py-2 border-bottom">
                                <p class="fw-bold mb-0 text-dark small" id="menu-user-name">Administrador</p>
                                <small class="text-muted" id="menu-user-email">admin@sena.edu.co</small>
                            </div>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="{{ url('/profile') }}">👤 Mi Perfil</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Carga los datos del localStorage si existen, o muestra los valores por defecto
        const userSession = JSON.parse(localStorage.getItem('user_session'));

        if (userSession) {
            if (userSession.name) {
                document.getElementById('user-display-name').textContent = userSession.name;
                document.getElementById('menu-user-name').textContent = userSession.name;
            }
            if (userSession.email) {
                document.getElementById('menu-user-email').textContent = userSession.email;
            }
        }
    });
</script>