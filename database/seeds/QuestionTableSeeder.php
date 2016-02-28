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

        /* -- Question Sport -- */

        //1
        DB::table('questions')->insert([
            'label' => 'Dans quel sport s\'est illustré Nigel Mansel ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //2
        DB::table('questions')->insert([
            'label' => 'Dans quel sport s\'est illustrée Steffi Graf ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //3
        DB::table('questions')->insert([
            'label' => 'Dans quel sport s\'est illustré Michael Jordan ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //4
        DB::table('questions')->insert([
            'label' => 'Dans quel sport s\'est illustrée Nadia Comaneci ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //5
        DB::table('questions')->insert([
            'label' => 'Dans quel sport s\'est illustrée Dawn Fraser ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //6
        DB::table('questions')->insert([
            'label' => 'Dans quel sport s\'est illustré Jean-Claude Killy ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //7
        DB::table('questions')->insert([
            'label' => 'Dans quel sport s\'est illustré Jesse Owens ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //8
        DB::table('questions')->insert([
            'label' => 'Dans quel sport s\'est illustré Juan Manuel Fanigo ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //9
        DB::table('questions')->insert([
            'label' => 'Dans quel sport s\'est illustré Paavo Nurmi ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //10
        DB::table('questions')->insert([
            'label' => 'Dans quel sport s\'est illustré Eddy Merckx ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //11
        DB::table('questions')->insert([
            'label' => 'Dans quel sport s\'est illustré Rod Laver ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //12
        DB::table('questions')->insert([
            'label' => 'Dans quel sport s\'est illustré Marcel Cerdan ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //13
        DB::table('questions')->insert([
            'label' => 'Dans quel sport s\'est illustré Sergei Bubka ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //14
        DB::table('questions')->insert([
            'label' => 'Dans quel sport s\'est illustré Mark Splitz ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //15
        DB::table('questions')->insert([
            'label' => 'Dans quel sport s\'est illustré Bjorn Borg ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);


        /* -- Question Culture générale -- */

        //16
        DB::table('questions')->insert([
            'label' => 'Le suffrage universel pour l\'élection du Président de la République date de',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //17
        DB::table('questions')->insert([
            'label' => 'Dans l\'expression CAC 40 que veut dire l\'abréviation CAC:',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //18
        DB::table('questions')->insert([
            'label' => 'Qui proclama l\'indépendance d\'Israël le 14 mai 1948 ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //19
        DB::table('questions')->insert([
            'label' => 'Qui est l\'actuel roi du Maroc ?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //20
        DB::table('questions')->insert([
            'label' => 'Quel est le plus petit Etat du monde?',
            'created_at' => $date,
            'updated_at' => $date
        ]);

    }
}
