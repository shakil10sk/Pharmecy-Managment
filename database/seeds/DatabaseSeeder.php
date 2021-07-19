<?php

// use App\Models\Manufacturer as ModelsManufacturer;

use Database\Seeders\Manufacturer;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
            UserSeeder::class,
            Manufacturer::class,
            MedicineCategorySeeder::class,
            MedicineTypeSeeder::class,
            MedicineUniteSeeder::class,
            MedicineLeafSeeder::class,
            MedicineSeeder::class,
        ]);
    }
}
