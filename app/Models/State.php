<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Country;
use App\Models\City;

class State extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'name',
    ];

    public function Country() 
    {
        return $this->belongsTo(Country::class);
    }

    public function City()
    {
        return $this->hasMany(City::class);
    }
    
}
