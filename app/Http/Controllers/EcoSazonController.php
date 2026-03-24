<?php

namespace App\Http\Controllers;
use App\Models\Cocina;
use App\Models\Plato;  
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EcoSazonController extends Controller
{
    /**
     * Muestra la página principal de EcoSazón.
     */
    public function index()
    {
    
    }

    /**
     * Simula la página de Login
     */
    public function login()
    {
        $captcha = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
        session(['captcha_text' => $captcha]);
        return view('login', compact('captcha'));
    }

    public function register()
    {
        $captcha = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6);
        session(['captcha_text' => $captcha]);
        return view('register', compact('captcha'));
    }

        /**
         * Simula el Dashboard de usuario logueado
         */
        public function dashboard()
        {
            return "Bienvenido al Dashboard de EcoSazón";
        }
        public function partner()
        {
            return view('partner');
        }
        public function proposito()
    {
        return view('proposito');
    }

    public function planes()
    {
        return view('planes');
    }

        // Para ver el catálogo de cocinas
       public function cocinas()
    {
        // 1. Obtenemos todas las cocinas de la base de datos
        $todasLasCocinas = Cocina::all();

        // 2. Las agrupamos por su columna 'categoria' ('De barrio', 'Especializada')
        // Esto evita que tu vista falle al hacer el @foreach($categorias as $titulo => $lista)
        $categorias = $todasLasCocinas->groupBy('categoria');

        // 3. Extraemos las zonas únicas de la base de datos y las ordenamos para el filtro
        $zonas = Cocina::select('zona')->distinct()->orderBy('zona')->pluck('zona');

        // 4. Retornamos la vista enviando las variables exactas que necesita
        return view('cocinas', compact('categorias', 'zonas'));
    }

        // Para ver el perfil de una cocina y su menú
        public function perfilCocina($slug)
    {
        // Busca la cocina en la BD por su slug y trae sus platos relacionados
        $cocina = Cocina::with('platos')->where('slug', $slug)->firstOrFail();
        return view('perfil-cocina', compact('cocina'));
    }

    /**
     *Función para guardar nuevas cocinas evitando duplicados
     */
    public function store(Request $request)
    {
        // Validamos que el nombre no se duplique en la base de datos (unique:cocinas,nombre)
        $request->validate([
            'nombre' => 'required|string|max:255|unique:cocinas,nombre',
            'zona'   => 'required|string|max:255',
            'categoria' => 'nullable|string|max:255',
        ], [
            'nombre.unique' => 'Error: Esta cocina económica ya está registrada en la base de datos.',
        ]);

        // Si pasa la validación, guardamos
        $cocina = new Cocina();
        $cocina->nombre = $request->nombre;
        $cocina->slug = Str::slug($request->nombre); // Generamos el slug automáticamente
        $cocina->zona = $request->zona;
        $cocina->categoria = $request->categoria;
        $cocina->save();

        return redirect()->back()->with('success', 'Cocina agregada correctamente sin duplicar.');
    }
}