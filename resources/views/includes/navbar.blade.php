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

                <!-- MENÚ ADMINISTRACIÓN (Controlado por servidor o visible si hay sesión) -->
                <li class="nav-item dropdown d-none" id="adminDropdownNav">
                    <a class="btn btn-light dropdown-toggle text-dark fw-medium px-3" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Administración
                    </a>
                    <ul class="dropdown-menu shadow-sm border-0 mt-2">
                        <li><a class="dropdown-item py-2" href="{{ route('areas.index') }}">Lista Áreas</a></li>
                    </ul>
                </li>
            </ul>

           

            <!-- PERFIL / INICIAR SESIÓN (Manejado por JS leyendo localStorage) -->
            <div id="auth-nav-container"></div>

        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        checkAuthStatus();
    });

    function checkAuthStatus() {
        const authContainer = document.getElementById('auth-nav-container');
        const adminDropdown = document.getElementById('adminDropdownNav');

        const userSession = JSON.parse(localStorage.getItem('user_session'));
        const userRole = localStorage.getItem('user_role') || (userSession ? userSession.role : null);

        if (userSession) {
            // Mostrar Administración si es admin
            if (adminDropdown && (userRole === 'admin' || userRole === 'administrador')) {
                adminDropdown.classList.remove('d-none');
            }

            const name = userSession.name || 'Usuario';
            const email = userSession.email || '';

            // Mostrar el icono del perfil
            authContainer.innerHTML = `
                <div class="dropdown ms-lg-2 my-2 my-lg-0">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="rounded-circle bg-white text-success fw-bold d-flex align-items-center justify-content-center shadow-sm me-2" style="width: 38px; height: 38px; border: 2px solid rgba(255,255,255,.8);">
                            👤
                        </div>
                        <span class="fw-bold text-white d-none d-md-inline">${name}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg mt-2" aria-labelledby="profileDropdown" style="border-radius: 12px;">
                        <li>
                            <div class="px-3 py-2 border-bottom">
                                <p class="fw-bold mb-0 text-dark small">${name}</p>
                                <small class="text-muted">${email}</small>
                            </div>
                        </li>
                        <li>
                            <a class="dropdown-item py-2" href="{{ url('/profile') }}">👤 Mi Perfil</a>
                        </li>
                        <li>
                            <button onclick="logout()" class="dropdown-item text-danger fw-bold py-2 w-100 text-start">
                                <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                            </button>
                        </li>
                    </ul>
                </div>
            `;
        } else {
            if (adminDropdown) adminDropdown.classList.add('d-none');

            authContainer.innerHTML = `
                <a href="{{ url('/login') }}" class="btn btn-light text-success fw-bold px-3 rounded-3 shadow-sm d-flex align-items-center gap-1">
                    <i class="bi bi-person-circle"></i> Iniciar Sesión
                </a>
            `;
        }
    }

    function logout() {
        localStorage.removeItem('user_session');
        localStorage.removeItem('user_role');
        localStorage.removeItem('isLoggedIn');
        checkAuthStatus();
        window.location.href = "{{ url('/login') }}";
    }
</script>