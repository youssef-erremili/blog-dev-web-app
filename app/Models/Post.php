<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'status',
        'articale_cover',
        'tag1',
        'tag2',
        'tag3',
        'tag4',
        'tag5',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}