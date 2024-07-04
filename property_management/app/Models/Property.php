<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'owner_id',
        'title', 
        'description',
        'local', 
        'price', 
        'image', 
        'status'
    ];


    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function tenants()
    {
        return $this->hasOne(Tenant::class);
    }


}
