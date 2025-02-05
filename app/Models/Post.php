<?php

namespace App\Models;

use App\Traits\HasViewCount;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use HasFactory, SoftDeletes;
    use HasViewCount;

    // Define the views threshold
    public function checkAndFeaturePost()
    {
        $views = 30;
        $featuredposts = Post::where('views', '>=', $views)
                                ->limit(5)
                                ->get();

        foreach ($featuredposts as $post) {
            $post->featured = 'true';
            $post->save(); 
        }
    }

    protected $fillable = [
        'title',
        'content',
        'status',
        'article_cover',
        'category',
        'tag1',
        'tag2',
        'tag3',
        'tag4',
        'tag5',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function saves(): HasMany
    {
        return $this->hasMany(Save::class);
    }

    public function whosaves(): BelongsToMany
    {
        return $this->BelongsToMany(User::class, 'saves');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
