<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $names=
        [
            'program 1',
            'program 2',
            'advanced programming 1',
            'advanced programming2',
            'electrical foundations',
            'operating system 1',
            'operating system 2',
            'computer entrance',
            'logic circuits',
            'ntegrative circuits',
            'computer architecture',
            'web design',
            'multimedia',
            'computer networks',
            'Databases 1',
            'Databases 2',
            'Software engineering',
        ];

        foreach($names as $name)
        {

            DB::table('subjects')->insert([
                'name'=>$name,
                'dept_id'=>rand(1,3),
                'year_id'=>rand(1,2),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
    }
}
