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

        /* -- Reponses pour les questions de sport -- */

        //Question 1
        DB::table('answers')->insert([
            'question_id' => 1,
            'label' => 'Tennis',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 1,
            'label' => 'Water-polo',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 1,
            'label' => 'Hockey',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 1,
            'label' => 'Formule 1',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 2
        DB::table('answers')->insert([
            'question_id' => 2,
            'label' => 'Patinage',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 2,
            'label' => 'Volley-ball',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 2,
            'label' => 'Ski',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 2,
            'label' => 'Tennis',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 3
        DB::table('answers')->insert([
            'question_id' => 3,
            'label' => 'Base-ball',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 3,
            'label' => 'Basket-ball',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 3,
            'label' => 'Football américain',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 3,
            'label' => 'Gymnastique',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 4
        DB::table('answers')->insert([
            'question_id' => 4,
            'label' => 'Patinage',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 4,
            'label' => 'Tennis',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 4,
            'label' => 'Athlétisme',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 4,
            'label' => 'Gymnastique',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 5
        DB::table('answers')->insert([
            'question_id' => 5,
            'label' => 'Tennis',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 5,
            'label' => 'Polo',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 5,
            'label' => 'Natation',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 5,
            'label' => 'Rugby',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 6
        DB::table('answers')->insert([
            'question_id' => 6,
            'label' => 'Voile',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 6,
            'label' => 'Ski',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 6,
            'label' => 'Football',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 6,
            'label' => 'Escrime',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 7
        DB::table('answers')->insert([
            'question_id' => 7,
            'label' => 'Cyclisme',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 7,
            'label' => 'Tennis',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 7,
            'label' => 'Basket-ball',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 7,
            'label' => 'Athlétisme',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 8
        DB::table('answers')->insert([
            'question_id' => 8,
            'label' => 'Badminton',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 8,
            'label' => 'Rugby',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 8,
            'label' => 'Formule 1',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 8,
            'label' => 'Golf',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 9
        DB::table('answers')->insert([
            'question_id' => 9,
            'label' => 'Golf',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 9,
            'label' => 'Tennis',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 9,
            'label' => 'Football',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 9,
            'label' => 'Athlétisme',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 10
        DB::table('answers')->insert([
            'question_id' => 10,
            'label' => 'Cyclisme',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 10,
            'label' => 'Handball',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 10,
            'label' => 'Ski',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 10,
            'label' => 'Volley-ball',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 11
        DB::table('answers')->insert([
            'question_id' => 11,
            'label' => 'Natation',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 11,
            'label' => 'Tennis',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 11,
            'label' => 'Rugby',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 11,
            'label' => 'Formule 1',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 12
        DB::table('answers')->insert([
            'question_id' => 12,
            'label' => 'Judo',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 12,
            'label' => 'Boxe',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 12,
            'label' => 'Hockey',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 12,
            'label' => 'Basket-ball',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 13
        DB::table('answers')->insert([
            'question_id' => 13,
            'label' => 'Formule 1',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 13,
            'label' => 'Athlétisme',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 13,
            'label' => 'Lutte',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 13,
            'label' => 'Biathlon',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 14
        DB::table('answers')->insert([
            'question_id' => 14,
            'label' => 'Golf',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 14,
            'label' => 'Natation',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 14,
            'label' => 'Base-ball',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 14,
            'label' => 'Handball',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 15
        DB::table('answers')->insert([
            'question_id' => 15,
            'label' => 'Escrime',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 15,
            'label' => 'Football',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 15,
            'label' => 'Tennis',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 15,
            'label' => 'Golf',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        /* -- Reponses pour les questions de culture générale -- */

        //Question 16
        DB::table('answers')->insert([
            'question_id' => 16,
            'label' => '1832',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 16,
            'label' => '1958',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 16,
            'label' => '1962',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 16,
            'label' => '1998',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 17
        DB::table('answers')->insert([
            'question_id' => 17,
            'label' => 'cotation assidue en continu',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 17,
            'label' => 'contrôle annuel en continu',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 17,
            'label' => 'capacité assistée en continu',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 17,
            'label' => 'cotation assistée en continu',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 18
        DB::table('answers')->insert([
            'question_id' => 18,
            'label' => 'Menahem Begin',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 18,
            'label' => 'Anouard El Sadate',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 18,
            'label' => 'Golda Meir',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 18,
            'label' => 'Franklin Roosevelt',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 19
        DB::table('answers')->insert([
            'question_id' => 19,
            'label' => 'Hassan Il',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 19,
            'label' => 'le Pacha de Marrachech',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 19,
            'label' => 'Mohammed VI',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        //Question 20
        DB::table('answers')->insert([
            'question_id' => 20,
            'label' => 'la principauté d\'Andorre',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 20,
            'label' => 'la principauté de Monaco',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 20,
            'label' => 'la Yougoslavie',
            'correct' => false,
            'created_at' => $date,
            'updated_at' => $date
        ]);
        DB::table('answers')->insert([
            'question_id' => 20,
            'label' => 'le Vatican',
            'correct' => true,
            'created_at' => $date,
            'updated_at' => $date
        ]);
    }
}
