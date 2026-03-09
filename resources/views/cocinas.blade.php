@extends('layouts.app')

@section('titulopagina', 'Nuestras Cocinas - EcoSazón')
@section('titulo', 'Explora las Cocinas de Mérida')
@section('subtitulo', 'Desde el sabor tradicional hasta opciones dietéticas especializadas.')

@section('content')
<div class="container my-5">
    
    <x-search-location />

    <div id="mensaje-no-resultados" class="text-center my-5" style="display: none;">
        <h4 class="text-danger fw-bold"><i class="fas fa-exclamation-circle"></i> No existe coincidencia alguna.</h4>
        <p class="text-muted fs-5">Intenta con otras palabras o revisa la ortografía.</p>
    </div>

    @foreach($categorias as $titulo => $lista)
    <div class="mb-5 categoria-seccion">
        <h3 class="fw-bold mb-4" style="color: #E67E22; border-left: 5px solid var(--amarillo); padding-left: 15px;">
            {{ $titulo }}
        </h3>
        <div class="row g-3">
            @foreach($lista as $cocina)
            <div class="col-md-6 tarjeta-filtro">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-light rounded-circle p-3 me-3 text-success">
                            <i class="fas fa-store fa-2x"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 nombre-cocina">{{ $cocina['nombre'] }}</h5>
                            <p class="mb-0 text-muted small">
                                <i class="fas fa-map-marker-alt"></i> {{ $cocina['zona'] }} | 
                                <strong class="especialidad-cocina">{{ $cocina['especialidad'] }}</strong>
                            </p>
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
        const mensajeNoResultados = document.getElementById('mensaje-no-resultados');
        const tarjetas = document.querySelectorAll('.tarjeta-filtro');
        const secciones = document.querySelectorAll('.categoria-seccion');

        // Función que filtra las tarjetas
        function aplicarFiltro(texto) {
            const termino = texto.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            let coincidencias = 0;

            tarjetas.forEach(tarjeta => {
                const nombre = tarjeta.querySelector('.nombre-cocina').textContent.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
                const especialidad = tarjeta.querySelector('.especialidad-cocina').textContent.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");

                if (nombre.includes(termino) || especialidad.includes(termino)) {
                    tarjeta.style.display = 'block';
                    coincidencias++;
                } else {
                    tarjeta.style.display = 'none';
                }
            });

            secciones.forEach(seccion => {
                const tarjetasVisibles = Array.from(seccion.querySelectorAll('.tarjeta-filtro')).filter(t => t.style.display !== 'none').length;
                seccion.style.display = (tarjetasVisibles === 0 && termino !== "") ? 'none' : 'block';
            });

            mensajeNoResultados.style.display = (coincidencias === 0 && termino !== "") ? 'block' : 'none';
        }

        // Caso A: Si el usuario escribe directamente en la barra estando en esta página
        if(inputBusqueda) {
            inputBusqueda.addEventListener('input', function(e) {
                aplicarFiltro(e.target.value);
            });
        }

        // Caso B: Si el usuario viene de la página de Inicio, lee la URL y filtra automáticamente
        const parametrosURL = new URLSearchParams(window.location.search);
        const busquedaPrevia = parametrosURL.get('q');
        
        if(busquedaPrevia && inputBusqueda) {
            inputBusqueda.value = busquedaPrevia; // Llena la barra
            aplicarFiltro(busquedaPrevia);        // Filtra las cards
        }
    });
</script>
@endsection