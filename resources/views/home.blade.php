@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --sena-green: #39A900;
            --sena-green-dark: #2b8000;
            --sena-accent: #00e676;
            --ink: #0b1220;
            --ink-soft: #111a2e;
            --muted: #64748b;
            --line: #e5eaf1;
            --surface: #f6f8fb;
        }

        html,
        body {
            overflow-x: hidden;
        }

        body {
            background: var(--surface);
        }

        /* Rompe el contenedor del layout y ocupa todo el ancho de la pantalla */
        .home-bleed {
            position: relative;
            left: 50%;
            right: 50%;
            width: 100vw;
            margin-left: -50vw;
            margin-right: -50vw;
            background: var(--surface);
        }

        /* ───────── HERO ───────── */
        .hero {
            position: relative;
            background: var(--ink);
            overflow: hidden;
        }

        .hero .carousel-item {
            height: 680px;
        }

        .hero .slide-bg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.12);
            transition: transform 8s ease-out;
        }

        .hero .carousel-item.active .slide-bg {
            transform: scale(1);
        }

        .hero .shade {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(900px 500px at 15% 40%, rgba(57, 169, 0, .28), transparent 60%),
                linear-gradient(90deg, rgba(11, 18, 32, .96) 0%, rgba(11, 18, 32, .78) 45%, rgba(11, 18, 32, .35) 100%);
        }

        .hero .content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            align-items: center;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .45rem 1rem;
            border-radius: 999px;
            font-size: .78rem;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: #eafff0;
            background: rgba(57, 169, 0, .18);
            border: 1px solid rgba(0, 230, 118, .35);
            backdrop-filter: blur(8px);
        }

        .hero h1 {
            font-weight: 800;
            letter-spacing: -.03em;
            line-height: 1.02;
            color: #fff;
            font-size: clamp(2.4rem, 5.5vw, 4.4rem);
        }

        .hero h1 em {
            font-style: normal;
            background: linear-gradient(90deg, var(--sena-accent), #b6ff5c);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero p.lead {
            color: rgba(255, 255, 255, .78);
            max-width: 560px;
            font-size: 1.15rem;
        }

        /* animación de entrada del texto en el slide activo */
        .hero .carousel-item .reveal {
            opacity: 0;
            transform: translateY(24px);
        }

        .hero .carousel-item.active .reveal {
            animation: rise .9s cubic-bezier(.2, .8, .2, 1) forwards;
        }

        .hero .carousel-item.active .reveal:nth-child(2) {
            animation-delay: .12s;
        }

        .hero .carousel-item.active .reveal:nth-child(3) {
            animation-delay: .24s;
        }

        .hero .carousel-item.active .reveal:nth-child(4) {
            animation-delay: .36s;
        }

        @keyframes rise {
            to {
                opacity: 1;
                transform: none;
            }
        }

        .btn-sena {
            background: linear-gradient(135deg, var(--sena-green), var(--sena-green-dark));
            color: #fff;
            border: 0;
            font-weight: 700;
            padding: .9rem 1.6rem;
            border-radius: 14px;
            box-shadow: 0 10px 28px rgba(57, 169, 0, .35);
            transition: transform .25s, box-shadow .25s;
        }

        .btn-sena:hover {
            color: #fff;
            transform: translateY(-3px);
            box-shadow: 0 16px 36px rgba(57, 169, 0, .5);
        }

        .btn-ghost {
            color: #fff;
            font-weight: 600;
            padding: .9rem 1.6rem;
            border-radius: 14px;
            background: rgba(255, 255, 255, .1);
            border: 1px solid rgba(255, 255, 255, .35);
            backdrop-filter: blur(10px);
            transition: all .25s;
        }

        .btn-ghost:hover {
            color: var(--ink);
            background: #fff;
            transform: translateY(-3px);
        }

        /* indicadores tipo "píldora" */
        .hero .carousel-indicators {
            margin-bottom: 7.2rem;
            justify-content: flex-start;
            margin-left: max(1rem, calc((100vw - 1320px) / 2 + .75rem));
        }

        .hero .carousel-indicators [data-bs-target] {
            width: 34px;
            height: 5px;
            border: 0;
            border-radius: 99px;
            background: rgba(255, 255, 255, .45);
            opacity: 1;
            transition: all .4s;
        }

        .hero .carousel-indicators .active {
            width: 64px;
            background: var(--sena-accent);
        }

        .hero-arrow {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            color: #fff;
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .3);
            backdrop-filter: blur(10px);
            transition: all .25s;
        }

        .carousel-control-prev:hover .hero-arrow,
        .carousel-control-next:hover .hero-arrow {
            background: var(--sena-green);
            border-color: var(--sena-green);
            transform: scale(1.08);
        }

        /* ───────── FRANJA DE ACCESOS RÁPIDOS (flotando sobre el hero) ───────── */
        .quick {
            position: relative;
            z-index: 5;
            margin-top: -70px;
        }

        .quick-card {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.25rem 1.4rem;
            border-radius: 18px;
            background: #fff;
            border: 1px solid var(--line);
            box-shadow: 0 18px 40px rgba(15, 23, 42, .08);
            text-decoration: none;
            color: var(--ink);
            transition: all .3s cubic-bezier(.2, .8, .2, 1);
            height: 100%;
        }

        .quick-card:hover {
            transform: translateY(-6px);
            border-color: rgba(57, 169, 0, .45);
            box-shadow: 0 24px 50px rgba(57, 169, 0, .18);
            color: var(--ink);
        }

        .quick-icon {
            flex: 0 0 54px;
            height: 54px;
            border-radius: 15px;
            display: grid;
            place-items: center;
            font-size: 1.5rem;
            color: #fff;
            background: linear-gradient(135deg, var(--sena-green), #1f6b00);
            box-shadow: 0 8px 18px rgba(57, 169, 0, .35);
        }

        .quick-card h6 {
            margin: 0;
            font-weight: 700;
        }

        .quick-card small {
            color: var(--muted);
        }

        .quick-card .go {
            margin-left: auto;
            color: var(--muted);
            transition: transform .3s, color .3s;
        }

        .quick-card:hover .go {
            transform: translateX(5px);
            color: var(--sena-green);
        }

        /* ───────── ENCABEZADOS DE SECCIÓN ───────── */
        .section-tag {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: var(--sena-green-dark);
            background: rgba(57, 169, 0, .1);
            padding: .4rem .9rem;
            border-radius: 999px;
        }

        .section-title {
            font-weight: 800;
            letter-spacing: -.02em;
            color: var(--ink);
        }

        /* ───────── BANDA DE CAPACIDADES ───────── */
        .features {
            background: var(--ink);
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .features::before {
            content: "";
            position: absolute;
            width: 520px;
            height: 520px;
            right: -160px;
            top: -180px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(57, 169, 0, .35), transparent 65%);
        }

        .feature {
            padding: 1.6rem;
            border-radius: 18px;
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .09);
            height: 100%;
            transition: all .3s;
            position: relative;
        }

        .feature:hover {
            background: rgba(255, 255, 255, .08);
            border-color: rgba(0, 230, 118, .4);
            transform: translateY(-5px);
        }

        .feature i {
            font-size: 1.7rem;
            color: var(--sena-accent);
        }

        .feature h5 {
            font-weight: 700;
            margin: .8rem 0 .4rem;
        }

        .feature p {
            color: rgba(255, 255, 255, .65);
            margin: 0;
            font-size: .95rem;
        }

        /* ───────── ANUNCIOS ───────── */
        .ann-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 20px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            width: 100%;
            transition: all .35s cubic-bezier(.2, .8, .2, 1);
            box-shadow: 0 8px 22px rgba(15, 23, 42, .05);
        }

        .ann-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 44px rgba(15, 23, 42, .12);
            border-color: rgba(57, 169, 0, .35);
        }

        .ann-media {
            height: 180px;
            position: relative;
            overflow: hidden;
            flex-shrink: 0;
            background: linear-gradient(135deg, var(--sena-green), #1f6b00);
        }

        .ann-media .ph {
            position: absolute;
            inset: 0;
            display: grid;
            place-items: center;
            font-size: 3.6rem;
            color: rgba(255, 255, 255, .35);
        }

        .ann-media img {
            position: relative;
            z-index: 1;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
            transition: transform .6s;
        }

        .ann-card:hover .ann-media img {
            transform: scale(1.07);
        }

        .clamp {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .clamp-2 {
            -webkit-line-clamp: 2;
        }

        .clamp-3 {
            -webkit-line-clamp: 3;
        }

        .ann-slider {
            position: relative;
        }

        .ann-track {
            display: flex;
            gap: 1.5rem;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            padding: 14px 4px 28px;
            scrollbar-width: none;
        }

        .ann-track::-webkit-scrollbar {
            display: none;
        }

        .ann-slide {
            display: flex;
            flex: 0 0 calc((100% - 3rem) / 3);
            scroll-snap-align: start;
        }

        @media (max-width: 991.98px) {
            .ann-slide {
                flex-basis: calc((100% - 1.5rem) / 2);
            }

            .hero .carousel-item {
                height: 620px;
            }
        }

        @media (max-width: 575.98px) {
            .ann-slide {
                flex-basis: 100%;
            }
        }

        .ann-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 5;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            border: 0;
            color: #fff;
            font-size: 1.2rem;
            display: grid;
            place-items: center;
            background: var(--sena-green);
            box-shadow: 0 8px 20px rgba(57, 169, 0, .4);
            transition: all .3s;
        }

        .ann-arrow:hover:not(:disabled) {
            background: var(--sena-green-dark);
            transform: translateY(-50%) scale(1.08);
        }

        .ann-arrow:disabled {
            opacity: .35;
            box-shadow: none;
        }

        .ann-arrow.prev {
            left: -23px;
        }

        .ann-arrow.next {
            right: -23px;
        }

        .ann-arrow[hidden] {
            display: none;
        }

        @media (max-width: 767.98px) {
            .ann-arrow.prev {
                left: 2px;
            }

            .ann-arrow.next {
                right: 2px;
            }
        }
    </style>

    <div class="home-bleed">

    {{-- ═════════════ HERO CARRUSEL ═════════════ --}}
    <section class="hero">
        <div id="homeHero" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#homeHero" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#homeHero" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#homeHero" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#homeHero" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>

            <div class="carousel-inner">

                {{-- Slide 1 --}}
                <div class="carousel-item active" data-bs-interval="6500">
                    <img class="slide-bg" alt=""
                        src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1800">
                    <div class="shade"></div>
                    <div class="content">
                        <div class="container">
                            <div class="col-lg-7">
                                <span class="eyebrow reveal"><i class="bi bi-shield-check"></i> Gestión académica
                                    integral</span>
                                <h1 class="reveal mt-3 mb-3">Administra tu centro con <em>claridad</em>.</h1>
                                <p class="lead reveal mb-4">Un solo panel para programas, aprendices, instructores e
                                    infraestructura del centro de formación.</p>
                                <div class="reveal d-flex flex-wrap gap-3">
                                    <a href="#accesos" class="btn btn-sena"><i class="bi bi-speedometer2 me-2"></i>Ir al
                                        panel</a>
                                    <a href="#anuncios" class="btn btn-ghost"><i
                                            class="bi bi-megaphone me-2"></i>Ver anuncios</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Slide 2 --}}
                <div class="carousel-item" data-bs-interval="6500">
                    <img class="slide-bg" alt=""
                        src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?q=80&w=1800">
                    <div class="shade"></div>
                    <div class="content">
                        <div class="container">
                            <div class="col-lg-7">
                                <span class="eyebrow reveal"><i class="bi bi-cpu"></i> Infraestructura</span>
                                <h1 class="reveal mt-3 mb-3">Tecnología bajo <em>control</em>.</h1>
                                <p class="lead reveal mb-4">Inventario de equipos, mantenimiento y ambientes
                                    especializados, siempre al día.</p>
                                <div class="reveal">
                                    <a href="/computer/list" class="btn btn-sena"><i
                                            class="bi bi-laptop me-2"></i>Gestionar equipos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Slide 3 --}}
                <div class="carousel-item" data-bs-interval="6500">
                    <img class="slide-bg" alt=""
                        src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1800">
                    <div class="shade"></div>
                    <div class="content">
                        <div class="container">
                            <div class="col-lg-7">
                                <span class="eyebrow reveal"><i class="bi bi-mortarboard"></i> Talento humano</span>
                                <h1 class="reveal mt-3 mb-3">Comunidad <em>académica</em> conectada.</h1>
                                <p class="lead reveal mb-4">Organiza fichas, haz seguimiento a los aprendices y
                                    gestiona los horarios de instrucción.</p>
                                <div class="reveal">
                                    <a href="/apprentice/list" class="btn btn-sena"><i
                                            class="bi bi-people me-2"></i>Módulo aprendices</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Slide 4 --}}
                <div class="carousel-item" data-bs-interval="6500">
                    <img class="slide-bg" alt=""
                        src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1800">
                    <div class="shade"></div>
                    <div class="content">
                        <div class="container">
                            <div class="col-lg-7">
                                <span class="eyebrow reveal"><i class="bi bi-building-gear"></i> Organización</span>
                                <h1 class="reveal mt-3 mb-3">Áreas y centros, <em>bien</em> estructurados.</h1>
                                <p class="lead reveal mb-4">Define áreas de coordinación, programas académicos y
                                    espacios de aprendizaje.</p>
                                <div class="reveal">
                                    <a href="/areas/list" class="btn btn-sena"><i
                                            class="bi bi-grid-3x3-gap me-2"></i>Explorar áreas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <button class="carousel-control-prev w-auto ms-lg-4 ms-2" type="button" data-bs-target="#homeHero"
                data-bs-slide="prev">
                <span class="hero-arrow"><i class="bi bi-chevron-left fs-5"></i></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next w-auto me-lg-4 me-2" type="button" data-bs-target="#homeHero"
                data-bs-slide="next">
                <span class="hero-arrow"><i class="bi bi-chevron-right fs-5"></i></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </section>

    {{-- ═════════════ ACCESOS RÁPIDOS ═════════════ --}}
    <section id="accesos" class="quick">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-6 col-xl-3">
                    <a href="/computer/list" class="quick-card">
                        <span class="quick-icon"><i class="bi bi-laptop"></i></span>
                        <span><h6>Equipos</h6><small>Inventario y mantenimiento</small></span>
                        <i class="bi bi-arrow-right go"></i>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a href="/apprentice/list" class="quick-card">
                        <span class="quick-icon"><i class="bi bi-people"></i></span>
                        <span><h6>Aprendices</h6><small>Fichas y seguimiento</small></span>
                        <i class="bi bi-arrow-right go"></i>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a href="/areas/list" class="quick-card">
                        <span class="quick-icon"><i class="bi bi-grid-3x3-gap"></i></span>
                        <span><h6>Áreas</h6><small>Coordinación del centro</small></span>
                        <i class="bi bi-arrow-right go"></i>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a href="#anuncios" class="quick-card">
                        <span class="quick-icon"><i class="bi bi-megaphone"></i></span>
                        <span><h6>Anuncios</h6><small>Comunicados oficiales</small></span>
                        <i class="bi bi-arrow-right go"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ═════════════ CAPACIDADES ═════════════ --}}
    <section class="features py-5 mt-5">
        <div class="container py-4 position-relative">
            <div class="text-center mb-5">
                <span class="section-tag" style="color:#b6ffd0;background:rgba(0,230,118,.12)"><i
                        class="bi bi-stars"></i> Todo en un lugar</span>
                <h2 class="section-title text-white display-6 mt-3">Pensado para quien administra</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature">
                        <i class="bi bi-lightning-charge"></i>
                        <h5>Rápido</h5>
                        <p>Accede a cada módulo en un clic desde el panel principal.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature">
                        <i class="bi bi-diagram-3"></i>
                        <h5>Organizado</h5>
                        <p>Centros, áreas y programas conectados entre sí.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature">
                        <i class="bi bi-shield-lock"></i>
                        <h5>Seguro</h5>
                        <p>Gestión centralizada con acceso controlado.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature">
                        <i class="bi bi-phone"></i>
                        <h5>Responsive</h5>
                        <p>Se adapta a computador, tablet y celular.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═════════════ ANUNCIOS ═════════════ --}}
    <section id="anuncios" class="py-5">
        <div class="container py-3">

            <div class="text-center mb-5">
                <span class="section-tag"><i class="bi bi-megaphone"></i> Novedades institucionales</span>
                <h2 class="section-title display-6 mt-3 mb-2">Anuncios SENA</h2>
                <p class="text-muted mx-auto" style="max-width:620px">Mantente informado con los comunicados y avisos
                    oficiales publicados por el centro.</p>
            </div>

            @php $latest = collect($announcements ?? [])->sortByDesc('publish_date')->values(); @endphp

            @if ($latest->isEmpty())
                <div class="text-center py-4">
                    <div class="p-4 bg-white rounded-4 d-inline-block shadow-sm">
                        <i class="bi bi-info-circle fs-1 text-muted d-block mb-2"></i>
                        <p class="text-muted mb-0">No hay anuncios publicados por el momento.</p>
                    </div>
                </div>
            @else
                <div class="ann-slider" id="annSlider">

                    <button type="button" class="ann-arrow prev" aria-label="Anteriores" disabled hidden>
                        <i class="bi bi-chevron-left"></i>
                    </button>

                    <div class="ann-track" tabindex="0">
                        @foreach ($latest as $item)
                            @php
                                $hasImage = !empty($item->urlFoto);
                                $imgUrl = $hasImage
                                    ? (Str::startsWith($item->urlFoto, 'images/')
                                        ? asset('storage/' . $item->urlFoto)
                                        : asset('storage/images/' . $item->urlFoto))
                                    : null;
                                $date = \Carbon\Carbon::parse($item->publish_date)->translatedFormat('d M Y');
                                $isLong = Str::length($item->content) > 110;
                            @endphp

                            <div class="ann-slide">
                                <article class="ann-card">
                                    <div class="ann-media">
                                        <span class="ph"><i class="bi bi-megaphone-fill"></i></span>
                                        @if ($hasImage)
                                            <img src="{{ $imgUrl }}" alt="{{ $item->title }}" loading="lazy"
                                                onerror="this.remove()">
                                        @endif
                                    </div>

                                    <div class="p-4 d-flex flex-column flex-grow-1">
                                        <div
                                            class="d-flex align-items-center justify-content-between small text-muted mb-3">
                                            <span
                                                class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1">
                                                {{ $hasImage ? 'Anuncio' : 'Comunicado' }}
                                            </span>
                                            <span><i class="bi bi-calendar3 me-1"></i>{{ $date }}</span>
                                        </div>

                                        <h5 class="clamp clamp-2 text-capitalize fw-bold mb-2">{{ $item->title }}</h5>
                                        <p class="clamp clamp-3 text-secondary small mb-3">{{ $item->content }}</p>

                                        <div class="mt-auto">
                                            @if ($isLong)
                                                <button type="button"
                                                    class="btn btn-link text-success fw-semibold p-0 text-decoration-none"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#annModal{{ $item->id }}">
                                                    Leer más <i class="bi bi-arrow-right ms-1"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>

                    <button type="button" class="ann-arrow next" aria-label="Más anuncios" hidden>
                        <i class="bi bi-chevron-right"></i>
                    </button>
                </div>

                {{-- Modales --}}
                @foreach ($latest as $item)
                    @php
                        $hasImage = !empty($item->urlFoto);
                        $imgUrl = $hasImage
                            ? (Str::startsWith($item->urlFoto, 'images/')
                                ? asset('storage/' . $item->urlFoto)
                                : asset('storage/images/' . $item->urlFoto))
                            : null;
                        $date = \Carbon\Carbon::parse($item->publish_date)->translatedFormat('d M Y');
                    @endphp
                    <div class="modal fade" id="annModal{{ $item->id }}" tabindex="-1"
                        aria-labelledby="annModalLabel{{ $item->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content border-0 rounded-4 overflow-hidden">
                                @if ($hasImage)
                                    <img src="{{ $imgUrl }}" alt="{{ $item->title }}" class="w-100"
                                        style="max-height:260px;object-fit:cover" onerror="this.remove()">
                                @endif
                                <div class="modal-header border-0 pb-0">
                                    <div>
                                        <small class="text-muted d-block mb-1"><i
                                                class="bi bi-calendar3 me-1"></i>{{ $date }}</small>
                                        <h5 class="modal-title fw-bold text-capitalize"
                                            id="annModalLabel{{ $item->id }}">{{ $item->title }}</h5>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body text-secondary">{!! nl2br(e($item->content)) !!}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </section>

    </div>{{-- /home-bleed --}}

    <script>
        (function() {
            const slider = document.getElementById('annSlider');
            if (!slider) return;

            const track = slider.querySelector('.ann-track');
            const prev = slider.querySelector('.ann-arrow.prev');
            const next = slider.querySelector('.ann-arrow.next');

            function step() {
                const slide = track.querySelector('.ann-slide');
                const gap = parseFloat(getComputedStyle(track).columnGap) || 0;
                return slide.offsetWidth + gap;
            }

            function update() {
                const overflow = track.scrollWidth > track.clientWidth + 2;
                prev.hidden = next.hidden = !overflow;
                prev.disabled = track.scrollLeft <= 2;
                next.disabled = track.scrollLeft + track.clientWidth >= track.scrollWidth - 2;
            }

            prev.addEventListener('click', () => track.scrollBy({ left: -step(), behavior: 'smooth' }));
            next.addEventListener('click', () => track.scrollBy({ left: step(), behavior: 'smooth' }));
            track.addEventListener('scroll', update, { passive: true });
            window.addEventListener('resize', update);
            window.addEventListener('load', update);
            update();
        })();
    </script>
@endsection