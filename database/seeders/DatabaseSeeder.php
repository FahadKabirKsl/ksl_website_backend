<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Http\Controllers\UserController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(
            [
                IpoSeeder::class
            ]
            );
            $this->call(UserSeeder::class);
            $this->call(DistrictSeeder::class);
            $this->call(DivisionSeeder::class);
            $this->call(UnionSeeder::class);
            $this->call(UpazilaSeeder::class);  //Upazilas were formerly known as thana, Despite the meaning,In 1982 thanas were re-termed to as upazilas with provisions for semi-autonomous local governance.
    }
}
