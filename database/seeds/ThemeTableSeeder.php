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
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('themes')->insert([
            'label' => 'Voiture',
            'description' => 'Des questions orientées belles mécaniques',
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('themes')->insert([
            'label' => 'Nature',
            'description' => 'Des questions sur les plantes, les animaux et la planète',
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }
}
