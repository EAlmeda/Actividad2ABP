<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllergenSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $allergenNames = array(
            'Cereales con gluten', 
            'Crustáceos y productos a base de crustáceos', 
            'Huevos y productos derivados', 
            'Pescado y productos a base de pescados', 
            'Cacahuetes, productos a base de cacahuetes y frutos secos', 
            'Soja y productos a base de soja', 
            'Leche y sus derivados (incluida la lactosa)', 
            'Frutos de cáscara y productos derivados', 
            'Apio y productos derivados', 
            'Mostaza y productos a base de mostaza', 
            'Granos o semillas de sésamo y productos a base de sésamo', 
            'Dióxido de azufre y sulfitos', 
            'Altramuces y productos a base de altramuces', 
            'Moluscos y crustáceos y productos a base de estos'
        );

        $allergenDescriptions = array(
            'La normativa actual obliga al etiquetado de todos los alimentos que contengan cereales con gluten (trigo, centeno, cebada, avena, espelta, kamut, triticale, etc.)',
            'Cangrejos, langostas, gambas, langostinos, carabineros, cigalas, etc. Además se puede encontrar en cremas, salsas, platos preparados, etc.',
            'El huevo es un alimento de declaración obligatoria según la normativa europea actual. La clara de huevo es más alergénica que la yema.',
            'La normativa obliga al etiquetado de todos los alimentos que contengan pescado o productos a base de pescado.',
            'Además de en las semillas, pasta y aceites, se puede encontrar en galletas, chocolates, postres, salsas, etc.',
            'Además de en las semillas (habas), pastas, aceites y harinas, se puede encontrar en el tofu, postres, helados, productos cárnicos, salsas, productos para vegetarianos, etc.',
            'La normativa obliga al etiquetado de todos los alimentos que contengan productos lácteos.',
            'Almendras, avellanas, nueces, anacardos, pacanas, nueces de Brasil, pistachos, nueces de macadamia, etc. Se pueden encontrar en panes, galletas, postres, helados, mazapán, salsas o aceites, etc.',
            'Incluye los tallos, hojas, semillas y raíces. Además se puede encontrar en condimentos, ensaladas, algunos productos cárnicos, sopas, cremas, salsas, etc.',
            'Además de en semillas, en polvo o en forma líquida, se puede encontrar en algunos panes, currys, marinados, productos cárnicos, aliños, salsas, sopas, etc.',
            'Además de en las semillas (granos), pastas (tahine o pasta de sésamo), aceites y harinas, se puede encontrar en panes, colines, humus, etc.',
            'Se pueden utilizar como conservantes en crustáceos, frutas desecadas, productos cárnicos, refrescos, vegetales, zumos, encurtidos, vino, cerveza etc.',
            'Además de en las semillas y harinas, se puede encontrar en algunos tipos de pan, pasteles, etc.',
            'Mejillones, almejas, caracoles, ostras, bígaros, chirlas, berberechos, pulpo, calamar, etc. Además se puede encontrar en cremas, salsas, platos preparados, etc.'
    );

        $allergenImageNames = array(
            'gluten.jpg',
            'crustaceos.jpg',
            'huevos.jpg',
            'pescado.jpg',
            'cacahuetes.jpg',
            'soja.jpg',
            'lacteos.jpg',
            'frutos_con_cascara.jpg.jpg',
            'apio.jpg',
            'mostaza.jpg',
            'sesamo.jpg',
            'sulfitos.jpg',
            'altramuces.jpg',
            'moluscos.jpg'
        );

        $createMultipleAllergens = [];

        for ($i = 0; $i < count($allergenNames); $i++){
            $allergen_name = $allergenNames[$i];
            $allergen_description = $allergenDescriptions[$i];
            $allergen_image = $allergenImageNames[$i];
            $allergen_risk = random_int(1, 10);

            $createMultipleAllergens[] = [
                'name' => $allergen_name,
                'description' => $allergen_description,
                'icon_name' => $allergen_image,
                'risk' => $allergen_risk,
            ];
        }

        DB::table('allergens')->insert($createMultipleAllergens);
    }
}

