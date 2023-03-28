<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;
    const IS_ALLOW = 1;
    const IS_DISALLOW = 0;
    /**
     * Get the user owns the commnet
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /**
     * Get the post owns the comment
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    /**
     * Allow comments
     */
    public function allow()
    {
        $this->status = Comment::IS_ALLOW;
        $this->save();
    }

    /**
     * Diallow comments
     */
    public function disAllow()
    {
        $this->status = Comment::IS_DISALLOW;
        $this->save();
    }

    /**
     * Toggle comment
     */
    public function toggleComment()
    {
        if($this->status == Comment::IS_DISALLOW){
            return $this->allow();
        }
        return $this->disAllow();
    }

    /**
     * Remove comments
     */
    public function remove()
    {
        $this->delete();
    }


}