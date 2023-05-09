<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Person
{
    use HasFactory;

    // scope filter by search array using the person scope filter
    public function scopeFilter($query, array $filters)
    {
        return $query->whereHas('person', function ($query) use ($filters) {
            $query->filter($filters);
        });
    }

    public function addresses()
    {
        return $this->person->addresses();
    }
    
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
