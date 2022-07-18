<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Fondateur'],
            ['name' => 'Provieur ou Directeur'],
            ['name' => 'Enseignant'],
            ['name' => 'Secretaire'],
            ['name' => 'Econome'],
            ['name' => 'Surveillant'],
        ];

        foreach ($roles as $role) {
           
            Role::create($role);

        }
    }
}
