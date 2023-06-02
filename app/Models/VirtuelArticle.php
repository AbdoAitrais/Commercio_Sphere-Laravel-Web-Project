<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VirtuelArticle extends Model
{
    use HasFactory;

    // make relation with VirtuelLigneAchat
    public function virtuelLigneAchats()
    {
        return $this->hasMany(VirtuelLigneAchat::class);
    }
}
