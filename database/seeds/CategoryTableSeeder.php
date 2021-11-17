<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['world', 'technology', 'design', 'culture', 'business', 'politics', 'opinion', 'science', 'health', 'style', 'travel'];

        foreach($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->slug = Str::of($newCategory->name)->slug('-');
            $newCategory->save();
        }
    }
}
