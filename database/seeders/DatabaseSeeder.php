<?php

namespace Database\Seeders;

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
        $this->call(CategorySeed::class);
        $this->call(UserSeed::class);
        $this->call(VacancySeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
