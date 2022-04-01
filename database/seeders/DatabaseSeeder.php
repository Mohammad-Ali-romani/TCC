<?php

namespace Database\Seeders;

use App\Models\Year_Posts;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
         YearSeeder::class,
         DeptSeeder::class,
         CategorySeeder::class,
         LevelSeeder::class,
         SubjectSeeder::class,
         UserSeeder::class,
         PostSeeder::class,
         UrlSeeder::class,
         YearPostSeeder::class,
         DeptPostSeeder::class,
       ]);
    }
}
