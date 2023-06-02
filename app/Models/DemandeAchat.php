<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeAchat extends Model
{
    use HasFactory;

    // make filter scope date and etat
    public function scopeFilter($query, array $filters)
    {
        $query->where('is_active', true);
        if ($filters['date'] ?? false) {
            $query->where('date', 'like', '%' . $filters['date'] . '%');
        }
        if ($filters['etat'] ?? false) {
            $query->where('etat', 'like', '%' . $filters['etat'] . '%');
        }
    }

    // make relation with VirtuelLigneAchat
    public function virtuelLigneAchats()
    {
        return $this->hasMany(VirtuelLigneAchat::class);
    }
}
