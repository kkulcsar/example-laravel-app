<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogPostResource;
use App\Repositories\BlogPostRepository;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public BlogPostRepository $blogPostRepository;

    public function __construct(BlogPostRepository $blogPostRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
    }

    public function index()
    {
        $post = $this->blogPostRepository->getBlogPosts();

        return BlogPostResource::collection($post);
    }
}
