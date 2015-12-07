<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        $date = $date->toDateTimeString();
        /**
         * Question n°1
         */
        DB::table('answers')->insert([
            'question_id' => intval(DB::table('questions')->all()->first()->id),
            'label' => 'La Thaîlande',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => intval(DB::table('questions')->all()->first()->id),
            'label' => 'La Cambodge',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => intval(DB::table('questions')->all()->first()->id),
            'label' => 'La Malaisie',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => intval(DB::table('questions')->all()->first()->id),
            'label' => 'L\'indonésie',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        /**
         * Question n°2
         */
        DB::table('answers')->insert([
            'question_id' => intval(DB::table('questions')->all()->first()->id + 1),
            'label' => 'Qu\'il n\'est pas arrivé à Toronto',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => intval(DB::table('questions')->all()->first()->id + 1),
            'label' => 'Qu\'il était supposé arriver à Toronto ...',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => intval(DB::table('questions')->all()->first()->id + 1),
            'label' => '"Qu\'est-ce qu\'il fout ce maudit pancake, tabernacle ?"',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => intval(DB::table('questions')->all()->first()->id + 1),
            'label' => 'La réponse D',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }
}
