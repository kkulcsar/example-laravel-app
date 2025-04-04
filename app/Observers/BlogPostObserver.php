<?php

namespace App\Observers;

use App\Models\BlogPost;
use Illuminate\Support\Facades\DB;

class BlogPostObserver
{
    /**
     * Handle the BlogPost "saving" event.
     */
    public function saving(BlogPost $blogPost): void
    {
        if ($blogPost->slug) {
            return;
        }

        $slug = strtolower(str_replace(' ', '-', $blogPost->title));
        $similarSlugs = DB::table('blog_posts')
                ->whereLike('slug', '%' . $slug . '%', caseSensitive: true)
                ->get();

        $blogPost->slug = $slug . '-' . $similarSlugs->count() + 1;
    }
}
