<?php

namespace App\Policies;

use App\Models\Estate;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EstatePolicy
{
    public function edit(User $user, Estate $estate){
        return $estate->user->is($user);
    }

    public function fav(User $user, Estate $estate){
        return !$user->favoriteEstates()
            ->where('estate_id', $estate->id)
            ->exists();
    }
}
