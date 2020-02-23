@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div id="waveform">
            
        </div>
    </div>
</section>

<section>

    <div class="container">
        <h2 class="heading">Ambiant Sounds</h2>
        <div class="music-card-container">
            @forelse($ambiant_musics as $music)

            @include('snipps.song-card')

            @empty

            @endforelse
        </div>

        <h2 class="heading">Music</h2>
        <div class="music-card-container">
        @forelse($non_ambiant_musics as $music)

        @include('snipps.song-card')

        @empty

        @endforelse
        </div>
    </div>

</section>

@endsection