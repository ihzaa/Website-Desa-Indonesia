<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        DB::table('admins')->insert([
            'username' => 'admin',
            'password' => Hash::make('123')
        ]);

        DB::table('home_categories')->insert([
            [
                'id' => 1,
                'category_name' => 'Visi Misi'
            ],
            [
                'id' => 2,
                'category_name' => 'Sejarah Desa'
            ],
            [
                'id' => 3,
                'category_name' => 'Profil Desa'
            ],
            [
                'id' => 4,
                'category_name' => 'Wilayah Desa'
            ]
        ]);
    }
}
