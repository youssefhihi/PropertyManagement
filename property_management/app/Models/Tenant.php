<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'name',
        'phone',
        'CIN',
        'property_id',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
