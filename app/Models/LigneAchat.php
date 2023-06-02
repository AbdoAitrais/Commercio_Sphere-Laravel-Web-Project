<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneAchat extends Model
{
    use HasFactory;

    // make relation with Article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
