<?php

namespace Database\Seeders;

use App\Models\Category\Category;
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
        // \App\Models\User::factory(10)->create();

        // Catalog
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);

        // Blog
        $this->call(BlogCategoriesTableSeeder::class);
        $this->call(BlogPostsTableSeeder::class);
    }
}
