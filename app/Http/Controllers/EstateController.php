<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    public function index(){
        $estates = Estate::with('user')->orderBy('created_at', 'desc')->paginate(16);
        return view('estate.buying', ['estates' => $estates]);
    }
}
