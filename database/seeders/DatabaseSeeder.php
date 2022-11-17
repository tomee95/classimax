<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AdCategory;
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
//         \App\Models\User::factory(10)->create();

         AdCategory::factory()->create([
             'name' => 'Vehicles'
         ]);
         AdCategory::factory()->create([
             'name' => 'Clothing (Women)'
         ]);
         AdCategory::factory()->create([
             'name' => 'Clothing (Men)'
         ]);
        AdCategory::factory()->create([
            'name' => 'Sport'
        ]);
        AdCategory::factory()->create([
            'name' => 'Electronics'
        ]);
        AdCategory::factory()->create([
            'name' => 'Industry'
        ]);
        AdCategory::factory()->create([
            'name' => 'Food'
        ]);
        AdCategory::factory()->create([
            'name' => 'Jewelry'
        ]);
        AdCategory::factory()->create([
            'name' => 'Art'
        ]);
        AdCategory::factory()->create([
            'name' => 'Home & Garden'
        ]);
        AdCategory::factory()->create([
            'name' => 'Real Estate'
        ]);
    }
}
