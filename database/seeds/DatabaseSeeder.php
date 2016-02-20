<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        $this->call('ThemeTableSeeder');
        $this->call('QuestionTableSeeder');
        $this->call('AnswerTableSeeder');
        $this->call('QuizzTableSeeder');
        $this->call('QuestionsQuizzTableSeeder');
        $this->call('UserTableSeeder');

        Model::reguard();
    }
}
