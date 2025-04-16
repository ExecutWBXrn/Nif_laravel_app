<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoritePivotModel extends Model
{
    protected $guarded = [];

    public function estate(){
        return $this->belongsTo(Estate::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
