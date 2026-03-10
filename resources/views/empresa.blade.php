@extends('layouts.app')

{{-- Definición de títulos para el Hero del Layout --}}
@section('titulopagina', 'Inicio - EcoSazón')
@section('titulo', 'EcoSazón')
@section('subtitulo', 'Sabor Local a Domicilio: Conectando Mérida.')

{{-- Estilos específicos si son necesarios (opcional) --}}
@push('css')
    <style>
        .fondo { background: #302886; }
        /* Ajuste para que las imágenes del carrusel no se deformen */
        .object-fit-cover { object-fit: cover; }
    </style>
@endpush

@section('content')

{{-- DECLARAMOS LA VARIABLE AQUÍ PARA NO TOCAR EL CONTROLADOR --}}
    @php
        $categorias = [
            'Cocinas de Barrio' => [
                ['nombre' => 'El Rincón de Itzimná', 'zona' => 'Itzimná', 'especialidad' => 'Menú del día'],
                ['nombre' => 'Sabor a Chuburná', 'zona' => 'Chuburná de Hidalgo', 'especialidad' => 'Comida regional'],
            ],
            'Cocinas Especializadas' => [
                ['nombre' => 'Eco-Sazón Vegano', 'zona' => 'García Ginerés', 'especialidad' => 'Dieta basada en plantas'],
                ['nombre' => 'Pueblo Maya Fit', 'zona' => 'Caucel', 'especialidad' => 'Bajo en calorías'],
            ]
        ];
    @endphp

    {{-- 1. Buscador y Pilares Iniciales --}}
    <div class="container my-5">
        <div class="text-center">
             <x-search-location />
        </div>
        <x-home.pilares />
    </div>

    {{-- 2. NUEVO: Carrusel de Cocinas --}}
    <x-home.carrusel-cocina />

    {{-- 3. Sección de Propósito --}}
    <x-home.proposito />

    {{-- 4. Sección de Planes --}}
    <x-home.planes />
    
    {{-- 5. Listado administrativo (opcional) --}}
    <div class="container my-5 text-center">
        @if(isset($nombre))
            <hr>
            <div class="mt-4 text-muted small">
                Zonas activas bajo supervisión de: {{ $nombre }}
            </div>
        @endif
    </div>
@endsection