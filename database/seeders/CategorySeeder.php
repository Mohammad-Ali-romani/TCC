<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names=['advertisment','lecture','mark','program'];
        //$names=['اعلان','محاضرة','علامة','برنامج'];
        foreach($names as $name)
        {
            DB::table('categories')->insert([
                'name'=>$name,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }
       
    }
}
