<?php

namespace App\Repositories;

use App\Models\BlogPost;

class BlogPostRepository
{
    public function getBlogPosts(): \Illuminate\Database\Eloquent\Collection
    {
        return BlogPost::all();
    }

    public function createBlogPost(string $title, string $content): BlogPost
    {
        return BlogPost::create([
            'title' => $title,
            'content' => $content
        ]);
    }
}