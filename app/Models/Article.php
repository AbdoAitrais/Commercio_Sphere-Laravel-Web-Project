<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // make filter scope
    public function scopeFilter($query, array $filters)
    {
        $query->where('is_active', true);
        if ($filters['search'] ?? false) {
            $query->where(function ($q) use ($filters) {
                $q->where('code', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('titre', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('description', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('prix', 'like', '%' . $filters['search'] . '%');
            });
        }
    }

    // make relation with VenteArticle
    public function venteArticles()
    {
        return $this->hasMany(VenteArticle::class);
    }

    // make relation with AchatArticle
    public function achatArticles()
    {
        return $this->hasMany(AchatArticle::class);
    }
}