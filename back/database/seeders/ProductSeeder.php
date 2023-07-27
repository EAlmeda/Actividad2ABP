<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $names = array(
            'Tortilla de patatas', 'Gazpacho andaluz', 'Cocido Madrileño', 'Paella valenciana', 'Fabada asturiana', 'Ajoblanco', 
            'Bacalao al pil pil', 'Callos a la madrileña', 'Empanada gallega de bonito y pimientos', 'Pulpo a la gallega', 
            'CocaCola', 'Fanta Naranja', 'Fanta Limon', 'Agua KM 0', 'Agua Embotellada', 'Vino Blanco', 'Vino Tinto'
        );

        $image_paths = array(
            'tortilla_patata.jpg', 'gazpacho_andaluz.jpg', 'cocido_madrileno.jpg', 'paella_valenciana.jpg', 'fabada_asturiana.jpg', 'ajoblanco.jpg',
            'bacalao_pil_pil.jpg', 'callos_madrilena.jpg', 'empanada_gallega_bonito_pimientos.jpg', 'pulpo_gallega.jpg',
            'cocacola.jpg', 'fanta_naranja.jpg', 'fanta_limon.jpg', 'agua_km0.png', 'agua_embotellada.jpg', 'vino_blanco.jpg', 'vino_tinto.jpg'
        );

        $descriptions = array(
            'La tortilla de patatas o tortilla española es una tortilla u omelet (es decir, huevo batido, cuajado con aceite en la sartén) a la que se le agrega patatas troceadas. Se trata de uno de los platos más conocidos y emblemáticos de la cocina española, siendo un producto muy popular que se puede encontrar en casi cualquier bar o restaurante del país.',
            'El gazpacho es una sopa fría con ingredientes como agua, aceite de oliva, pan, vinagre y otros, como almendras u hortalizas crudas como tomates, pepinos, pimientos etc. Se suele servir fresco en los meses de verano y tiene un color anaranjado.',
            'El cocido madrileño es uno de los platos más conocidos de la gastronomía española y se suele consumir especialmente durante los meses más fríos para entrar en calor. Su ingrediente principal es el garbanzo, aunque los demás ingredientes, como los diferentes tipos de carnes y verduras le roban su protagonismo.',
            'La paella es un plato originario de Valencia (España). Su ingrediente principal es el arroz, habitualmente acompañado por mariscos, pollo, legumbres y otros alimentos.',
            'Fabada asturiana, o simplemente fabada, es el plato tradicional de la cocina asturiana elaborado con faba asturiana (en asturiano, fabes), embutidos como chorizo y la morcilla asturiana, y con cerdo.',
            'El ajoblanco (escrito también a veces como ajo blanco) es una sopa fría muy popular de la gastronomía de Andalucía (sobre todo en Málaga y Cádiz), Extremadura y Castilla-La Mancha en la región de La Mancha.[cita requerida] Se compone de pan, almendras molidas (en tiempos de escasez, como en la posguerra, se ha venido usando en ciertas zonas harina de habas secas), ajo, agua, aceite de oliva, sal y a veces vinagre. Se suele tomar acompañado de uvas o trocitos de melón.',
            'Plato tradicional de la cocina vasca, cuya salsa es ligada en una cazuela de barro con movimientos circulares. El pil-pil se trata de una emulsión con la gelatina del pescado, obtenida gracias al aceite de oliva a baja temperatura. El sonido que se escucha durante el confitado, producido por el agua que suelta el pescado y por las burbujas de gelatina que suben y explotan en la superficie, es el que da el nombre a esta elaboración.',
            'Los callos a la madrileña son uno de los platos más típicos del invierno madrileño (España). Se elabora principalmente con tripas de vaca que se ofrecen por regla general en las casquerías existentes cerca de las carnicerías de la capital madrileña. Los callos son entendidos como pedazos de estómago de vaca o de carnero que se comen guisados. Es un plato que se suele servir caliente en una cacerola de barro y acompañados de rodajas de chorizo (chorizo de Cantimpalos) y morcilla, y jamón entreverado. Se considera un plato relativamente barato debido al bajo coste de sus ingredientes. Junto con el cocido madrileño es un plato identificativo de la gastronomía de Madrid.',
            'La empanada gallega es una variedad de empanada muy popular en la cocina gallega y que forma parte de una de sus identidades. Es una preparación culinaria que se ofrece en los municipios de Galicia en las ocasiones de fiesta y romería. Suele prepararse con diversos contenidos en su interior, todos ellos procedentes de las costas y tierras gallegas. Se puede servir fría o caliente.',
            'El plato consiste en pulpo limpio de sus vísceras y que es cocido entero durante algún tiempo (preferiblemente en una olla de cobre) con el objeto de ablandar su carne, a veces es congelado unos días antes con el objeto de ablandar el nervio, otras es golpeado varias veces contra una superficie.',
            'Refresco', 'Refresco', 'Refresco', 'Agua', 'Agua', 'Vino', 'Vino'
        );

        $types = array(
            'Dish', 'Dish', 'Dish', 'Dish', 'Dish', 'Dish', 'Dish', 'Dish', 'Dish', 'Dish',
            'Drink', 'Drink', 'Drink', 'Drink', 'Drink', 'Drink', 'Drink'
        );

        $createMultipleProducts = [];

        for ($i = 0; $i < count($names); $i++){
            $name = $names[$i];
            $random_price = mt_rand(1*100,50*100)/100;
            $random_available = mt_rand(0,1) == 1;
            $recipe = Str::random(16);
            $image_path = $image_paths[$i];
            $description = $descriptions[$i];
            $type = $types[$i];

            $createMultipleProducts[] = [
                'name' => $name,
                'price' => $random_price,
                'available' => $random_available,
                'recipe' => $recipe,
                'image_path' => $image_path,
                'description' => $description,
                'type' => strtolower($type),
            ];
        }

        DB::table('products')->insert($createMultipleProducts);
    }
}
