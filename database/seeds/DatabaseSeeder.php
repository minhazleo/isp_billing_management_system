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
        DB::table('users')->insert([
            'name' => 'minhaz',
            'email' => 'minhaznew@gmail.com',
            'password' => Hash::make('q1w2e3r4'),
            'phone' => '01950822455',
            'address' => 'Jessor',
            'zip_code' => '4527',
            'type' => 'administrator',
            'created_at' => new DateTime(now()),
            'updated_at' => new DateTime(now()),
        ]);
    }
}
