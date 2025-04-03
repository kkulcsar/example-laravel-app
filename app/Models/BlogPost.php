<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $content
 */
class BlogPost extends Model
{
    protected $fillable = [
        'title', 'slug', 'content'
    ];
}
