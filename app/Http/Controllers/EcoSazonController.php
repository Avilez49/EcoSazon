<?php

namespace App\Http\Controllers;

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

    public function cocinas()
    {
        // Datos de Cocinas (cocinas.blade.php) ampliados
        $categorias = [
            'Cocinas de Barrio' => [
                [
                    'nombre' => 'El Rincón de Itzimná', 
                    'zona' => 'Itzimná', 
                    'especialidad' => 'Menú del día',
                    'categoria' => 'De barrio',
                    'descripcion' => 'Comida casera con el auténtico sabor tradicional yucateco.',
                    'calificacion' => 4.5,
                    'abierto_24h' => false,
                    'precio_promedio' => 80.00,
                    'imagen' => 'Imagenes/Yuca1.png'
                ],
                [
                    'nombre' => 'Sabor a Chuburná', 
                    'zona' => 'Chuburná', 
                    'especialidad' => 'Comida regional',
                    'categoria' => 'De barrio',
                    'descripcion' => 'Especialistas en antojitos yucatecos.',
                    'calificacion' => 4.8,
                    'abierto_24h' => true,
                    'precio_promedio' => 90.00,
                    'imagen' => 'Imagenes/Yuca2.png'
                ],
                [
                    'nombre' => 'Fonda Las Margaritas',
                    'zona' => 'Francisco de Montejo',
                    'especialidad' => 'Comida corrida',
                    'categoria' => 'De barrio',
                    'descripcion' => 'El clásico sabor de la comida casera con menú diferente cada día.',
                    'calificacion' => 4.0,
                    'abierto_24h' => false,
                    'precio_promedio' => 75.00,
                    'imagen' => 'Imagenes/Imagen03.jpg'
                ],
                [
                    'nombre' => 'Antojitos La Mestiza',
                    'zona' => 'Centro',
                    'especialidad' => 'Cenas yucatecas',
                    'categoria' => 'De barrio',
                    'descripcion' => 'Los mejores panuchos y salbutes del centro histórico.',
                    'calificacion' => 4.6,
                    'abierto_24h' => true,
                    'precio_promedio' => 65.00,
                    'imagen' => 'Imagenes/Yuca3.png'
                ],
            ],
            'Cocinas Especializadas' => [
                [
                    'nombre' => 'Eco-Sazón Vegano', 
                    'zona' => 'García Ginerés', 
                    'especialidad' => 'Dieta basada en plantas',
                    'categoria' => 'Especializada',
                    'descripcion' => 'Opciones 100% basadas en plantas, saludables y sustentables.',
                    'calificacion' => 4.9,
                    'abierto_24h' => false,
                    'precio_promedio' => 110.00,
                    'imagen' => 'Imagenes/Veggie1.png'
                ],
                [
                    'nombre' => 'Pueblo Maya Fit', 
                    'zona' => 'Caucel', 
                    'especialidad' => 'Bajo en calorías',
                    'categoria' => 'Especializada',
                    'descripcion' => 'Platillos balanceados y bajos en calorías.',
                    'calificacion' => 3.9,
                    'abierto_24h' => true,
                    'precio_promedio' => 130.00,
                    'imagen' => 'Imagenes/Yuca4.png'
                ],
                [
                    'nombre' => 'Mariscos El Faro',
                    'zona' => 'Progreso (Norte)',
                    'especialidad' => 'Pescados y Mariscos',
                    'categoria' => 'Especializada',
                    'descripcion' => 'Lo mejor del mar traído a la ciudad con frescura inigualable.',
                    'calificacion' => 4.7,
                    'abierto_24h' => false,
                    'precio_promedio' => 160.00,
                    'imagen' => 'Imagenes/Marisco2.png'
                ],
                [
                    'nombre' => 'Keto Kravings',
                    'zona' => 'Altabrisa',
                    'especialidad' => 'Dieta Keto',
                    'categoria' => 'Especializada',
                    'descripcion' => 'Disfruta sin culpa con nuestros platillos bajos en carbohidratos.',
                    'calificacion' => 4.4,
                    'abierto_24h' => false,
                    'precio_promedio' => 145.00,
                    'imagen' => 'Imagenes/Yuca5.png'
                ]
            ]
        ];

        // Obtener zonas únicas de las categorías anidadas
        $zonas = [];
        foreach($categorias as $lista) {
            foreach($lista as $cocina) {
                $zonas[] = $cocina['zona'];
            }
        }
        $zonas = array_unique($zonas);
        sort($zonas); // Ordenar alfabéticamente las zonas

        return view('cocinas', compact('categorias', 'zonas'));
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

    public function perfilCocina($slug)
    {
        // Base de datos simulada de las cocinas del carrusel para su perfil
        $perfiles = [
            'dona-lety' => [
                'nombre' => 'La Cocina de Doña Lety',
                'categoria' => 'Comida Yucateca / Tradicional',
                'zona' => 'Centro',
                'calificacion' => 4.9,
                'abierto_24h' => false,
                'horario' => '08:00 AM - 06:00 PM',
                'telefono' => '+52 999 123 4567',
                'imagen_principal' => 'Imagenes/lety1.png',
                'imagen_fachada' => 'Imagenes/lety2.png',
                'descripcion' => 'Especialidad en cochinita pibil y antojitos yucatecos hechos a mano con la receta tradicional. Llevamos más de 20 años sirviendo a los meridanos con el amor y sazón de un verdadero hogar yucateco.',
                'menu' => [
                    ['platillo' => 'Torta de Cochinita Pibil', 'precio' => 45.00, 'descripcion' => 'Deliciosa torta en pan francés con cochinita, cebolla morada y chile habanero.'],
                    ['platillo' => 'Orden de Panuchos (3 pzas)', 'precio' => 60.00, 'descripcion' => 'Panuchos fritos rellenos de frijol con pavo asado, tomate, lechuga y aguacate.'],
                    ['platillo' => 'Sopa de Lima', 'precio' => 75.00, 'descripcion' => 'Caldo tradicional caliente con pavo desmenuzado, tiras de tortilla frita y lima fresca.']
                ]
            ],
            'sazon-del-puerto' => [
                'nombre' => 'Sazón del Puerto',
                'categoria' => 'Pescados y Mariscos',
                'zona' => 'Progreso / Norte',
                'calificacion' => 4.7,
                'abierto_24h' => false,
                'horario' => '10:00 AM - 08:00 PM',
                'telefono' => '+52 999 765 4321',
                'imagen_principal' => 'Imagenes/marisco2.png',
                'imagen_fachada' => 'Imagenes/marisco1.png',
                'descripcion' => 'Mariscos frescos del día, traídos directamente desde la costa. Disfruta de nuestros ceviches y empanadas fritas al momento preparadas con nuestra receta secreta familiar.',
                'menu' => [
                    ['platillo' => 'Ceviche Mixto', 'precio' => 150.00, 'descripcion' => 'Pescado, camarón y pulpo curtidos en limón con tomate, cebolla y cilantro fresco.'],
                    ['platillo' => 'Empanadas de Cazón (3 pzas)', 'precio' => 80.00, 'descripcion' => 'Masa frita al momento rellena de cazón guisado, servidas con salsa de tomate.'],
                    ['platillo' => 'Filete Empanizado', 'precio' => 120.00, 'descripcion' => 'Filete de pescado fresco empanizado crujiente, acompañado de arroz y ensalada.']
                ]
            ],
            'veggie-maya' => [
                'nombre' => 'Veggie Maya',
                'categoria' => 'Dieta Basada en Plantas',
                'zona' => 'García Ginerés',
                'calificacion' => 4.8,
                'abierto_24h' => false,
                'horario' => '09:00 AM - 09:00 PM',
                'telefono' => '+52 999 555 9999',
                'imagen_principal' => 'Imagenes/Veggie1.png',
                'imagen_fachada' => 'Imagenes/Veggie2.png',
                'descripcion' => 'Opciones cien por ciento basadas en plantas y deliciosas sin perder el auténtico toque regional. Cuidamos de ti y del medio ambiente en cada bocado que servimos.',
                'menu' => [
                    ['platillo' => 'Poc Chuc de Setas', 'precio' => 95.00, 'descripcion' => 'Setas marinadas en naranja agria y asadas a la plancha, servidas con arroz y frijol colado.'],
                    ['platillo' => 'Hamburguesa Vegana', 'precio' => 110.00, 'descripcion' => 'Medallón de lentejas y garbanzos con queso vegano, lechuga, tomate y papas gajo.'],
                    ['platillo' => 'Ensalada Maya', 'precio' => 85.00, 'descripcion' => 'Mix de hojas verdes frescas, aguacate, pepita de calabaza tostada y aderezo cítrico.']
                ]
            ]
        ];

        // Verificamos si existe el identificador; si no, mostramos un error 404
        if (!array_key_exists($slug, $perfiles)) {
            abort(404);
        }

        $cocina = $perfiles[$slug];

        return view('perfil-cocina', compact('cocina'));
    }
}