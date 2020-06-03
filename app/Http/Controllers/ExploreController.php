<?php

namespace App\Http\Controllers;

use App\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
{
    public function index(){
        $repositories =Repository::all()->where('user_id','!=', Auth::id());
        return view('explore',['repositories' => $repositories]);
    }
}
