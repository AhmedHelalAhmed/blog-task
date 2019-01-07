<?php

use Illuminate\Database\Seeder;
use App\Category as Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('categories')->get()->count() == 0)
        {
            factory(Category::class, 10)->create();
        }
        else
        {
            echo "\nError ! there is 5 Categories to test\n";
        }
    }
}
