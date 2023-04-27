<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'IF',
        'ICE',
        'email',
        'telephone',
        'adresse',
        'code_postal',
        'ville',
        'pays',
    ];

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('nom', 'like', '%' . request('search') . '%')
                ->orWhere('prenom', 'like', '%' . request('search') . '%')
                ->orWhere('IF', 'like', '%' . request('search') . '%')
                ->orWhere('ICE', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%')
                ->orWhere('telephone', 'like', '%' . request('search') . '%')
                ->orWhere('adresse', 'like', '%' . request('search') . '%')
                ->orWhere('code_postal', 'like', '%' . request('search') . '%')
                ->orWhere('ville', 'like', '%' . request('search') . '%')
                ->orWhere('pays', 'like', '%' . request('search') . '%');
        }
    }

}
