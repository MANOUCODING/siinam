<?php

namespace Database\Seeders;

use App\Models\Classe;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class ClasseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Liste des classes du Lycée Moderne

        $classesLyceeModerne = [

            [
                'nomClasse' => 'Terminal A4',
                'codeClasse' => 'Tle A4',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Moderne',
                'finDeCycle' => 1,
                'capacite' => 50,
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Terminal D',
                'codeClasse' => 'Tle D',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Moderne',
                'finDeCycle' => 1,
                'capacite' => 50,
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Terminal C4',
                'codeClasse' => 'Tle C4',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Moderne',
                'finDeCycle' => 1,
                'capacite' => 50,
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Premiere C4',
                'codeClasse' => '1ere C4',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Moderne',
                'finDeCycle' => 0,
                'capacite' => 50,
                'classeSuperieure' => 'Terminal C4',
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Premiere D',
                'codeClasse' => '1ere D',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Moderne',
                'finDeCycle' => 0,
                'capacite' => 50,
                'classeSuperieure' => 'Terminal D',
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Premiere A4',
                'codeClasse' => '1ere A4',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Moderne',
                'finDeCycle' => 0,
                'capacite' => 50,
                'classeSuperieure' => 'Terminal A4',
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Seconde A4',
                'codeClasse' => 'Scde A4',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Moderne',
                'finDeCycle' => 0,
                'capacite' => 50,
                'classeSuperieure' => 'Premiere A4',
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Seconde CD',
                'codeClasse' => 'Scde CD',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Moderne',
                'finDeCycle' => 0,
                'capacite' => 50,
                'classeSuperieure' => 'Premiere D',
                'sousClasses' => 0,
            ],
        ];

        foreach ($classesLyceeModerne as $classeLyceeModerne) {
           
            Classe::create($classeLyceeModerne);

        }

        //Liste des classes du Lycée Technique

        $classesLyceeTechnique = [

            [
                'nomClasse' => 'Terminal G1',
                'codeClasse' => 'Tle G1',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Technique',
                'finDeCycle' => 1,
                'capacite' => 50,
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Terminal G2',
                'codeClasse' => 'Tle G2',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Technique',
                'finDeCycle' => 1,
                'capacite' => 50,
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Terminal G3',
                'codeClasse' => 'Tle G3',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Technique',
                'finDeCycle' => 1,
                'capacite' => 50,
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Premiere G1',
                'codeClasse' => '1ere G1',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Technique',
                'finDeCycle' => 0,
                'capacite' => 50,
                'classeSuperieure' => 'Terminal G1',
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Premiere G2',
                'codeClasse' => '1ere G2',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Technique',
                'finDeCycle' => 0,
                'capacite' => 50,
                'classeSuperieure' => 'Terminal G2',
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Premiere G3',
                'codeClasse' => '1ere G3',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Technique',
                'finDeCycle' => 0,
                'capacite' => 50,
                'classeSuperieure' => 'Terminal G3',
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Seconde G1',
                'codeClasse' => 'Scde G1',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Technique',
                'finDeCycle' => 0,
                'capacite' => 50,
                'classeSuperieure' => 'Premiere G1',
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Seconde G2',
                'codeClasse' => 'Scde G2',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Technique',
                'finDeCycle' => 0,
                'capacite' => 50,
                'classeSuperieure' => 'Premiere G2',
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Seconde G1',
                'codeClasse' => 'Scde G1',
                'cycle' => 'Deuxième',
                'section' => 'Lycée Technique',
                'finDeCycle' => 0,
                'capacite' => 50,
                'classeSuperieure' => 'Premiere G1',
                'sousClasses' => 0,
            ],
        ];

        foreach ($classesLyceeTechnique as $classeLyceeTechnique) {
           
            Classe::create($classeLyceeTechnique);

        }

        // Liste des classes du collège

        $classesCollege = [

            [
                'nomClasse' => 'Sixième',
                'codeClasse' => '6ième',
                'cycle' => 'Premier',
                'section' => 'Collège',
                'finDeCycle' => 0,
                'capacite' => 50,
                'classeSuperieure' => 'Cinquième',
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Cinquième',
                'codeClasse' => '5ième',
                'cycle' => 'Premier',
                'section' => 'Collège',
                'finDeCycle' => 0,
                'capacite' => 50,
                'classeSuperieure' => 'Quatrième',
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Quatrième',
                'codeClasse' => '4ième',
                'cycle' => 'Premier',
                'section' => 'Collège',
                'finDeCycle' => 0,
                'capacite' => 50,
                'classeSuperieure' => 'Troisième',
                'sousClasses' => 0,
            ],

            [
                'nomClasse' => 'Troisième',
                'codeClasse' => '3ième',
                'cycle' => 'Premier',
                'section' => 'Collège',
                'finDeCycle' => 1,
                'capacite' => 50,
                'sousClasses' => 0,
            ],

            
        ];

        foreach ($classesCollege as $classeCollege) {
           
            Classe::create($classeCollege);

        }


    }
}
