<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,30) as $index)
        {
            DB::table('urls')->insert([
                'url'=>$faker->url(),
                'file_type'=>'pdf',
                'post_id'=>rand(1,10),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
        
    }
}
