<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names=['Software engineering','computer engineering','Network Engineering'];
       // $names=['هندسة حواسيب','هندسة شبكات','هندسة برمجيات'];
        foreach($names as $name)
        {
            DB::table('depts')->insert([
                'name'=>$name,
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
        }
    }
}
