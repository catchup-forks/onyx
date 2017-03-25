<?php namespace TestSeeds;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        factory(\App\Models\Category::class, 3)->create();
        factory(\App\Models\CategoryLocale::class, 3)->create();
    }
}
