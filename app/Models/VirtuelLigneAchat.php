<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtuelLigneAchat extends Model
{
    use HasFactory;

    // make relation with DemandeAchat
    public function demandeAchat()
    {
        return $this->belongsTo(DemandeAchat::class);
    }

    // make relation with VirtuelArticle
    public function virtuelArticle()
    {
        return $this->belongsTo(VirtuelArticle::class);
    }
}
