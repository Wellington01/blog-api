<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Wellington Cristi Vilela Santana',
            'email' => 'wellington.c.v.santana@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
