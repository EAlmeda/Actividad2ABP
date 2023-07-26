<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CustomerSeeder::class,
            AllergenSeeder::class,
            EmployeeSeeder::class,
            BoardSeeder::class,
            BookingSeeder::class,
            IngredientSeeder::class,
            ProductSeeder::class,
        ]);
    }
}
