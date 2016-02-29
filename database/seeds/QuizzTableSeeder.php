<?php

use Illuminate\Database\Seeder;

class QuizzTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $date = \Carbon\Carbon::now();
        $startDate = $date->yesterday()->toDateTimeString();
        $endDate = $date->tomorrow()->toDateTimeString();
        $date = $date->toDateTimeString();

        DB::table('quizzs')->insert([
            'label' => 'Quizz de sport',
            'description' => 'À vous de retrouver dans quelle discipline ces sportifs se sont-ils illustrés !',
            'starting_at' => $startDate,
            'ending_at' => $endDate,
            'actif' => true,
            'max_question' => 12,
            'theme_id' => 2,
            'created_at' => $date,
            'updated_at' => $date,
            'titre_lot' => 'Tentez de gagner ce super cadeau',
            'desc_lot'  => 'Ce super cadeau vous servira au quotidien et vous aidera dans toute vos taches !',
            'image_lot' => 'http://files.veloscouches.webnode.fr/200000438-ae3aaaf346/cadeau.png'
        ]);

        DB::table('quizzs')->insert([
            'label' => 'Quizz de culture générale',
            'description' => 'Vous trouverez des questions de tout ordre (politique, sport, géographie,...) ',
            'starting_at' => $startDate,
            'ending_at' => $endDate,
            'actif' => false,
            'max_question' => 8,
            'theme_id' => 1,
            'created_at' => $date,
            'updated_at' => $date,
            'titre_lot' => 'Tentez de gagner ce super cadeau',
            'desc_lot'  => 'Ce super cadeau vous servira au quotidien et vous aidera dans toute vos taches !',
            'image_lot' => 'http://files.veloscouches.webnode.fr/200000438-ae3aaaf346/cadeau.png'
        ]);

    }
}
