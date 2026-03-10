@extends('layouts.app')

@section('titulopagina', $cocina['nombre'] . ' - EcoSazón')

@section('content')
<div class="position-relative" style="height: 400px;">
    <img src="{{ asset($cocina['imagen_principal']) }}" class="w-100 h-100 object-fit-cover" alt="Platillo representativo de {{ $cocina['nombre'] }}">
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50"></div>
    
    <div class="position-absolute bottom-0 start-0 w-100 p-4 p-md-5 text-white">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-8 mb-3 mb-md-0">
                    <span class="badge bg-success mb-2 px-3 py-2 fs-6 shadow">{{ $cocina['categoria'] }}</span>
                    <h1 class="display-4 fw-bold mb-2">{{ $cocina['nombre'] }}</h1>
                    <p class="fs-5 mb-0"><i class="fas fa-map-marker-alt text-danger me-2"></i>{{ $cocina['zona'] }}</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="bg-white text-dark d-inline-block rounded-4 p-3 shadow-lg text-center" style="min-width: 150px;">
                        <div class="text-warning fs-3 mb-1">
                            <i class="fas fa-star"></i> <span class="fw-bold text-dark">{{ $cocina['calificacion'] }}</span>
                        </div>
                        <div class="small fw-bold text-secondary text-uppercase tracking-wide">Aprobación</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row g-5">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 sticky-lg-top" style="top: 20px; z-index: 1;">
                <img src="{{ asset($cocina['imagen_fachada']) }}" class="card-img-top object-fit-cover" style="height: 250px;" alt="Fachada de {{ $cocina['nombre'] }}">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3" style="color: #E67E22;"><i class="fas fa-info-circle me-2"></i> Sobre nosotros</h5>
                    <p class="text-muted" style="line-height: 1.6;">{{ $cocina['descripcion'] }}</p>
                    
                    <hr class="my-4">
                    
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-clock text-success fs-5 me-3 mt-1"></i> 
                            <div>
                                <strong class="d-block text-dark">Horario de atención:</strong>
                                <span class="text-muted">{{ $cocina['horario'] }}</span>
                            </div>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fas fa-phone-alt text-success fs-5 me-3 mt-1"></i> 
                            <div>
                                <strong class="d-block text-dark">Teléfono para pedidos:</strong>
                                <span class="text-muted">{{ $cocina['telefono'] }}</span>
                            </div>
                        </li>
                        @if($cocina['abierto_24h'])
                        <li class="mt-4">
                            <span class="badge bg-success p-2 w-100 fs-6"><i class="fas fa-check-circle me-1"></i> Abierto 24 Horas</span>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8">
            <div class="mb-5">
                <h2 class="fw-bold mb-4" style="color: #E67E22; border-left: 5px solid var(--amarillo); padding-left: 15px;">
                    Menú de la casa
                </h2>
                <p class="text-muted mb-4 fs-5">Descubre los platillos preparados al momento para ti.</p>
            </div>
            
            <div class="row g-4">
                @foreach($cocina['menu'] as $item)
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden" style="transition: transform 0.2s, box-shadow 0.2s;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 20px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='none'; this.style.boxShadow='';">
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="fw-bold mb-0 text-dark pe-3" style="line-height: 1.3;">{{ $item['platillo'] }}</h5>
                                <span class="badge bg-success fs-6 rounded-pill px-3 py-2">${{ number_format($item['precio'], 2) }}</span>
                            </div>
                            <p class="text-muted small mb-4 flex-grow-1" style="line-height: 1.5;">{{ $item['descripcion'] }}</p>
                            
                            <button class="btn btn-outline-success w-100 fw-bold rounded-pill mt-auto py-2">
                                <i class="fas fa-plus-circle me-2"></i> Agregar al pedido
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-5 pt-3 text-center border-top">
                <a href="{{ route('home') }}" class="btn btn-light border text-dark fw-bold px-4 py-2 rounded-pill shadow-sm">
                    <i class="fas fa-arrow-left me-2"></i> Volver al Inicio
                </a>
            </div>
        </div>
    </div>
</div>
@endsection