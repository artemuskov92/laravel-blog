<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subscription extends Model
{
    use HasFactory;

    /**
     * Create sub
     */
    public static function add($email)
    {
        $sub = new static;
        $sub->email = $email;
        $sub->token = Str::random(100);
        $sub->save();

        return $sub;
    }

    /**
     * Remove sub
     */
    public function remove()
    {
        $this->delete();
    }
}