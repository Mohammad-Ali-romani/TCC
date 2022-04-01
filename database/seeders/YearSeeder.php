<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names=['first year','second year'];
      //  $names=['سنة ثانية','سنة اولى'];
        foreach($names as $name)
        {
            DB::table('years')->insert([
                'name'=>$name,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
