<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();

         foreach(range(1,20) as $index)
         {
             DB::table('posts')->insert([
                'title'=>$faker->title(),
                'description'=>$faker->text(),
                 'category_id'=>rand(1,4),
                'user_id'=>rand(1,10),
                 'subject_id'=>rand(1,16),
             ]);
         }


    }
}
