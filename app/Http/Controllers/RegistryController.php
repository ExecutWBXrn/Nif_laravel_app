<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistryRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RegistryController extends Controller
{
    protected function avatars(): array
    {
        return ['avatar0.png', 'avatar1.png', 'avatar2.png', 'avatar3.png', 'avatar4.png', 'avatar5.png', 'avatar6.png', 'avatar7.png', 'avatar8.png', 'avatar9.png'];
    }
    public function create(){
        return view('auth.registry');
    }

    public function store(RegistryRequest $request){
        $attrs = $request->validated();

        $user = User::create($attrs);

        if($request->has('avatar')){
            $avatarName = $user->id . "_" . time() . "." . $request->avatar->extension();

            $request->avatar->storeAs('avatars', $avatarName, 'public');

            $user->avatar = $avatarName;

            $user->save();
        }

        Auth::login($user);

        $request->session()->regenerate();

        return redirect('/');
    }

    public function edit()
    {
        return view('auth.edit');
    }

    public function update(UpdateUserRequest $request)
    {
        $attrs = $request->validated();

        if($request->avatar === null){
            unset($attrs['avatar']);
        }

        $user = Auth::user();

        $oldAvatar = $user->avatar;

        $user->update($attrs);

        if(! ($request->avatar === null)){
            $avatarName = $user->id . "_" . time() . "." . $request->avatar->extension();

            $request->avatar->storeAs('avatars', $avatarName, 'public');

            $user->avatar = $avatarName;
            $user->save();

            if(! in_array($oldAvatar, $this->avatars())){
                Storage::disk('public')->delete("avatars/{$oldAvatar}");
            }
        }

        return redirect('/dashboard');
    }

    public function destroy()
    {
        Auth::user()->delete();
        return redirect('/login');
    }
}
