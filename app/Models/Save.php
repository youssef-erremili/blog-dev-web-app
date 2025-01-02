<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Save extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id'
    ];

    public function savers(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
    }


    public function article(): BelongsTo
    {
        return $this->BelongsTo(Post::class, 'post_id');
    }
}
