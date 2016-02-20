<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = \Carbon\Carbon::now();
        $date = $date->toDateTimeString();

        DB::table('users')->insert([
            'id' => 10207739955836859,
            'token' => 'CAAX89cP091gBAFI7DEWkrgjjtVAt8HDFBlAb5H5VIrgfCMhx7JyooY4cbxmxgQb1N0eGBDqNuBBUSvGXrUkYYgxjH0gFqcvnxnoG9BIOu8dwtYNcN383sBZAYQGRZBitPewQxbRiCwzbXJtdPrplGvvdmvhv9z8hWMdhvnZA0gWMMwYsVzbKLS3lR1kqGJZCr1TKI1rBBwZDZD',
            'email' => 'freak_a_zoid@hotmail.fr',
            'first_name' => 'Antoine',
            'last_name' => 'Cusset',
            'avatar' => 'https://graph.facebook.com/v2.5/10207739955836859/picture?type=normal',
            'avatar_original' => 'https://graph.facebook.com/v2.5/10207739955836859/picture?width=1920',
            'gender' => 'male',
            'created_at' => $date,
            'updated_at' => $date,
            'admin' => true,
            'age' => 21,
            'city' => 'Paris',
            'country' => 'France'
        ], [
            'id' => 1679138425675836,
            'token' => 'CAAX89cP091gBAIn8D2iyqXaio31j0ti1lPyDwNKAfmn9MQ15WBVvXhQcvYOMt8Go5SGeXasoKydaZAE3jZCpgrVZA9RSw0HMOrRsjWJlqjt28CuZBnp2Lrv7K4NuvXUzJn6lI0YuZAmdyCS0NydIMgFdFRLkjJaddZBCsLRESiFD6VMh7Mp1dn44EV4sZCL0dUZD',
            'email' => 'hugopiso@yahoo.com',
            'first_name' => 'Hugo',
            'last_name' => 'Piso',
            'avatar' => 'https://graph.facebook.com/v2.5/1679138425675836/picture?type=normal',
            'avatar_original' => 'https://graph.facebook.com/v2.5/1679138425675836/picture?width=1920',
            'gender' => 'male',
            'created_at' => $date,
            'updated_at' => $date,
            'admin' => true,
            'age' => 21,
            'city' => 'Paris',
            'country' => 'France'
        ]);
    }
}
