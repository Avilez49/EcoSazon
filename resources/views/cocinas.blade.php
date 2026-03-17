@extends('layouts.app')

@section('titulopagina', 'Nuestras Cocinas - EcoSazón')
@section('titulo', 'Explora las Cocinas de Mérida')
@section('subtitulo', 'Desde el sabor tradicional hasta opciones dietéticas especializadas.')

@section('content')
<div class="container my-5">

    <style>
    /* Contenedor principal del filtro */
    .filtros-llamativos {
        background: linear-gradient(145deg, #ffffff, #f8f9fa);
        border-radius: 20px;
        border-left: 8px solid #E67E22; 
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        padding: 30px;
        transition: all 0.3s ease;

        position: sticky;
        top: 20px;
        z-index: 1020;
    }

    /* Efecto al pasar el mouse por el contenedor */
    .filtros-llamativos:hover {
        box-shadow: 0 20px 40px rgba(230, 126, 34, 0.15);
    }

    /* Estilo para los títulos de los filtros */
    .filtro-label {
        color: #4a4a4a;
        font-weight: 800;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1px;
        margin-bottom: 8px;
        display: block;
    }

    /* Inputs y Selects más modernos */
    .input-premium {
        border: 2px solid #eee !important;
        border-radius: 12px !important;
        padding: 12px 15px !important;
        background-color: #fff !important;
        transition: all 0.3s !important;
    }

    .input-premium:focus {
        border-color: #E67E22 !important;
        background-color: #fff !important;
        transform: translateY(-2px);
    }

    /* El buscador principal con un estilo más grande */
    .search-group-premium {
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border-radius: 12px;
        overflow: hidden;
    }

    /* Iconos con pulso naranja */
    .icono-naranja {
        color: #E67E22;
        background: rgba(230, 126, 34, 0.1);
        padding: 8px;
        border-radius: 50%;
    }
</style>

   <div class="filtros-llamativos mb-5">
    <div class="d-flex align-items-center mb-4">
        <i class="fas fa-search-location fa-2x icono-naranja me-3"></i>
        <div>
            <h4 class="fw-black mb-0" style="color: #2c3e50; letter-spacing: -1px;">ENCUENTRA TU SABOR</h4>
            <p class="text-muted small mb-0">Personaliza tu búsqueda para encontrar la cocina perfecta</p>
        </div>
    </div>
    
    <div class="row g-4">
        <div class="col-12 col-lg-5">
            <span class="filtro-label">¿Qué se te antoja hoy?</span>
            <div class="input-group search-group-premium">
                <select class="form-select border-0 bg-light" id="tipo-busqueda" style="max-width: 130px; font-weight: 600;">
                    <option value="todos">🔍 Todo</option>
                    <option value="nombre">Nombre</option>
                    <option value="categoria">Categoría</option>
                </select>
                <input type="text" id="input-busqueda" class="form-control border-0" placeholder="Ej: La mejor cochinita...">
            </div>
        </div>

        <div class="col-12 col-md-4 col-lg-3">
            <span class="filtro-label">Presupuesto Máximo</span>
            <div class="px-2">
                <input type="range" class="form-range" min="0" max="200" step="5" id="rango-precio" value="200">
                <div class="d-flex justify-content-between">
                    <span class="fw-bold text-muted small">$0</span>
                    <span class="badge bg-success fs-6">$<span id="valor-precio">200</span></span>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 col-lg-2">
            <span class="filtro-label">Zona</span>
            <select class="form-select input-premium" id="select-zona">
                <option value="todas">📍 Todas</option>
                @foreach($zonas as $zona)
                    <option value="{{ $zona }}">{{ $zona }}</option>
                @endforeach
            </select>
        </div>

            <div class="col-12 col-md-4 col-lg-2">
                <span class="filtro-label">Popularidad</span>
                <select class="form-select input-premium" id="select-calificacion">
                    <option value="0">⭐ Todas</option>
                    <option value="4.5">4.5+ Excelente</option>
                    <option value="4.0">4.0+ Muy Buena</option>
                </select>
            </div>
        </div>
    </div>

    <div id="mensaje-no-resultados" class="text-center my-5" style="display: none;">
        <h4 class="text-danger fw-bold"><i class="fas fa-exclamation-circle"></i> No existen cocinas con esos filtros.</h4>
        <p class="text-muted fs-5">Prueba aumentando el precio o quitando el filtro de zona.</p>
    </div>

    @foreach($categorias as $titulo => $lista)
    <div class="mb-5 categoria-seccion">
        <h3 class="fw-bold mb-4" style="color: #E67E22; border-left: 5px solid var(--amarillo); padding-left: 15px;">
            {{ $titulo }}
        </h3>
        <div class="row g-4">
            @foreach($lista as $cocina)
            <div class="col-12 col-md-6 col-lg-4 tarjeta-filtro"
                 data-precio="{{ $cocina['precio_promedio'] }}"
                 data-zona="{{ $cocina['zona'] }}"
                 data-calif="{{ $cocina['calificacion'] }}">
                
                <div class="card h-100 border-0 shadow-sm overflow-hidden">
                    <img src="{{ asset($cocina->imagen_principal) }}" class="card-img-top" alt="{{ $cocina['nombre'] }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="mb-0 item-nombre fw-bold text-dark">{{ $cocina['nombre'] }}</h5>
                            @if($cocina['abierto_24h'])
                                <span class="badge bg-success ms-2 px-2 py-1"><i class="fas fa-clock me-1"></i>24 Hrs</span>
                            @endif
                        </div>
                        <p class="mb-2 text-muted small">
                            <span class="badge bg-secondary me-1 item-categoria">{{ $cocina['categoria'] }}</span>
                            <i class="fas fa-map-marker-alt ms-1 text-danger"></i> {{ $cocina['zona'] }}
                        </p>
                        <p class="card-text text-secondary mt-2 mb-3" style="font-size: 0.9rem;">
                            {{ $cocina['descripcion'] }} <br>
                            <span class="text-success small fw-bold mt-1 d-block">Precio prom. ${{$cocina['precio_promedio']}}</span>
                        </p>
                        <div class="mb-4 text-warning mt-auto">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($cocina['calificacion']))
                                    <i class="fas fa-star"></i>
                                @elseif($i - 0.5 == $cocina['calificacion'])
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                            <span class="text-dark small ms-1 fw-bold">({{ $cocina['calificacion'] }})</span>
                        </div>
                        <div>
                            <a href="{{ route('cocina.perfil', $cocina->slug) }}" class="btn text-white w-100 fw-bold" style="background-color: #E67E22;">
                                <i class="fas fa-utensils me-2"></i> Ver Menú
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputBusqueda = document.getElementById('input-busqueda');
        const tipoBusqueda = document.getElementById('tipo-busqueda');
        const rangoPrecio = document.getElementById('rango-precio');
        const valorPrecio = document.getElementById('valor-precio');
        const selectZona = document.getElementById('select-zona');
        const selectCalif = document.getElementById('select-calificacion');
        const mensajeNoResultados = document.getElementById('mensaje-no-resultados');
        const tarjetas = document.querySelectorAll('.tarjeta-filtro');
        const secciones = document.querySelectorAll('.categoria-seccion');

        rangoPrecio.addEventListener('input', function() {
            valorPrecio.textContent = this.value;
            aplicarFiltros();
        });

        function aplicarFiltros() {
            const texto = inputBusqueda.value.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            const tipo = tipoBusqueda.value;
            const maxPrecio = parseFloat(rangoPrecio.value);
            const zona = selectZona.value;
            const califMin = parseFloat(selectCalif.value);
            
            let coincidencias = 0;

            tarjetas.forEach(tarjeta => {
                const txtNombre = tarjeta.querySelector('.item-nombre').textContent.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
                const txtCat = tarjeta.querySelector('.item-categoria').textContent.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
                
                const valPrecio = parseFloat(tarjeta.getAttribute('data-precio'));
                const valZona = tarjeta.getAttribute('data-zona');
                const valCalif = parseFloat(tarjeta.getAttribute('data-calif'));

                let pasaTexto = false;
                if (tipo === 'todos') pasaTexto = txtNombre.includes(texto) || txtCat.includes(texto);
                else if (tipo === 'nombre') pasaTexto = txtNombre.includes(texto);
                else if (tipo === 'categoria') pasaTexto = txtCat.includes(texto);

                let pasaPrecio = valPrecio <= maxPrecio;
                let pasaZona = (zona === 'todas' || valZona === zona);
                let pasaCalif = valCalif >= califMin;

                if (pasaTexto && pasaPrecio && pasaZona && pasaCalif) {
                    tarjeta.style.display = 'block';
                    coincidencias++;
                } else {
                    tarjeta.style.display = 'none';
                }
            });

            // Ocultar título de categoría entera si todas sus tarjetas desaparecen
            secciones.forEach(seccion => {
                const visibles = Array.from(seccion.querySelectorAll('.tarjeta-filtro')).filter(t => t.style.display !== 'none').length;
                seccion.style.display = (visibles === 0) ? 'none' : 'block';
            });

            mensajeNoResultados.style.display = (coincidencias === 0) ? 'block' : 'none';
        }

        inputBusqueda.addEventListener('input', aplicarFiltros);
        tipoBusqueda.addEventListener('change', aplicarFiltros);
        selectZona.addEventListener('change', aplicarFiltros);
        selectCalif.addEventListener('change', aplicarFiltros);

        const parametrosURL = new URLSearchParams(window.location.search);
        const urlBusqueda = parametrosURL.get('q');
        const urlZona = parametrosURL.get('z');
        
        let requiereFiltroInicial = false;

        // Si vino texto en la URL, lo ponemos en el input
        if (urlBusqueda) {
            inputBusqueda.value = urlBusqueda;
            requiereFiltroInicial = true;
        }
        
        // Si vino una zona en la URL, buscamos qué opción coincide y la seleccionamos
        if (urlZona) {
            for (let i = 0; i < selectZona.options.length; i++) {
                if (selectZona.options[i].value.toLowerCase().includes(urlZona.toLowerCase())) {
                    selectZona.selectedIndex = i;
                    requiereFiltroInicial = true;
                    break;
                }
            }
        }
        
        // Si detectamos parámetros, ejecutamos el filtro que ya tenías programado
        if (requiereFiltroInicial) {
            aplicarFiltros();
        }
    });

    
</script>
@endsection