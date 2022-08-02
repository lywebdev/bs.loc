<?php

namespace Database\Seeders;

use App\Models\Blog\Post;
use Illuminate\Database\Seeder;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(50)->create();
    }
}
