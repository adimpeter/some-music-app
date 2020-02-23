@extends('layouts.admin')

@section('content')

    <section>
        <h2 class="heading">All Music</h2>
        
        <div class="section-content">
            <div class="music-card-container">

                @forelse($ambiant_musics as $music)

                    @include('snipps.song-card')

                @empty

                @endforelse

            </div>

            <div class="music-card-container">

                @forelse($non_ambiant_musics as $music)

                    @include('snipps.song-card')

                @empty

                @endforelse

            </div>
        </div>
    </section>



    

@endsection