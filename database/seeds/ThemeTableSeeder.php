<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ThemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $date = Carbon::now();
        $date = $date->toDateTimeString();

        DB::table('themes')->insert([
            'label' => 'Général',
            'description' => 'Des questions de tout ordre',
            'color_nav' => '#C65F5D',
            'color_elements' => '#FFFFFF',
            'created_at' => $date,
            'updated_at' => $date,
            'logo'     =>   'https://questiongames.ca/wp-content/uploads/2015/10/Question-Logo-Question.jpg'
        ]);
        DB::table('themes')->insert([
            'label' => 'Sport',
            'description' => 'Des questions sur les différents sports',
            'color_nav' => '#476390',
            'color_elements' => '#FFFFFF',
            'created_at' => $date,
            'updated_at' => $date,
            'logo'     =>   'https://questiongames.ca/wp-content/uploads/2015/10/Question-Logo-Question.jpg'
        ]);
        DB::table('themes')->insert([
            'label' => 'Nature',
            'description' => 'Des questions sur les plantes, les animaux et la planète',
            'color_nav' => '#476390',
            'color_elements' => '#FFFFFF',
            'created_at' => $date,
            'updated_at' => $date,
            'logo'     =>   'https://questiongames.ca/wp-content/uploads/2015/10/Question-Logo-Question.jpg'
        ]);
    }
}
