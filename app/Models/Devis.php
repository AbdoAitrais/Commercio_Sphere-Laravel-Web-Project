<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;

    // make filter scope date and etat and numero and client name
    public function scopeFilter($query, array $filters)
    {
        $query->where('is_active', true);
        if ($filters['date'] ?? false) {
            $query->where('date', 'like', '%' . $filters['date'] . '%');
        }
        if ($filters['etat'] ?? false) {
            $query->where('etat', 'like', '%' . $filters['etat'] . '%');
        }
        if ($filters['numero'] ?? false) {
            $query->where('numero', 'like', '%' . $filters['numero'] . '%');
        }
        if ($filters['client_name'] ?? false) {
            $query->whereHas('client', function ($query) use ($filters) {
                $query->where('name', 'like', '%' . $filters['client_name'] . '%');
            });
        }
    }

    // generate numero
    public function generateNumero()
    {
        $lastNumero = $this->whereYear('created_at', date('Y'))->latest()->first();
        if (!$lastNumero) {
            return 'DEV-' . date('Y') . '-0001';
        }
        $lastNumero = explode('-', $lastNumero->numero);
        $lastNumero = intval($lastNumero[2]);
        $newNumero = $lastNumero + 1;
        $newNumero = str_pad($newNumero, 4, '0', STR_PAD_LEFT);
        return 'DEV-' . date('Y') . '-' . $newNumero;
    }

    // make relation with Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // make relation with LigneDevis
    public function ligneDevis()
    {
        return $this->hasMany(LigneDevis::class);
    }
}
