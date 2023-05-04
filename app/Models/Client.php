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
        $query->where('is_active', true);
        if ($filters['search'] ?? false) {
            $query->where(function ($q) use ($filters) {
                $q->where('nom', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('prenom', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('IF', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('ICE', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('email', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('telephone', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('adresse', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('code_postal', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('ville', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('pays', 'like', '%' . $filters['search'] . '%');
            });
        }
    }
    

}
