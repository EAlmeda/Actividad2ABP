<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $ingredients = array(
            'Aceite de soja', 'Aceite de maíz', 'Aceite de oliva', 'Aceite de trufa', 'Nata o crema de leche', 'Yogur', 'Leche', 'Helado', 'Queso', 'Cuajada', 'Mantequilla', 'Alubias/Habichuelas/Frijol/Poroto', 'Garbanzos', 'Guisante', 'Habas', 'Lentejas', 'Soja', 'Setas', 'Hongos', 'Boleto', 'Champiñón', 'Huitlacoche', 'Niscalo', 'Seta shiitake', 'Seta de cardo', 'Seta de chopo', 'Trufa', 'Patata', 'Raíces y tubérculos', 'Lechugas', 'Acelga', 'Alcachofa', 'Batata', 'Berenjena', 'Berro de agua, mastuerzo de agua o agrón', 'Mastuerzo, lepidio, berro hortelano o de jardín', 'Brócoli', 'Brecol', 'Calabacín', 'Calabaza', 'Cardo', 'Cebolla', 'Cebolla caramelizada', 'Cebolleta', 'Coles', 'Coles de Bruselas', 'Coliflor', 'Endivia', 'Tomate', 'Zanahoria', 'Escarola', 'Espárrago', 'Espinaca', 'Hinojo', 'Judías', 'Maíz', 'Palmito', 'Pepino', 'Pimiento', 'Puerro', 'Remolacha', 'Albaricoque', 'Caquis', 'Aguacate', 'Cereza', 'Mango', 'Melocotones', 'Nectarina', 'Ciruela', 'Fruta del bosque', 'Frutos secos', 'Membrillo', 'Peras', 'Manzanas', 'Uvas', 'Fruta seca', 'Frambuesa', 'Fresa', 'Granada', 'Higos', 'Kiwi', 'Limón', 'Mandarina', 'Melón', 'Naranja', 'Piña', 'Plátano', 'Pomelo', 'Sandía', 'Cereales', 'Harinas', 'Panes', 'Arroz', 'Pasta', 'Atún', 'Anchoa', 'Bacalao', 'Besugo', 'Bonito', 'Boquerón', 'Caballa', 'Chicharro', 'Corvina', 'Dorada', 'Lenguado', 'Lubina', 'Merluza', 'Mero', 'Palometa', 'Pejerrey', 'Rape', 'Rodaballo', 'Salmón', 'Sardina', 'Trucha', 'Camarón', 'Cigala', 'Gamba', 'Langostino', 'Percebe', 'Almeja', 'Calamar', 'Mejillón', 'Ostra', 'Pulpo', 'Sepia', 'Vieira', 'Cordero', 'Ovejas', 'Ternera', 'Buey', 'Caballo', 'Cabra', 'Cerdo', 'Vaca', 'Avestruz', 'Paloma', 'Perdiz', 'Patos', 'Pavos', 'Ocas', 'Gallinas', 'Pollo', 'Capones', 'Calamar', 'Yema', 'Bison', 'Conejo', 'Liebre', 'Oso', 'Ciervo', 'Jabalí', 'Patos', 'Faisanes', 'Ocas', 'Ancas de rana', 'Caracoles', 'Alcoholes fuertes', 'Cervezas', 'Sidras', 'Licores', 'Vino blanco', 'Vino caliente', 'Vino tinto', 'Vino rosado', 'Vino dulce', 'Whisky', 'Cafés', 'Cola', 'Agua', 'Agua mineral', 'Agua gaseosa', 'Zumo', 'Tés', 'Horchata', 'Cerveza sin alcohol'
        );
        
        $createMultipleIngredients = [];

        for ($i = 0; $i < count($ingredients); $i++){
            $name = $ingredients[$i];
            $quantity = random_int(0, 200);

            $createMultipleIngredients[] = [
                'name' => strtolower($name),
                'quantity' => $quantity,
            ];
        }

        DB::table('ingredients')->insert($createMultipleIngredients);
    }
}
