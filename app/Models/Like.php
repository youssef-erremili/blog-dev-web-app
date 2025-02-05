<?php

namespace App\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id'];

    public function post(): BelongsTo
    {
        return $this->BelongsTo(Post::class);
    }


    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
