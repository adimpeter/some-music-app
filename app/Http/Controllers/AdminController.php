<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Music;

class AdminController extends Controller
{
    public function index(){

        $musics = Music::all();
        $ambiant_musics = $musics->where('music_type_id', 1);
        $non_ambiant_musics = $musics->where('music_type_id', '!=', 1);
        
        return view('admin.index', compact('musics', 'ambiant_musics', 'non_ambiant_musics'));
    }
}
