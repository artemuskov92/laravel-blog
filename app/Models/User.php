<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    const IS_BANNED = 1;
    const IS_NORMAL = 0;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get all commnets
     */
    public function commnets(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get all posts
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Create user
     */
    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->save();

        return $user;
    }

    public function generatePassword($password)
    {
        if ($password != null) {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    /**
     * Edit user
     */
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
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
     * Remove image 
     */
    public function removeImage()
    {
        if ($this->avatar !== null) {
            Storage::delete('uploads/' . $this->avatar);
        }
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
        $file_name = Str::random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $file_name);
        $this->avatar = $file_name;
        $this->save();
    }

    /**
     * Get image
     */
    public function getImage()
    {
        if ($this->avatar == null) {
            return '/img/no-avatar-image.png';
        }
        return '/uploads/' . $this->avatar;

    }

    /**
     * Set ban
     */
    public function setBan()
    {
        $this->status = User::IS_BANNED;
        $this->save();
    }

    /**
     * Set normal
     */
    public function setNormal()
    {
        $this->status = User::IS_NORMAL;
        $this->save();
    }

    /**
     * Toggle ban
     */
    public function toggleBan($val)
    {
        if ($val == null) {
            return $this->setNormal();
        }
        return $this->setBan();
    }
}