<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $date = Carbon::now();
        $date = $date->toDateTimeString();

        DB::table('questions')->insert([
            'label' => 'Bankok est la capitalle de ...',
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('questions')->insert([
            'label' => 'Lorsqu\'un pancake prend l\'avion à destination de Toronto et qu\'il fait une escale technique à St Claude, on dit :',
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }
}
