<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Music;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // get music and ambiant sounds
        $musics = Music::all();
        $ambiant_musics = $musics->where('music_type_id', 1);
        $non_ambiant_musics = $musics->where('music_type_id', '!=', 1);

        return view('homepage.index', compact('musics', 'ambiant_musics', 'non_ambiant_musics'));
    }
}
