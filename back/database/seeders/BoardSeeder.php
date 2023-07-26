<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $createMultipleBoards = [];

        for ($i = 0; $i < 25; $i++){
            $random_board_capacity = random_int(1, 15);
            $random_board_available = true;
            $random_number = random_int(1, 25);
            $random_employee_id = random_int(1, 15);

            $createMultipleBoards[] = [
                'available' => $random_board_available,
                'capacity' => $random_board_capacity,
                'number' => $random_number,
                'employee_id' => $random_employee_id

            ];
        }

        DB::table('boards')->insert($createMultipleBoards);
    }
}

