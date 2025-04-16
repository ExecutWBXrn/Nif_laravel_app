<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    /** @use HasFactory<\Database\Factories\EstateFactory> */
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function photos(){
        return $this->hasMany(EstatePhotos::class);
    }

    public function favoritePivot(){
        return $this->hasMany(FavoritePivotModel::class);
    }
}
