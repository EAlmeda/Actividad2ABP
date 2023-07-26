<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $spanishNames = [
            'JOSE', 'ANTONIO', 'JUAN', 'MANUEL', 'FRANCISCO', 'LUIS', 'JAVIER', 'MIGUEL', 'CARLOS', 'ANGEL', 'JESUS', 'DAVID', 'DANIEL', 'PEDRO', 'ALEJANDRO', 'MARIA', 'ALBERTO', 'PABLO', 'FERNANDO', 'RAFAEL', 'JORGE', 'RAMON', 'SERGIO', 'ENRIQUE', 'ANDRES', 'DIEGO', 'ADRIAN', 'VICENTE', 'VICTOR', 'ALVARO', 'IGNACIO', 'RAUL', 'EDUARDO', 'IVAN', 'OSCAR', 'RUBEN', 'JOAQUIN', 'SANTIAGO', 'MARIO', 'ROBERTO', 'GABRIEL', 'MARCOS', 'ALFONSO', 'JAIME', 'RICARDO', 'HUGO', 'JULIO', 'EMILIO', 'MARTIN', 'SALVADOR', 'GUILLERMO', 'MOHAMED', 'NICOLAS', 'TOMAS', 'JORDI', 'JULIAN', 'GONZALO', 'AGUSTIN', 'CRISTIAN', 'CESAR', 'MARC', 'FELIX', 'JOAN', 'JOSEP', 'SAMUEL', 'SEBASTIAN', 'LUCAS', 'HECTOR', 'FELIPE', 'ISMAEL', 'ALFREDO', 'DOMINGO', 'AITOR', 'ALEX', 'MARIANO', 'RODRIGO', 'MATEO', 'ALEXANDER', 'IKER', 'MARCO', 'XAVIER', 'ESTEBAN', 'ARTURO', 'GREGORIO', 'LORENZO', 'DARIO', 'BORJA', 'ALBERT', 'AARON', 'JOEL', 'ISAAC', 'EUGENIO', 'CRISTOBAL', 'ERIC', 'JONATHAN', 'CHRISTIAN', 'MOHAMMED', 'PAU', 'GERMAN', 'OMAR',
            'MARIA', 'CARMEN', 'ANA', 'ISABEL', 'DOLORES', 'PILAR', 'TERESA', 'ROSA', 'JOSEFA', 'CRISTINA', 'LAURA', 'ANGELES', 'ELENA', 'ANTONIA', 'LUCIA', 'MARTA', 'FRANCISCA', 'MERCEDES', 'LUISA', 'CONCEPCION', 'ROSARIO', 'JOSE', 'PAULA', 'SARA', 'RAQUEL', 'ROCIO', 'EVA', 'PATRICIA', 'BEATRIZ', 'VICTORIA', 'JUANA', 'MANUELA', 'JULIA', 'JESUS', 'ANDREA', 'BELEN', 'ALBA', 'SILVIA', 'ESTHER', 'IRENE', 'NURIA', 'ENCARNACION', 'MONTSERRAT', 'SANDRA', 'ANGELA', 'MONICA', 'ALICIA', 'INMACULADA', 'YOLANDA', 'MAR', 'SONIA', 'MARINA', 'SOFIA', 'SUSANA', 'MARGARITA', 'CLAUDIA', 'NATALIA', 'CAROLINA', 'INES', 'ALEJANDRA', 'DANIELA', 'CARLA', 'VERONICA', 'AMPARO', 'GLORIA', 'LOURDES', 'NIEVES', 'LUZ', 'SOLEDAD', 'NOELIA', 'LORENA', 'FATIMA', 'BEGOÑA', 'BLANCA', 'OLGA', 'NEREA', 'MIRIAM', 'CLARA', 'CONSUELO', 'ASUNCION', 'MILAGROS', 'ESPERANZA', 'MARTINA', 'LIDIA', 'CATALINA', 'ADRIANA', 'CELIA', 'ANNA', 'AURORA', 'MAGDALENA', 'EMILIA', 'ELISA', 'VANESA', 'AINHOA', 'VIRGINIA', 'EUGENIA', 'DIANA', 'GEMA', 'ALEXANDRA', 'VALERIA'
        ];

        $spanishSurnames = [
            'GARCIA', 'RODRIGUEZ', 'GONZALEZ', 'FERNANDEZ', 'LOPEZ', 'MARTINEZ', 'SANCHEZ', 'PEREZ', 'GOMEZ', 'MARTIN', 'JIMENEZ', 'HERNANDEZ', 'RUIZ', 'DIAZ', 'MORENO', 'MUÑOZ', 'ALVAREZ', 'ROMERO', 'GUTIERREZ', 'ALONSO', 'NAVARRO', 'TORRES', 'DOMINGUEZ', 'RAMOS', 'VAZQUEZ', 'RAMIREZ', 'GIL', 'SERRANO', 'MORALES', 'MOLINA', 'BLANCO', 'SUAREZ', 'CASTRO', 'ORTEGA', 'DELGADO', 'ORTIZ', 'MARIN', 'RUBIO', 'NUÑEZ', 'MEDINA', 'SANZ', 'CASTILLO', 'IGLESIAS', 'CORTES', 'GARRIDO', 'SANTOS', 'GUERRERO', 'LOZANO', 'CANO', 'CRUZ', 'MENDEZ', 'FLORES', 'PRIETO', 'HERRERA', 'PEÑA', 'LEON', 'MARQUEZ', 'CABRERA', 'GALLEGO', 'CALVO', 'VIDAL', 'CAMPOS', 'REYES', 'VEGA', 'FUENTES', 'CARRASCO', 'DIEZ', 'AGUILAR', 'CABALLERO', 'NIETO', 'SANTANA', 'VARGAS', 'PASCUAL', 'GIMENEZ', 'HERRERO', 'HIDALGO', 'MONTERO', 'LORENZO', 'SANTIAGO', 'BENITEZ', 'DURAN', 'IBAÑEZ', 'ARIAS', 'MORA', 'FERRER', 'CARMONA', 'VICENTE', 'ROJAS', 'SOTO', 'CRESPO', 'ROMAN', 'PASTOR', 'VELASCO', 'PARRA', 'SAEZ', 'MOYA', 'BRAVO', 'RIVERA', 'GALLARDO', 'SOLER'
        ];

        $emailHosts = [
            'GMAIL', 'YAHOO', 'OUTLOOK', 'HOTMAIL'
        ];

        $createMultipleBookings = [];

        for ($i = 1; $i <= 25; $i++){
            $random_name = array_rand($spanishNames, 1);
            $random_surname_1 = array_rand($spanishSurnames, 1);
            $random_surname_2 = array_rand($spanishSurnames, 1);
            $random_phone = random_int(600000000, 1000000000);
            $random_email_host = array_rand($emailHosts, 1);
            $random_email = strtolower($spanishNames[$random_name] . $spanishSurnames[$random_surname_1] . $spanishSurnames[$random_surname_2] . '@'. $emailHosts[$random_email_host] . '.com');
            $random_people_qty = random_int(1, 25);
            $random_date = Carbon::today()->addDays(rand(0, 30));
            $random_date -> hour = random_int(12, 23);
            $random_date -> minute = random_int(0, 59);
            $random_date -> second = 0;

            $createMultipleBookings[] = [
                'booker_name' => strtolower($spanishNames[$random_name]),
                'booker_phone' => $random_phone,
                'booker_email' => strtolower($random_email),
                'people_quantity' => $random_people_qty,
                'date' => $random_date,
                'time' => $random_date,
            ];
        }

        DB::table('bookings')->insert($createMultipleBookings);
    }
}
