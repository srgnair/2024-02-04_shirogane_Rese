<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
                'email_verified_at' => now(),
                'password' => bcrypt('userpassword'),
                'created_at' => now(),
                'updated_at' => now(),
                'uuid' => null

            ],
            [
                'name' => 'mainAdmin',
                'role' => 'mainAdmin',
                'email' => 'mainAdmin@mainadmin.com',
                'email_verified_at' => now(),
                'password' => bcrypt('mainadminpassword'),
                'created_at' => now(),
                'updated_at' => now(),
                'uuid' => null
            ],
            [
                'name' => 'shopAdmin',
                'role' => 'shopAdmin',
                'email' => 'shopAdmin@shopadmin.com',
                'email_verified_at' => now(),
                'password' => bcrypt('shopadminpassword'),
                'created_at' => now(),
                'updated_at' => now(),
                'uuid' => (string) Str::uuid(),
            ],
        ]);
    }
}
