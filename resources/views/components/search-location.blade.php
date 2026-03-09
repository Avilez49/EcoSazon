<div class="search-container bg-white p-3 rounded-pill shadow-lg d-flex align-items-center mt-4 mx-auto" style="max-width: 1000px;">
    <div class="flex-grow-1 border-end px-4 d-flex align-items-center">
        <i class="fas fa-map-marker-alt text-danger me-3 fs-5"></i>
        <select class="form-select border-0 shadow-none bg-transparent py-3 fs-5" style="cursor: pointer;">
            <option selected disabled>¿En qué zona estás?</option>
            <optgroup label="Mérida (Zonas principales)">
                <option>Centro Histórico</option>
                <option>Francisco de Montejo</option>
                <option>Altabrisa / Cholul</option>
                <option>García Ginerés</option>
                <option>Ciudad Caucel</option>
                <option>Las Américas</option>
            </optgroup>
            <optgroup label="Alrededores / Conurbada">
                <option>Kanasín</option>
                <option>Umán</option>
                <option>Conkal</option>
            </optgroup>
        </select>
    </div>

    <div class="flex-grow-1 px-4 d-flex align-items-center">
        <i class="fas fa-utensils text-success me-3 fs-5"></i>
        <input type="text" id="input-busqueda" class="form-control border-0 shadow-none py-3 fs-5" placeholder="¿Qué quieres comer hoy?">
    </div>

    <button id="btn-buscar" class="btn btn-success rounded-pill px-5 py-3 fw-bold fs-5">
        <i class="fas fa-search me-2"></i> Buscar
    </button>
</div>

<style>
    .search-container { border: 1px solid #eee; }
    .search-container select:focus, .search-container input:focus { outline: none; }
    
    @media (max-width: 768px) {
        .search-container { 
            flex-direction: column; 
            border-radius: 25px !important; 
            padding: 20px !important; 
        }
        .search-container .border-end { 
            border-bottom: 1px solid #eee; 
            margin-bottom: 15px; 
            padding-bottom: 10px;
            width: 100%; 
        }
        .search-container button { 
            width: 100%; 
            margin-top: 15px; 
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnBuscar = document.getElementById('btn-buscar');
        const inputBusqueda = document.getElementById('input-busqueda');

        if(btnBuscar && inputBusqueda) {
            btnBuscar.addEventListener('click', function() {
                const termino = inputBusqueda.value.trim();
                // Si está en la página principal y busca, lo manda a la vista de cocinas
                // Cambia '/cocinas' por la ruta real si tu URL es diferente (ej. '/catalogo')
                if(window.location.pathname !== '/cocinas' && termino !== '') {
                    window.location.href = '/cocinas?q=' + encodeURIComponent(termino);
                }
            });
        }
    });
</script>