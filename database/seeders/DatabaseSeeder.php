<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Item;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        for ($i=1;$i<=10;$i++) {
            Client::create([
                'name_ar' => 'عميل '."$i",
                'name_en'=>'Client '."$i"
            ]);
        }

        /*for ($i=1;$i<=10;$i++) {
            Item::create([
                'name_ar' => 'صنف  '."$i",
                'name_en'=>'Item '."$i",
                'price'=>fake()->randomFloat(2,1,999),
            ]);
        }*/
    }
}
