@extends('layouts.new-app')

@section('content')

<div class="overlay"></div>
    <div class="app bg-img" style="background-image: url({{ asset('assets/imgs/cover.jpg') }});">
        <div class="header"></div>
        <div class="main-content">
            

            <div class="ambiant-music-container music-card">

                @forelse($ambiant_musics as $music)

                <div class="music-thumb-sm">
                    <span class="play-btn"><i class="far fa-play-circle"></i></span>
                    <audio src="{{ asset($music->path) }}" class="player" loop></audio>
                    <!-- <p>rain</p> -->
                    <div>{{ $music->title }}</div>
                </div>

                @empty

                @endforelse

            </div>

            <div class="waveform-container">
                <div id="waveform"></div>
            </div>

        </div>


        <div class="footer">

            <!-- Swiper -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                @forelse($non_ambiant_musics as $music)

                <div class="swiper-slide">
                    <div class="music-thumb box-shadow music-card non-ambiant">
                        <div class="info">

                            <h2>{{ $music->title}}</h2>
                            <!-- artist name -->
                            <h4></h4>
                            <h5>{{ $music->genre->genre }}</h5>
        
                        </div>
            
                        <span class="play-btn"><i class="far fa-play-circle"></i></span>
                            <!-- <div class="slidecontainer">
                                <input type="range" min="0" max="10" value="5" class="slider" id="myRange">
                            </div> -->
                        <audio src="{{ asset($music->path) }}" class="player" loop></audio>
                    </div>
                </div>

                @empty

                @endforelse
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </div>

@endsection