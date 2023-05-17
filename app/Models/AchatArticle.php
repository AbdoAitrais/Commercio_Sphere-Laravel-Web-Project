<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchatArticle extends Article
{
    use HasFactory;

    // scope filter by search array using the article scope filter
    public function scopeFilter($query, array $filters)
    {
        return $query->whereHas('article', function ($query) use ($filters) {
            $query->filter($filters);
        });
    }

    // make relation with Article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
