<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
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
        
        $teams = [
            'WAITER', 'COOK', 'DELIVERY', 'CHEF', 'MANAGER'
        ];

        $emailHosts = [
            'GMAIL', 'YAHOO', 'OUTLOOK', 'HOTMAIL'
        ];

        $work_shifts = [
            'MORNING', 'AFTERNOON', 'EVENING'
        ];

        $createMultipleEmployees = [];

        for ($i = 1; $i <= 15; $i++){
            $random_name = array_rand($spanishNames, 1);
            $random_surname_1 = array_rand($spanishSurnames, 1);
            $random_surname_2 = array_rand($spanishSurnames, 1);
            $random_team = array_rand($teams, 1);
            $random_phone = random_int(600000000, 1000000000);
            $random_email_host = array_rand($emailHosts, 1);
            $random_email = strtolower($spanishNames[$random_name] . $spanishSurnames[$random_surname_1] . $spanishSurnames[$random_surname_2] . '@'. $emailHosts[$random_email_host] . '.com');
            $random_work_shift = array_rand($work_shifts, 1);
            $random_bank_account = 'ES'.strval(sprintf('%04u', random_int(0, 9999))).strval(sprintf('%04u', random_int(0, 9999))).strval(sprintf('%02u', random_int(0, 99))).strval(sprintf('%04u', random_int(0, 9999))).strval(sprintf('%04u', random_int(0, 9999))).strval(sprintf('%02u', random_int(0, 99)));
            $random_password = strtolower(Str::random(16));
            $random_address = Str::random(50);

            $createMultipleEmployees[] = [
                'name' => strtolower($spanishNames[$random_name]),
                'surname_1' => strtolower($spanishSurnames[$random_surname_1]),
                'surname_2' => strtolower($spanishSurnames[$random_surname_2]),
                'team' => strtolower($teams[$random_team]),
                'phone' => $random_phone,
                'email' => strtolower($random_email),
                'work_shift' => strtolower($work_shifts[$random_work_shift]),
                'bank_account' => $random_bank_account,
                'password' => Hash::make($random_password),
                'address' => $random_address
            ];
        }

        DB::table('employees')->insert($createMultipleEmployees);
    }
}
