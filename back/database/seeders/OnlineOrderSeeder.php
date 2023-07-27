<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OnlineOrderSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $statuses = array(
            'ordered',
            'cooking',
            'delivering',
            'delivered'
        );

        $types = array(
            'delivery',
            'pick_up'
        );
        
        $createMultipleOnlineOrders = [];

        for ($i = 0; $i < 25; $i++){
            $amount = mt_rand(1*100,200*100)/100;
            $time = mt_rand(0, 60) / mt_getrandmax();
            $random_date = Carbon::now()->subHour($time);
            $time = mt_rand(0, 240) / mt_getrandmax();
            $random_expected_date = Carbon::now()->addHour($time);
            $random_address = Str::random(50);
            $random_status = array_rand($statuses, 1);
            $random_type = array_rand($types, 1);
            $random_customer_id = mt_rand(1, 50);
            $random_employee_id = mt_rand(1, 15);

            $createMultipleOnlineOrders[] = [
                'amount' => $amount,
                'date' => $random_date,
                'expected_date' => $random_expected_date,
                'address' => $random_address,
                'status' => $statuses[$random_status],
                'type' => $types[$random_type],
                'customer_id' => $random_customer_id,
                'employee_id' => $random_employee_id
            ];
        }
        DB::table('online_orders')->insert($createMultipleOnlineOrders);
    }
}
