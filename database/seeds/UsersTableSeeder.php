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
        //初期レコード記入
        DB::table('users')->insert([
            ['username' => '一郎',
            'mail' => 'ichiro@com',
            'password' => bcrypt('123')]
        ]);



    }
}
