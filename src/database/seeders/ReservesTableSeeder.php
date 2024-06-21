<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reserves')->insert([
            'user_id' => 1,
            'shop_id' => 1,
            'reserved_date' => now(),
            'reserved_time' => now(),
            'number' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
