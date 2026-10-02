<!-- Bootstrap Icons (por si el layout aún no lo carga) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    .site-footer {
        position: relative;
        margin-top: 4rem;
        color: #fff;
        background:
            radial-gradient(900px 300px at 100% 0%, rgba(57, 169, 0, 0.16), transparent 60%),
            linear-gradient(180deg, #00324d 0%, #002438 100%);
    }

    /* Franja verde SENA arriba */
    .site-footer::before {
        content: "";
        position: absolute;
        inset: 0 0 auto 0;
        height: 4px;
        background: linear-gradient(90deg, #39A900, #00e676 50%, #39A900);
    }

    .site-footer .brand-mark {
        width: 46px;
        height: 46px;
        border-radius: 14px;
        background: #39A900;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        box-shadow: 0 8px 20px rgba(57, 169, 0, 0.35);
    }

    .site-footer .footer-title {
        font-size: 0.95rem;
        font-weight: 700;
        letter-spacing: 0.02em;
        margin-bottom: 1rem;
        color: #fff;
    }

    .site-footer .footer-link {
        color: rgba(255, 255, 255, 0.65);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.2rem 0;
        transition: color 0.25s ease, transform 0.25s ease;
    }

    .site-footer .footer-link i { color: #39A900; font-size: 0.8rem; }

    .site-footer .footer-link:hover {
        color: #fff;
        transform: translateX(4px);
    }

    .site-footer .footer-link:focus-visible,
    .site-footer .to-top:focus-visible {
        outline: 2px solid #00e676;
        outline-offset: 3px;
        border-radius: 6px;
    }

    .site-footer .contact-row {
        display: flex;
        gap: 0.7rem;
        color: rgba(255, 255, 255, 0.65);
        font-size: 0.9rem;
        margin-bottom: 0.6rem;
    }

    .site-footer .contact-row i { color: #39A900; margin-top: 2px; }

    .site-footer .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.55);
        font-size: 0.85rem;
    }

    .site-footer .to-top {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.25);
        background: transparent;
        color: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: background 0.25s ease, transform 0.25s ease;
    }

    .site-footer .to-top:hover { background: #39A900; border-color: #39A900; transform: translateY(-3px); }

    @media (prefers-reduced-motion: reduce) {
        .site-footer .footer-link, .site-footer .to-top { transition: none; }
    }
</style>

<footer class="site-footer pt-5">
    <div class="container pt-2">
        <div class="row gy-5">

            <!-- Identidad del sistema -->
            <div class="col-lg-5 col-md-6">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="brand-mark"><i class="bi bi-mortarboard-fill"></i></span>
                    <div>
                        <h5 class="fw-bold mb-0 fs-4">Admin <span style="color: #39A900;">SENA</span></h5>
                        <small class="text-white-50">Panel de Administración Académica</small>
                    </div>
                </div>
                <p class="text-white-50 small mb-3" style="max-width: 340px;">
                    Gestiona programas, aprendices, instructores, fichas y ambientes de formación desde un solo lugar.
                </p>
            </div>

            <!-- Enlaces rápidos -->
            <div class="col-lg-3 col-md-6 col-6">
                <h6 class="footer-title">Explora</h6>
                <ul class="list-unstyled mb-0">
                    <li><a class="footer-link" href="{{ url('/') }}"><i class="bi bi-chevron-right"></i> Inicio</a></li>
                    <li><a class="footer-link" href="{{ url('/about') }}"><i class="bi bi-chevron-right"></i> Quiénes somos</a></li>
                    <li><a class="footer-link" href="{{ url('/') }}#ofertas"><i class="bi bi-chevron-right"></i> Oferta educativa</a></li>
                    <li><a class="footer-link" href="{{ url('/') }}#anuncios"><i class="bi bi-chevron-right"></i> Anuncios</a></li>
                    @guest
                        <li><a class="footer-link" href="{{ url('/login') }}"><i class="bi bi-chevron-right"></i> Iniciar sesión</a></li>
                    @endguest
                </ul>
            </div>

            <!-- Contacto / centro -->
            <div class="col-lg-4 col-md-6 col-6">
                <h6 class="footer-title">Centro de formación</h6>
                <div class="contact-row">
                    <i class="bi bi-geo-alt-fill"></i>
                    <span>Popayán, Cauca<br>Colombia</span>
                </div>
                <div class="contact-row">
                    <i class="bi bi-clock-fill"></i>
                    <span>Lunes a viernes<br>7:00 am – 6:00 pm</span>
                </div>
            </div>

        </div>

        <!-- Barra inferior -->
        <div class="footer-bottom mt-5 py-4 d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
            <div class="text-center text-md-start">
                &copy; {{ date('Y') }} <strong class="text-white">Camilo</strong>. Todos los derechos reservados.
            </div>
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="to-top" aria-label="Volver arriba"
                        onclick="window.scrollTo({ top: 0, behavior: 'smooth' })">
                    <i class="bi bi-arrow-up"></i>
                </button>
            </div>
        </div>
    </div>
</footer>