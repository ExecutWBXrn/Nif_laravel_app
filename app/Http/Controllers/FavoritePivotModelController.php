<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\FavoritePivotModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritePivotModelController extends Controller
{
    public function index(){
        $rel = FavoritePivotModel::with('estate.photos')->orderBy('updated_at', 'desc')->where('user_id', '=', Auth::id())->simplePaginate(10);
        return view('estate.favorite', ['rel' => $rel]);
    }

    public function store(Estate $estate){
        FavoritePivotModel::firstOrCreate([
            "user_id" => Auth::id(),
            "estate_id" => $estate->id
        ]);
        return redirect()->route('estate.show', ['estate' => $estate->id])->with('success', 'Додано в обране!');
    }

    public function destroy(FavoritePivotModel $favorite){
        $favorite->delete();
        return redirect()->route('favorite')->with('success', 'успішно видалено!');
    }
}
