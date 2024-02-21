<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'user_id' => 1,
            'shop_id' => 1,
            'star' => 4,
            'comment' => "とてもおいしかったです。",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}