<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = Post::get();
        $tags = Tag::get();

        foreach ($post as $post)
        {
            $tag_ids = $tags -> random(rand(1, 3)) -> pluck('id') -> toArray();
            $post -> tags() -> sync($tag_ids);
        }
    }
}
