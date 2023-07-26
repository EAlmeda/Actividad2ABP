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
            $board_capacity = random_int(1, 15);
            $board_available = true;

            $createMultipleBoards[] = [
                'available' => $board_available,
                'capacity' => $board_capacity
            ];
        }

        DB::table('boards')->insert($createMultipleBoards);
    }
}

