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
        // User::factory(10)->create();
        
        $this->call([ClasseTableSeeder::class]);
        $this->call([MatiereTableSeeder::class]);
        $this->call([SchoolTableSeeder::class]);
        $this->call([RoleTableSeeder::class]);
        $this->call([ScolariteTableSeeder::class]);
    }
}
