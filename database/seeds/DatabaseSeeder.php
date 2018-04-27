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
        //wilayah
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Aceh',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Bali',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Banten',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Bengkulu',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Gorontalo',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Jakarta',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Jambi',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Jawa Barat',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Jawa Tengah',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Jawa Timur',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Kalimantan Barat',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Kalimantan Selatan',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Kalimantan Tengah',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Kalimantan Timur',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Kalimantan Utara',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Kep.Bangka',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Kep.Riau',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Lampung',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Maluku',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Maluku Utara',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Nusa Tenggara Barat',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Nusa Tenggara Timur',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Papua',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Papua Barat',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Riau',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Sulawesi Barat',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Sulawesi Utara',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Sulawesi Tengah',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Sulawesi Tenggara',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Sulawesi Selatan',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Sumatera Barat',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Sumatera Utara',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Sumatera Selatan',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('wilayah')->insert([ //mengisi datadi database
            'nama' => 'Yogyakarta',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        

        // $faker = Faker\Factory::create(); //import library faker
        // $limit = 20; //batasan berapa banyak data
        // for ($i = 0; $i < $limit; $i++) {
        //     DB::table('users')->insert([ //mengisi datadi database
        //         'nama' => $faker->name,
        //         'email' => $faker->unique()->email, //email unique sehingga tidak ada yang sama
        //         'password' => bcrypt('secret'),
        //         'tipe' => random_int(1,2),
        //         'nohp' => $faker->phoneNumber,
        //         'alamat' => $faker->address,
        //         'created_at' => date('Y-m-d H:i:s')
        //     ]);
        // }
    }
}
