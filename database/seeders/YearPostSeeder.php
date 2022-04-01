<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class YearPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();

        foreach(range(1,30) as $index)
        {
            DB::table('year_posts')->insert([
                'post_id'=>rand(1,19),
                'year_id'=>rand(1,2),
            ]);
        }
    }
}
