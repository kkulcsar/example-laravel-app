<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\AziELuni;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Resources\BlogPostResource;
use App\Models\BlogPost;
use App\Repositories\BlogPostRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public BlogPostRepository $blogPostRepository;

    public function __construct(BlogPostRepository $blogPostRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
    }

    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $post = $this->blogPostRepository->getBlogPosts();

        return BlogPostResource::collection($post);
    }

    public function store(BlogPostCreateRequest $request): BlogPostResource
    {
        Gate::authorize('create', BlogPost::class);

        $title = $request->string('title' );
        $content = $request->string('content');

        $post = $this->blogPostRepository->createBlogPost($title, $content);

        return new BlogPostResource($post);
    }
}
