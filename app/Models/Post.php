<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'user_id', 'title', 'image', 'body'];

    // many posts -> 1 category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // many posts -> 1 user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
