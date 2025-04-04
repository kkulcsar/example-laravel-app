<?php

namespace App\Models;

use App\Observers\BlogPostObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $content
 */

#[ObservedBy([BlogPostObserver::class])]
class BlogPost extends Model
{
    protected $fillable = [
        'title', 'slug', 'content'
    ];
}
