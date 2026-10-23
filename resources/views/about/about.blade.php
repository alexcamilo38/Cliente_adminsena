@extends('layouts.app')

@section('content')
<!-- ESTILOS ADICIONALES PARA EFECTOS Y COLORES INSTITUCIONALES -->
<style>
    :root {
        --sena-green: #39A900;
        --sena-navy: #00324D;
        --sena-green-hover: #2e8800;
    }

    /* Gradient Hero */
    .hero-banner {
        background: linear-gradient(135deg, var(--sena-navy) 0%, #0d486b 50%, var(--sena-green) 100%);
        border-radius: 1.25rem;
        position: relative;
        overflow: hidden;
    }
    .hero-banner::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: rgba(57, 169, 0, 0.25);
        border-radius: 50%;
        filter: blur(60px);
    }

    /* Cards e Interacciones */
    .card-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-hover:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08) !important;
    }

    /* Contenedor de Iconos */
    .icon-box {
        width: 60px;
        height: 60px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 1rem;
        font-size: 1.75rem;
    }
    .icon-box-green {
        background-color: rgba(57, 169, 0, 0.12);
        color: var(--sena-green);
    }
    .icon-box-navy {
        background-color: rgba(0, 50, 77, 0.1);
        color: var(--sena-navy);
    }

    /* Acentos de Borde */
    .border-accent-green {
        border-top: 4px solid var(--sena-green) !important;
    }
    .border-accent-navy {
        border-top: 4px solid var(--sena-navy) !important;
    }
</style>

<div class="container py-4">

    <!-- HERO / BANNER PRINCIPAL -->
    <div class="hero-banner text-white p-4 p-md-5 mb-5 shadow-lg">
        <div class="row align-items-center py-3">
            <div class="col-lg-8 mx-auto text-center position-relative" style="z-index: 1;">
                <span class="badge bg-white text-dark px-3 py-2 rounded-pill fw-semibold text-uppercase tracking-wider mb-3 shadow-sm">
                    Centro de Formación e Innovación
                </span>
                <h1 class="display-4 fw-bold mb-3">¿Quiénes Somos?</h1>
                <p class="lead opacity-90 mb-0">
                    Impulsamos la excelencia académica, el desarrollo tecnológico y la formación integral para construir el futuro de nuestra región.
                </p>
            </div>
        </div>
    </div>

    <!-- MISIÓN Y VISIÓN -->
    <div class="row g-4 mb-5">
        <!-- Misión -->
        <div class="col-lg-6">
            <div class="card h-100 border-0 shadow-sm rounded-4 card-hover border-accent-green bg-white">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-box icon-box-green me-3 shadow-sm">
                            🎯
                        </div>
                        <div>
                            <span class="text-uppercase text-muted fw-bold small">Propósito Institucional</span>
                            <h3 class="fw-bold mb-0 text-dark">Nuestra Misión</h3>
                        </div>
                    </div>
                    <p class="card-text text-secondary fs-6 lh-lg mb-0">
                        El SENA está encargado de cumplir la función que le corresponde al Estado de invertir en el desarrollo social y técnico de los trabajadores colombianos, ofreciendo y ejecutando la formación profesional integral para el desarrollo de la estructura productiva del país.
                    </p>
                </div>
            </div>
        </div>

        <!-- Visión -->
        <div class="col-lg-6">
            <div class="card h-100 border-0 shadow-sm rounded-4 card-hover border-accent-navy bg-white">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-box icon-box-navy me-3 shadow-sm">
                            🚀
                        </div>
                        <div>
                            <span class="text-uppercase text-muted fw-bold small">Proyección de Futuro</span>
                            <h3 class="fw-bold mb-0 text-dark">Nuestra Visión</h3>
                        </div>
                    </div>
                    <p class="card-text text-secondary fs-6 lh-lg mb-0">
                        Ser una entidad de clase mundial en formación profesional integral, referente nacional e internacional en innovación, tecnología y aprendizaje continuo, impulsando el talento humano y la transformación digital de la región.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- PILARES DE GESTIÓN -->
    <div class="text-center mb-4">
        <h2 class="fw-bold text-dark">Nuestros Pilares de Gestión</h2>
        <p class="text-muted">Componentes clave que articulan nuestra plataforma administrativa y académica</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center card-hover bg-white">
                <div class="icon-box icon-box-green mx-auto mb-3">
                    🏢
                </div>
                <h5 class="fw-bold text-dark mb-2">Gestión de Centros</h5>
                <p class="text-secondary small mb-0">
                    Administración eficiente y centralizada de sedes, áreas académicas y ambientes de aprendizaje especializados.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center card-hover bg-white">
                <div class="icon-box icon-box-navy mx-auto mb-3">
                    👨‍🏫
                </div>
                <h5 class="fw-bold text-dark mb-2">Talento Instructores</h5>
                <p class="text-secondary small mb-0">
                    Acompañamiento y soporte continuo a la labor docente, optimizando el seguimiento académico y pedagógico.
                </p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4 p-4 text-center card-hover bg-white">
                <div class="icon-box icon-box-green mx-auto mb-3">
                    💻
                </div>
                <h5 class="fw-bold text-dark mb-2">Recursos Tecnológicos</h5>
                <p class="text-secondary small mb-0">
                    Control técnico e inventario riguroso de equipos informáticos para garantizar el acceso a la comunidad tecnológica.
                </p>
            </div>
        </div>
    </div>

    <!-- BANNER INFORMATIVO / COMPROMISO -->
    <div class="bg-light rounded-4 p-4 p-md-5 border text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h4 class="fw-bold text-dark mb-3">Comprometidos con la Calidad Educativa</h4>
                <p class="text-secondary mb-0">
                    Gestionamos los recursos físicos, tecnológicos y humanos para brindar ambientes de formación modernos, accesibles y orientados al desarrollo integral de los aprendices.
                </p>
            </div>
        </div>
    </div>

</div>
@endsection