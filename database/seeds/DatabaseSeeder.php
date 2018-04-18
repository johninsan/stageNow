<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_type')->insert([ //mengisi datadi database
            'nama' => 'EventOrganizer/Kafe',
            'deskripsi' => 'NULL',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('user_type')->insert([ //mengisi datadi database
            'nama' => 'Musisi',
            'deskripsi' => 'NULL',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('user_type')->insert([ //mengisi datadi database
            'nama' => 'Admin',
            'deskripsi' => 'NULL',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $faker = Faker\Factory::create(); //import library faker
        $limit = 20; //batasan berapa banyak data
        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([ //mengisi datadi database
                'nama' => $faker->name,
                'email' => $faker->unique()->email, //email unique sehingga tidak ada yang sama
                'password' => bcrypt('secret'),
                'tipe' => random_int(1,2),
                'nohp' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
