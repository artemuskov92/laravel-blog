<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    const IS_DRAFT = 0;
    const IS_PUBLIC = 1;
    const IS_FEATURED = 1;
    const IS_NORMAL = 0;
    protected $fillable = ['title', 'content', 'date', 'description'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    /**
     * Get all commnets
     */
    public function commnets(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all category owns the post
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }

    /**
     * Get the user owns the post
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all tags
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'posts_tags');
    }

    /**
     * Create post
     */
    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->user_id = Auth::user()->id;
        $post->save();

        return $post;
    }

    /**
     * Edit post
     */
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    /**
     * Count views of post
     */
    public function incrementReadCount()
    {
        $this->views++;
        return $this->save();
    }

    /**
     * Remove post
     */
    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    /**
     * Upload image
     */
    public function uploadImage($image)
    {
        if ($image == null) {
            return;
        }

        $this->removeImage();
        $file_name = Str::random(10) . '' . $image->extension();
        $image->storeAs('uploads', $file_name);
        $this->image = $file_name;
        $this->save();
    }

    /**
     * Remove image 
     */
    public function removeImage()
    {
        if ($this->image !== null) {
            Storage::delete('uploads/' . $this->image);
        }
    }

    /**
     * Get image
     */
    public function getImage()
    {
        if ($this->image == null) {
            return '/img/no-image.png';
        }
        return '/uploads/' . $this->image;

    }

    /**
     * Set category
     */
    public function setCategory($ids)
    {
        if ($ids == null) {
            return;
        }
        $this->categories()->sync($ids);
    }

    /**
     * Set tags
     */
    public function setTags($ids)
    {
        if ($ids == null) {
            return;
        }
        $this->tags()->sync($ids);
    }

    /**
     * Set Draft
     */
    public function setDraft()
    {
        $this->status = Post::IS_DRAFT;
        $this->save();
    }

    /**
     * Set public
     */
    public function setPublic()
    {
        $this->status = Post::IS_PUBLIC;
        $this->save();
    }

    /**
     * Toggle status
     */
    public function toggleStatus($value)
    {
        if ($value == null) {
            return $this->setDraft();
        }
        return $this->setPublic();
    }

    /**
     * Set Draft
     */
    public function setFeatured()
    {
        $this->is_featured = Post::IS_FEATURED;
        $this->save();
    }

    /**
     * Set public
     */
    public function setNormal()
    {
        $this->is_featured = Post::IS_NORMAL;
        $this->save();
    }

    /**
     * Toggle featured
     */
    public function toggleFeatured($value)
    {
        if ($value == null) {
            return $this->setNormal();
        }
        return $this->setFeatured();
    }

    /**
     * if has previous post
     */
    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    /**
     * Get previous post
     */
    public function getPrevious()
    {
        $postId = $this->hasPrevious();
        return self::find($postId);
    }

    /**
     * if has next post
     */
    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    /**
     * Get next post
     */
    public function getNext()
    {
        $postId = $this->hasNext();
        return self::find($postId);
    }

    /**
     * Get related post
     */
    public function related()
    {
        return self::all()->except($this->id);
    }

    /**
     * Get popular posts 
     */
    public static function getPopularPosts()
    {
        return self::orderBy('views','desc')->take(3)->get();
    }

    /**
     * Get featured posts
     */
    public static function getFeaturedPosts()
    {
        return self::where('is_featured',1)->take(3)->get();
    }

    /**
     * Get recent post
     */
    public static function getRecentPosts()
    {
        return self::orderBy('date','desc')->take(4)->get();
    } 

}