<?php

namespace Database\Seeders;

use App\Models\Scolarite;
use App\Models\TrancheScolarite;
use Illuminate\Database\Seeder;

class ScolariteTableSeeder extends Seeder
{

     

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Liste des classes du collège

        $sectionScolarite = [
            [
                'sectionClasse' => 'Collège',
                'fraisScolarite' => 80000,
                'nbreTranche' => 2,
            ],

            [
                'sectionClasse' => 'Lycée Moderne',
                'fraisScolarite' => 100000,
                'nbreTranche' => 2,
            ],

            [
                'sectionClasse' => 'Lycée Technique',
                'fraisScolarite' => 120000,
                'nbreTranche' => 2,
            ],
            
        ];

        $tranches = [
            [
                'scolarite_id' => 1,
                'prixTrancheScolarite' => 40000,
                'libelleTranche' => 'Première',
            ],

            [
                'scolarite_id' => 1,
                'prixTrancheScolarite' => 40000,
                'libelleTranche' => 'Deuxième',
            ],

            [
                'scolarite_id' => 2,
                'prixTrancheScolarite' => 50000,
                'libelleTranche' => 'Première',
            ],

            [
                'scolarite_id' => 2,
                'prixTrancheScolarite' => 50000,
                'libelleTranche' => 'Deuxième',
            ],

            [
                'scolarite_id' => 3,
                'prixTrancheScolarite' => 60000,
                'libelleTranche' => 'Première',
            ],

            [
                'scolarite_id' => 3,
                'prixTrancheScolarite' => 60000,
                'libelleTranche' => 'Deuxième',
            ],

        ];

        foreach ($sectionScolarite as $section) {
           
            Scolarite::create($section);

        }

        foreach ($tranches as $tranche) {
           
           TrancheScolarite::create($tranche);

        }

    }
}
