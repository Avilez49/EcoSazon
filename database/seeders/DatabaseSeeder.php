<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Array de Cocinas
        $cocinas = [
            [
                'id' => 1, 'nombre' => 'Cocina Doña Lupe', 'slug' => 'cocina-dona-lupe', 
                'categoria' => 'Comida Yucateca', 'zona' => 'Barrio de Santiago', 
                'descripcion' => 'Tradición y sazón familiar en cada bocado, especialista en carnes marinadas.', 
                'calificacion' => 4.8, 'abierto_24h' => false, 'horario' => '08:00 - 18:00', 
                'telefono' => '9991234567', 'imagen_principal' => 'Imagenes/Lupe.png', 
                'imagen_fachada' => 'Imagenes/Lupe.png',
            ],
            [
                'id' => 2, 'nombre' => 'La Tía de Pacabtún', 'slug' => 'la-tia-de-pacabtun', 
                'categoria' => 'Antojitos Regionales', 'zona' => 'Pacabtún', 
                'descripcion' => 'Los mejores caldos y antojitos de la zona oriente, recetas de la abuela.', 
                'calificacion' => 4.9, 'abierto_24h' => false, 'horario' => '07:00 - 15:00', 
                'telefono' => '9997654321', 'imagen_principal' => 'Imagenes/Pacabtun.png', 
                'imagen_fachada' => 'Imagenes/Pacabtun.png',
            ],
            [
                'id' => 3, 'nombre' => 'El Sazón de San Sebastián', 'slug' => 'sazon-san-sebastian', 
                'categoria' => 'Comida Tradicional', 'zona' => 'San Sebastián', 
                'descripcion' => 'Expertos en recados y platillos enterrados clásicos del barrio.', 
                'calificacion' => 3.8, 'abierto_24h' => false, 'horario' => '08:00 - 16:00', 
                'telefono' => '9998887766', 'imagen_principal' => 'Imagenes/SanSebas.png', 
                'imagen_fachada' => 'Imagenes/SanSebas.png',
            ],
            [
                'id' => 4, 'nombre' => 'Pueblo Maya Fit', 'slug' => 'pueblo-maya-fit', 
                'categoria' => 'Saludable', 'zona' => 'Caucel', 
                'descripcion' => 'Comida balanceada, ligera y nutritiva sin perder el sabor local.', 
                'calificacion' => 4.2, 'abierto_24h' => false, 'horario' => '09:00 - 21:00', 
                'telefono' => '9991112233', 'imagen_principal' => 'Imagenes/Yuca4.png', 
                'imagen_fachada' => 'Imagenes/Yuca4.png',
            ],
            [
                'id' => 5, 'nombre' => 'El Rincón de Itzimná', 'slug' => 'rincon-itzimna', 
                'categoria' => 'Comida Yucateca', 'zona' => 'Itzimná', 
                'descripcion' => 'El clásico rincón dominical para disfrutar de la mejor cochinita.', 
                'calificacion' => 4.5, 'abierto_24h' => false, 'horario' => '06:00 - 13:00', 
                'telefono' => '9994445566', 'imagen_principal' => 'Imagenes/Itzimna.png', 
                'imagen_fachada' => 'Imagenes/Itzimna.png',
            ],
            [
                'id' => 6, 'nombre' => 'Fonda Las Margaritas', 'slug' => 'fonda-las-margaritas', 
                'categoria' => 'Comida Casera', 'zona' => 'Francisco de Montejo', 
                'descripcion' => 'comida casera con un toque especial, ideal para quienes buscan sabores familiares y reconfortantes.', 
                'calificacion' => 4.0, 'abierto_24h' => false, 'horario' => '11:00 - 17:00', 
                'telefono' => '9992223344', 'imagen_principal' => 'Imagenes/Margaritas.png', 
                'imagen_fachada' => 'Imagenes/Margaritas.png',
            ],
            [
                'id' => 7, 'nombre' => 'Mariscos El Faro', 'slug' => 'mariscos-el-faro', 
                'categoria' => 'Mariscos', 'zona' => 'Progreso (Norte)', 
                'descripcion' => 'comida de mar fresca y deliciosa, con especialidad en ceviches y cocteles, perfecta para los amantes de los sabores del mar.', 
                'calificacion' => 4.7, 'abierto_24h' => false, 'horario' => '10:00 - 19:00', 
                'telefono' => '9999998877', 'imagen_principal' => 'Imagenes/Faro.png', 
                'imagen_fachada' => 'Imagenes/Faro.png',
            ],
            [
                'id' => 8, 'nombre' => 'Eco-Sazón Vegano', 'slug' => 'eco-sazon-vegano', 
                'categoria' => 'Vegana', 'zona' => 'García Ginerés', 
                'descripcion' => 'Comida vegana con ingredientes locales, ideal para quienes buscan opciones sin carne.', 
                'calificacion' => 4.9, 'abierto_24h' => false, 'horario' => '12:00 - 22:00', 
                'telefono' => '9993332211', 'imagen_principal' => 'Imagenes/Eco.png', 
                'imagen_fachada' => 'Imagenes/Eco.png',
            ],
            [
                'id' => 9, 'nombre' => 'Antojitos La Mestiza', 'slug' => 'antojitos-la-mestiza', 
                'categoria' => 'Antojitos Regionales', 'zona' => 'Centro', 
                'descripcion' => 'Antojitos yucatecos con el toque de la casa, ideales para cualquier hora del día.', 
                'calificacion' => 4.6, 'abierto_24h' => false, 'horario' => '18:00 - 23:30', 
                'telefono' => '9995556677', 'imagen_principal' => 'Imagenes/Yuca3.png', 
                'imagen_fachada' => 'Imagenes/Yuca3.png',
            ]
        ];

        // 2. Array de Platos
        $platos = [
            [
                'cocina_id' => 1, 'nombre' => 'Poc Chuc con guarnición', 
                'descripcion' => 'Cerdo marinado en naranja agria, servido con arroz y frijol.', 
                'precio' => 85.00, 'imagen' => 'Imagenes/PocC.png',
            ],
            [
                'cocina_id' => 2, 'nombre' => 'Sopa de Lima y Salbutes', 
                'descripcion' => 'Caldo tradicional con tiras de tortilla y lima fresca.', 
                'precio' => 75.00, 'imagen' => 'Imagenes/SopaL.png',
            ],
            [
                'cocina_id' => 3, 'nombre' => 'Relleno Negro', 
                'descripcion' => 'Platillo tradicional hecho con chilmole y carne de pavo.', 
                'precio' => 95.00, 'imagen' => 'Imagenes/RellenoN.png',
            ],
            [
                'cocina_id' => 4, 'nombre' => 'Pollo a la plancha', 
                'descripcion' => 'Opción ligera y saludable con vegetales al vapor.', 
                'precio' => 120.00, 'imagen' => 'Imagenes/PolloP.png',
            ],
            [
                'cocina_id' => 5, 'nombre' => 'Cochinita Pibil', 
                'descripcion' => 'Tradicional cochinita pibil enterrada, con cebolla morada y chile habanero.', 
                'precio' => 110.00, 'imagen' => 'Imagenes/CochinitaP.png',
            ],
            [
                'cocina_id' => 6, 'nombre' => 'Pechuga Empanizada', 
                'descripcion' => 'Crujiente pechuga de pollo acompañada de ensalada fresca y puré de papa.', 
                'precio' => 70.00, 'imagen' => 'Imagenes/PechugaE.png',
            ],
            [
                'cocina_id' => 7, 'nombre' => 'Ceviche Mixto', 
                'descripcion' => 'Fresco ceviche de pescado y camarón con el toque de la casa.', 
                'precio' => 150.00, 'imagen' => 'Imagenes/CevicheM.png',
            ],
            [
                'cocina_id' => 8, 'nombre' => 'Hamburguesa de Lentejas', 
                'descripcion' => 'Deliciosa alternativa libre de carne, con pan artesanal y papas gajo.', 
                'precio' => 95.00, 'imagen' => 'Imagenes/HamburguesaL.png',
            ],
            [
                'cocina_id' => 9, 'nombre' => 'Panuchos de Pavo', 
                'descripcion' => 'Orden de 3 crujientes panuchos con pavo asado, aguacate y tomate.', 
                'precio' => 65.00, 'imagen' => 'Imagenes/PanuchosP.png',
            ]
        ];

        // 3. Insertar los datos en la base de datos
        // Importante: Insertar cocinas primero porque platos depende de ellas (llave foránea)
        DB::table('cocinas')->insert($cocinas);
        DB::table('platos')->insert($platos);
    }
}