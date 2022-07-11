<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $infosSchool = [
            'nomEtablissement' => 'THE WISE',
            'addressLine1' => 'Lomé Agoè-Zongo',
            'addressLine2' => 'Agoè Zongo Fidokpui',
            'nomResponsable' => 'Mr Jean Paul',
            'posteResponsable' => 'Proviseur',
            'nomDRE' => 'Lorem Ipsum',
            'nomIESEG' => 'Dolor Emmet'
        ];

        School::create($infosSchool);
    }
}
