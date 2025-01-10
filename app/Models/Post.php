<?php

namespace App\Models;

use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model implements CanVisit
{

    use HasFactory, SoftDeletes, HasVisits;

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



    public function saves(): HasMany
    {
        return $this->hasMany(Save::class);
    }


    public function whosaves(): BelongsToMany
    {
        return $this->BelongsToMany(User::class, 'saves');
    }


}