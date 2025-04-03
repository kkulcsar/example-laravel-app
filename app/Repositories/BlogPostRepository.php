<?php

namespace App\Repositories;

use App\Models\BlogPost;

class BlogPostRepository
{
    public function getBlogPosts(): \Illuminate\Database\Eloquent\Collection
    {
        return BlogPost::all();
    }
}