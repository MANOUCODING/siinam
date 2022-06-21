<?php

namespace Database\Seeders;

use App\Models\Matiere;
use Illuminate\Database\Seeder;

class MatiereTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Liste des matieres Scientifiques

        $matieresScientifiques = [

            [
                'codeMatiere' => 'MATHS',
                'nomMatiere' => 'Mathématiques',
                'Categorie' => 'Matières Scientifiques',
                'OrdreBulletin' => 3,
            ],

            [
                'codeMatiere' => 'PC',
                'nomMatiere' => 'Sciences Physiques',
                'Categorie' => 'Matières Scientifiques',
                'OrdreBulletin' => 7,
            ],

            [
                'codeMatiere' => 'SVT',
                'nomMatiere' => 'Sciences de la Vie et de la Terre',
                'Categorie' => 'Matières Scientifiques',
                'OrdreBulletin' => 8,
            ],


        ];

        foreach ($matieresScientifiques as $matieresScientifiques) {

            Matiere::create($matieresScientifiques);

        }

        $matieresLitteraires = [

            [
                'codeMatiere' => 'FR',
                'nomMatiere' => 'Français',
                'Categorie' => 'Matières Littéraires',
                'OrdreBulletin' => 1,
            ],

            [
                'codeMatiere' => 'PHILO',
                'nomMatiere' => 'Philosophie',
                'Categorie' => 'Matières Littéraires',
                'OrdreBulletin' => 2,
            ],


            [
                'codeMatiere' => 'HG',
                'nomMatiere' => 'Histoire et Géographie',
                'Categorie' => 'Matières Littéraires',
                'OrdreBulletin' => 4,
            ],

            [
                'codeMatiere' => 'ANG',
                'nomMatiere' => 'Anglais',
                'Categorie' => 'Matières Littéraires',
                'OrdreBulletin' => 5,
            ],

            [
                'codeMatiere' => 'ALL',
                'nomMatiere' => 'Allemand',
                'Categorie' => 'Matières Littéraires',
                'OrdreBulletin' => 6,
            ],

            [
                'codeMatiere' => 'ECM',
                'nomMatiere' => 'Education Civique et Morale',
                'Categorie' => 'Matières Littéraires',
                'OrdreBulletin' => 12,
            ],

        ];

        foreach ($matieresLitteraires  as $matiereLitteraires ) {

            Matiere::create($matiereLitteraires );

        }

        $matieresFacultatives = [

            [
                'codeMatiere' => 'EPS',
                'nomMatiere' => 'Education Physique et Sportive',
                'Categorie' => 'Matières Facultatives',
                'OrdreBulletin' => 13,
            ],


        ];

        foreach ($matieresFacultatives  as $matiereFacultatives) {

            Matiere::create($matiereFacultatives);

        }
    }
}
