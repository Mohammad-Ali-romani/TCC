<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names=['administrator','leaderDepartment','studentBody','student'];

        foreach($names as $name)
        {
            DB::table('levels')->insert([
                'name'=>$name,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
