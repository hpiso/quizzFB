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
            'label' => 'Mon premier quizz',
            'description' => 'Le premier quizz de l\'application qui va servir de test',
            'starting_at' => $startDate,
            'ending_at' => $endDate,
            'actif' => true,
            'max_question' => 2,
            'theme_id' => 1,
            'created_at' => $date
        ]);

        DB::table('quizzs')->insert([
            'label' => 'Mon quizz test',
            'description' => 'Decription de mon quizz test',
            'starting_at' => $startDate,
            'ending_at' => $endDate,
            'actif' => true,
            'max_question' => 15,
            'theme_id' => 1,
            'created_at' => $date
        ]);

        
    }
}
