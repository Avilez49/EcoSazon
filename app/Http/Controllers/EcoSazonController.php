<?php

namespace App\Http\Controllers;
use App\Models\Cocina;
use App\Models\Plato;  
use Illuminate\Http\Request;

class EcoSazonController extends Controller
{
    /**
     * Muestra la página principal de EcoSazón.
     */
    public function index()
    {
        // Datos de Menús (ecosazon.blade.php) ampliados
        $cocinas = [
            [
                'nombre' => 'Cocina Doña Lupe',
                'zona' => 'Barrio de Santiago',
                'imagen' => 'Imagenes/Imagen02.jfif',
                'menu_dia' => 'Poc Chuc con guarnición',
                'precio_completo' => 85.00,
                'calificacion' => 4.8,
                'descripcion' => 'Cerdo marinado en naranja agria, servido con arroz y frijol.'
            ],
            [
                'nombre' => 'La Tía de Pacabtún',
                'zona' => 'Pacabtún',
                'imagen' => 'Imagenes/Imagen03.jpg',
                'menu_dia' => 'Sopa de Lima y Salbutes',
                'precio_completo' => 75.00,
                'calificacion' => 4.9,
                'descripcion' => 'Caldo tradicional con tiras de tortilla y lima fresca.'
            ],
            [
                'nombre' => 'El Sazón de San Sebastián',
                'zona' => 'San Sebastián',
                'imagen' => 'Imagenes/paisaje.jpg',
                'menu_dia' => 'Relleno Negro',
                'precio_completo' => 95.00,
                'calificacion' => 3.8,
                'descripcion' => 'Platillo tradicional hecho con chilmole y carne de pavo.'
            ],
            [
                'nombre' => 'Pueblo Maya Fit',
                'zona' => 'Caucel',
                'imagen' => 'Imagenes/Yuca1.jpg',
                'menu_dia' => 'Pollo a la plancha',
                'precio_completo' => 120.00,
                'calificacion' => 4.2,
                'descripcion' => 'Opción ligera y saludable con vegetales al vapor.'
            ],
            [
                'nombre' => 'El Rincón de Itzimná',
                'zona' => 'Itzimná',
                'imagen' => 'Imagenes/paisaje.jpg',
                'menu_dia' => 'Cochinita Pibil',
                'precio_completo' => 110.00,
                'calificacion' => 4.5,
                'descripcion' => 'Tradicional cochinita pibil enterrada, con cebolla morada y chile habanero.'
            ],
            [
                'nombre' => 'Fonda Las Margaritas',
                'zona' => 'Francisco de Montejo',
                'imagen' => 'Imagenes/Imagen03.jpg',
                'menu_dia' => 'Pechuga Empanizada',
                'precio_completo' => 70.00,
                'calificacion' => 4.0,
                'descripcion' => 'Crujiente pechuga de pollo acompañada de ensalada fresca y puré de papa.'
            ],
            [
                'nombre' => 'Mariscos El Faro',
                'zona' => 'Progreso (Norte)',
                'imagen' => 'Imagenes/Marisco1.png',
                'menu_dia' => 'Ceviche Mixto',
                'precio_completo' => 150.00,
                'calificacion' => 4.7,
                'descripcion' => 'Fresco ceviche de pescado y camarón con el toque de la casa.'
            ],
            [
                'nombre' => 'Eco-Sazón Vegano',
                'zona' => 'García Ginerés',
                'imagen' => 'Imagenes/Veggie1.png',
                'menu_dia' => 'Hamburguesa de Lentejas',
                'precio_completo' => 95.00,
                'calificacion' => 4.9,
                'descripcion' => 'Deliciosa alternativa libre de carne, con pan artesanal y papas gajo.'
            ],
            [
                'nombre' => 'Antojitos La Mestiza',
                'zona' => 'Centro',
                'imagen' => 'Imagenes/Imagen02.jfif',
                'menu_dia' => 'Panuchos de Pavo',
                'precio_completo' => 65.00,
                'calificacion' => 4.6,
                'descripcion' => 'Orden de 3 crujientes panuchos con pavo asado, aguacate y tomate.'
            ]
        ];

        // Extraer zonas únicas automáticamente para el menú desplegable
        $zonas = collect($cocinas)->pluck('zona')->unique()->values();

        return view('ecosazon', compact('cocinas', 'zonas'));
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

}