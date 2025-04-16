<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstateRequest;
use App\Models\Estate;
use App\Models\estate_photos;
use App\Models\EstatePhotos;
use App\Models\FavoritePivotModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EstateController extends Controller
{
    public function index(Request $request){
        $sortField = $request->get('sort', 'created_at');
        $sortDirection = $request->get('direction', 'desc');

        $estates = Estate::with('user')->orderBy($sortField, $sortDirection)->where('is_sell', '=', 1)->paginate(16);
        return view('estate.buying', compact('estates', 'sortField', 'sortDirection'));
    }

    public function index1(Request $request)
    {
        $sortField = $request->get('sort', 'created_at');
        $sortDirection = $request->get('direction', 'desc');

        $estates = Estate::with('user')->orderBy($sortField, $sortDirection)->where('user_id', '=', Auth::id())->simplePaginate(10);
        return view('estate.my', compact('estates', 'sortField', 'sortDirection'));
    }

    public function index2(Request $request){
        $sortField = $request->get('sort', 'created_at');
        $sortDirection = $request->get('direction', 'desc');

        $estates = Estate::with('user')->orderBy($sortField, $sortDirection)->where('is_sell', '=', 0)->paginate(16);
        return view('estate.renting', compact('estates', 'sortField', 'sortDirection'));
    }

    public function create(){
        $user = Auth::user();
        return view('estate.create', ['user' => $user]);
    }

    public function store(EstateRequest $request){
        $attrs = $request->validated();
        $attrs['user_id'] = Auth::user()->id;
        $photos = $attrs['photos'];
        unset($attrs['photos']);
        if($estate = Estate::create($attrs)){
            $i=0;
            foreach($photos as $photo){
                $p_name = $i . "_" . time() . "." . $photo->extension();
                $i++;

                $photo->storeAs('estate_photo/' . $estate->id, $p_name, 'public');

                EstatePhotos::create([
                    "estate_id" => $estate->id,
                    "photo" => "estate_photo/" . $estate->id . "/" . $p_name,
                ]);
            }
        }

        return redirect('/');
    }

    public function show(Estate $estate){
        return view('estate.show', ['estate' => $estate]);
    }

    public function edit(Estate $estate){
        return view('estate.edit', ['estate' => $estate]);
    }

    public function update(EstateRequest $request, Estate $estate){
        $attrs = $request->validated();
        $photos = null;
        if(array_key_exists('photos', $attrs)){
            $photos = $attrs['photos'];
            unset($attrs['photos']);
        }

        if($estate->update($attrs) && $photos!=null){
            $i=0;
            foreach($photos as $photo){
                $p_name = $i . "_" . time() . "." . $photo->extension();
                $i++;

                $photo->storeAs('estate_photo/' . $estate->id, $p_name, 'public');

                EstatePhotos::create([
                    "estate_id" => $estate->id,
                    "photo" => "estate_photo/" . $estate->id . "/" . $p_name,
                ]);
            }
        }

        return view('estate.show', ['estate' => $estate]);
    }

    public function destroy(Estate $estate){
        $estate_id = $estate->id;
        if($estate->delete()){
            Storage::disk('public')->deleteDirectory("estate_photo/" . $estate_id);
        }
        return redirect('/');
    }
}
