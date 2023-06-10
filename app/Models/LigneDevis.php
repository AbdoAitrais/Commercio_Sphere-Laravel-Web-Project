<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneDevis extends Model
{
    use HasFactory;

    // make relation with Devis
    public function devis()
    {
        return $this->belongsTo(Devis::class);
    }

    // make relation with Article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
