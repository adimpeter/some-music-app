<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = [
        'title',
        'path',
        'tone_id',
        'genre_id',
        'music_type_id',
        'cover_img_path',
    ];
    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }

    public function tone()
    {
        return $this->hasOne('App\Tone');
    }

    public function type(){
        return $this->hasOne('App\MusicType');
    }
}
