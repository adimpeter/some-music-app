<div>
    <form method="post" enctype="multipart/form-data" id="add-music-form">
        @csrf()
        <div class="form-group">
            <input type="file" class="form-control" name="music" required>
        </div>



        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="music-genre">Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <label for="music-genre">Genre</label>
                    <select class="custom-select" id="music-genre" name="genre">
                        <option value="unassigned" selected>unassigned</option>
                        <option value="pop">pop</option>
                        <option value="regge">regge</option>
                        <option value="edm">edm</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="music-tone">Tone</label>
                    <select class="custom-select" id="music-tone" name="tone">
                        <option value="unassigned" selected>unassigned</option>
                        <option value="fast">fast</option>
                        <option value="mid">mid</option>
                        <option value="slow">slow</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="music-type">Type</label>
                    <select class="custom-select" id="music-type" name="music_type">
                        @foreach($music_types as $music_type)
                            <option value="{{ $music_type->id }}">{{ $music_type->type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="cover-image">Cover Image</label>
                    <input type="file" class="form-control" name="cover_image" id="cover-image" required>
                </div>
            </div>

            <div class="col-md-12"><button class="btn btn-primary" id="add-music">Add Music</button></div>
        </div>
    </form>
</div>