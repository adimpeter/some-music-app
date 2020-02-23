<div class="music-card-container">
        @forelse($musics as $music)

            @include('snipps.song-card')

        @empty

        @endforelse
</div>