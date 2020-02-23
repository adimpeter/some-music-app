<div class="music-card bg-img @if($music->music_type_id == 1) {{ 'ambiant' }}  @else {{ 'non-ambiant' }}  @endif" style="background-image: url( @if(!is_null($music->cover_img_path)) {{ asset($music->cover_img_path) }} @else {{ asset('/assets/imgs/default-cover.jpg') }} @endif )">
    <div class="title-card"><h3>{{ $music->title }}</h3></div>
    <span class="play-btn"><i class="far fa-play-circle"></i></span>
        <div class="slidecontainer">
            <input type="range" min="0" max="10" value="5" class="slider" id="myRange">
        </div>
    <audio src="{{asset($music->path)}}" class="player" loop></audio>
</div>

