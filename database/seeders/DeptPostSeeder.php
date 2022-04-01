<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DeptPostSeeder extends Seeder
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
            DB::table('dept_posts')->insert([
                'post_id'=>rand(1,20),
                'dept_id'=>rand(1,3),
            ]);
        }
    }
}
