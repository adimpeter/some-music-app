<?php

namespace App\Http\Controllers;

use App\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use App\Tone;
use App\Genre;
use App\MusicType;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch all music
        $musics = Music::all();
        return view('music.index', compact('musics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $music_types = MusicType::all();
        return view('music.create', compact('music_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $genre = $request->genre;
        $tone = $request->tone;
        $title = $request->title;
        $type = $request->music_type;

        $music = $request->music;
        $cover_image = $request->cover_image;

        try {

            DB::beginTransaction();
  
            $tone = Tone::firstOrCreate(['tone' => $tone]);
            $genre = Genre::firstOrCreate(['genre' => $genre]);
  
            // upload music
            $music_path = '/assets/music/uploads/';
            $music_dir = public_path() . $music_path;

            // upload cover image
            $cover_img_path = $music_path;
            $cover_img_dir = $music_dir;
  
            // make the dir
            if (!file_exists($music_dir)) {
                File::makeDirectory($music_dir, 0755, true);
            }

            // remove spaces in path
            $title_cleaned = str_replace(' ', '', ucwords($title));

            $music_name = ucwords($title_cleaned) . '-' . time() . '.' . $music->getClientOriginalExtension();
            $music->move($music_dir, $music_name);

            $cover_img_name =  ucwords($title_cleaned) . '-cover-img-' . time() . '.' . $cover_image->getClientOriginalExtension();
            $cover_image->move($cover_img_dir, $cover_img_name);

            $music_info = [
                'title' => ucwords($title),
                'path' => $music_path . $music_name,
                'tone_id' => $tone->id,
                'genre_id' => $genre->id,
                'music_type_id' => $type,
                'cover_img_path' => $cover_img_path . $cover_img_name,
            ];
            
            Music::firstOrCreate($music_info);
  
            DB::commit();

            return response('music addedd', 200);
  
          } catch (\Exception $e) {
            DB::rollback();
            //dd($e->getMessage());
            //return redirect()->back()->with('error', 'Something went wrong');
            \Log::error('Unable to upload file::' . $e->getMessage());
            return response('something went wrong', 400);
          }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function show(Music $music)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function edit(Music $music)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Music $music)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Music  $music
     * @return \Illuminate\Http\Response
     */
    public function destroy(Music $music)
    {
        //
    }
}
