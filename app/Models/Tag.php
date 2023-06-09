<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['tag_name'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'tag_name'
            ]
        ];
    }

    /**
     * Get all posts
     */
    public function posts():BelongsToMany
    {
        return $this->belongsToMany(Post::class,'posts_tags');
    }
}
