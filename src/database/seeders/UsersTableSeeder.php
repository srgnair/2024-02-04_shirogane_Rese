<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            [
                'name' => 'user',
                'role' => 'user',
                'email' => 'user@user.com',
                'password' => bcrypt('userpassword'),
            ],
            [
                'name' => 'mainAdmin',
                'role' => 'mainAdmin',
                'email' => 'mainAdmin@mainadmin.com',
                'password' => bcrypt('mainadminpassword'),
            ],
            [
                'name' => 'shopAdmin',
                'role' => 'shopAdmin',
                'email' => 'shopAdmin@shopadmin.com',
                'password' => bcrypt('shopadminpassword'),
            ],
        ]);
    }
}
