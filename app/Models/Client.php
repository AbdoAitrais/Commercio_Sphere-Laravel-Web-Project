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
    ];

    public function scopeFilter($query, array $filters) {
        $query->where('is_active', true);
        if ($filters['search'] ?? false) {
            $query->where(function ($q) use ($filters) {
                $q->where('nom', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('prenom', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('IF', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('ICE', 'like', '%' . $filters['search'] . '%');
            });
        }
    }
    
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

}
