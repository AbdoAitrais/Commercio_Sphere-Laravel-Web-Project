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

    // all articles in stock
    public static function scopeInStock($query)
    {
        // get articles that have quantity not null and greater than 0
        return $query->whereNotNull('quantite')
                     ->where('quantite', '>', 0);
    }

    // all articles frequently used in devis
    public static function scopeFrequentlyUsed($query)
    {
        // get articles that have relation with LineDevis
        return $query->whereHas('ligneDevis');
    }

    // make relation with LigneAchat
    public function ligneAchats()
    {
        return $this->hasMany(LigneAchat::class);
    }

    // make relation with LigneDevis
    public function ligneDevis()
    {
        return $this->hasMany(LigneDevis::class);
    }
}