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
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 2,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 3,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 4,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 5,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 6,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 7,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 8,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 9,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 10,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 11,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 12,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 13,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 14,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 1,
            'question_id' => 15,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        DB::table('questions_quizzs')->insert([
            'quizz_id' => 2,
            'question_id' => 16,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 2,
            'question_id' => 17,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 2,
            'question_id' => 18,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 2,
            'question_id' => 19,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 2,
            'question_id' => 20,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 2,
            'question_id' => 10,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 2,
            'question_id' => 3,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions_quizzs')->insert([
            'quizz_id' => 2,
            'question_id' => 1,
            'order' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }
}
