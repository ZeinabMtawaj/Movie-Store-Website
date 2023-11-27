<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Rating;
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
        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'user'
        ]);
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create([
            'role_id' =>1,
            'email' =>'zozo@example.com',
            $formFields['recommended'] = "[318,858,527,912,2019,2959,296,593,260,1252,913,1213,4226,903,608,1262,923,1267,745,1250]"

        ]);





    //    Rating::create([
    //        'userId' =>1,
    //        'movieId' =>1,
    //        'rating' =>2,
    //     //    'timestamp' => now()
    //    ]);
    }
}
