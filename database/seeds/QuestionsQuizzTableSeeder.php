<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class QuestionsQuizzTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $date = Carbon::now()->toDateTimeString();
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 1,
            'order' => 0,
            'created_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 2,
            'order' => 1,
            'created_at' => $date
        ]);
    }
}
