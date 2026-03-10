<div class="search-container bg-white p-3 rounded-pill shadow-lg d-flex align-items-center mt-4 mx-auto" style="max-width: 1000px;">
    <div class="flex-grow-1 border-end px-4 d-flex align-items-center">
        <i class="fas fa-map-marker-alt text-danger me-3 fs-5"></i>
        <select id="select-zona-inicio" class="form-select border-0 shadow-none bg-transparent py-3 fs-5" style="cursor: pointer;">
            <option value="todas" selected>¿En qué zona estás?</option>
            <optgroup label="Mérida (Zonas principales)">
                <option value="Centro">Centro Histórico</option>
                <option value="Francisco de Montejo">Francisco de Montejo</option>
                <option value="Altabrisa">Altabrisa / Cholul</option>
                <option value="García Ginerés">García Ginerés</option>
                <option value="Caucel">Ciudad Caucel</option>
                <option value="Las Américas">Las Américas</option>
            </optgroup>
            <optgroup label="Alrededores / Conurbada">
                <option value="Kanasín">Kanasín</option>
                <option value="Umán">Umán</option>
                <option value="Conkal">Conkal</option>
            </optgroup>
        </select>
    </div>

    <div class="flex-grow-1 px-4 d-flex align-items-center">
        <i class="fas fa-utensils text-success me-3 fs-5"></i>
        <input type="text" id="input-busqueda-inicio" class="form-control border-0 shadow-none py-3 fs-5" placeholder="¿Qué quieres comer hoy?">
    </div>

    <button id="btn-buscar-inicio" class="btn btn-success rounded-pill px-5 py-3 fw-bold fs-5">
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
        const btnBuscar = document.getElementById('btn-buscar-inicio');
        const inputBusqueda = document.getElementById('input-busqueda-inicio');
        const selectZona = document.getElementById('select-zona-inicio');

        if(btnBuscar) {
            btnBuscar.addEventListener('click', function() {
                const termino = inputBusqueda.value.trim();
                const zona = selectZona.value;
                
                let url = "";

                // Si el usuario ESCRIBIÓ ALGO, lo mandamos a los MENÚS (platillos)
                if (termino !== '') {
                    url = "{{ route('menu.index') }}?q=" + encodeURIComponent(termino);
                    if(zona && zona !== "todas") url += "&z=" + encodeURIComponent(zona);
                } 
                // Si NO escribió nada, lo mandamos al catálogo general de COCINAS
                else {
                    url = "{{ route('cocinas.index') }}?";
                    if(zona && zona !== "todas") url += "z=" + encodeURIComponent(zona);
                }
                
                window.location.href = url;
            });
        }
        
        // Buscar también al presionar la tecla Enter
        if(inputBusqueda) {
            inputBusqueda.addEventListener('keypress', function(e) {
                if(e.key === 'Enter') {
                    btnBuscar.click();
                }
            });
        }
    });
</script>