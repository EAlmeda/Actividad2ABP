<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KitchenOrderSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $statuses = array(
            'ordered',
            'cooking',
            'finished'
        );
        
        $createMultipleKitchenOrders = [];

        for ($i = 0; $i < 25; $i++){
            $time = mt_rand() / mt_getrandmax();
            $beginDate = Carbon::now()->addHour($time);
            $endDate = Carbon::now()->addHour();
            $status = array_rand($statuses, 1);
            $board_id = mt_rand(1, 25);

            $createMultipleKitchenOrders[] = [
                'beginDate' => $beginDate,
                'endDate' => $endDate,
                'status' => $statuses[$status],
                'board_id' => $board_id
            ];
        }

        DB::table('kitchen_orders')->insert($createMultipleKitchenOrders);
    }
}
