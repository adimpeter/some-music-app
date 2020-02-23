<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/821f3edfc2.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="site-wrapper">
        <div class="side-bar">
            <header>
                Ambiantic
            </header>

            <div class="menus">
                <a href="#" class="all-music-nav">All Music</a>
                <a href="#" class="add-music-nav">Add Music</a>
                <a href="#">Manage Music</a>
                <a href="#">Site Statistics</a>
                <a href="#">Dead Link</a>
            </div>
        </div>

        <div class="main-content">
            @yield('content')
        </div>

        
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}" ></script>

    <script>
        $(document).ready(function(){
            $('.side-bar').on('click', '.add-music-nav', function(){
        
                $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                        url: "{{ route('music.create') }}",
                        method: 'get',
                        // data: new FormData($('.upload-profile-pic-form')[0]),
                        // contentType: false,
                        // processData: false,
                        success: function(result){
                            var view = result;
                            $('.section-content').html(view);
                        },
                        error: function(result){
                            console.log(result.responseText);
                        }
                    });
            })

            $('.section-content').on('click', '#add-music', function(e){
                e.preventDefault();
                console.log('lol');
                $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('music.store') }}",
                    method: 'post',
                    data: new FormData($('#add-music-form')[0]),
                    contentType: false,
                    processData: false,
                    success: function(result){
                        console.log(result);
                    },
                    error: function(result){
                        console.log(result.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
