$(document).ready(function(){
    // handle players on homepage
    $('.music-card-container').on('click','.play-btn', function(){
        // create waveform player on homepage
        // var wavesurfer = WaveSurfer.create({
        //     container: '#waveform',
        //     waveColor: 'violet',
        //     progressColor: 'purple'
        // });

        var audio = $(this).siblings('audio');
        var audioVolume = 0.5;
        console.log(audio.attr('src'));

        // check if the selected music is not part of ambiant
        // if it isnt, stop all other songs and play only this one

        var checkElement = 'non-ambiant';
        if($(this).parent().hasClass(checkElement)){
            // stop all other non-ambiant songs
            var audioContainer = $('.non-ambiant');
            var audios = audioContainer.children('audio');
            for(var i = 0; i < audios.length; i++){

                // skip currently clicked audio
                if(audios[i] == audio[0]){
                    continue;
                }
                audios[i].pause();
                // change icon to play
                //console.log($(audioContainer[i]).html());
                $(audioContainer[i]).children('.play-btn').html('<i class="far fa-play-circle"></i>');
            }
            //console.log(audios);
        }

        console.log({"paused" : audio[0].paused , "duration" : audio[0].duration});

        audio[0].volume = audioVolume;

        // handle play pause sequence
        if(audio[0].paused){
            audio[0].play();
            //wavesurfer.load(audio.attr('src'));
            $(this).html('<i class="far fa-pause-circle"></i>');
        }
        else{
            audio[0].pause();
            //wavesurfer.destroy(audio.attr('src'));
            $(this).html('<i class="far fa-play-circle"></i>');
        }
    })

    // handle volume controle for music player
    $('.slidecontainer').on('input', 'input', function(){
        var audioVolume = ($(this).val() !== 0)? $(this).val() / 10 : $(this).val();
        var audio = $(this).parents('.music-card').children('audio');

        audio[0].volume = audioVolume;
    })

    // admin side menues
    
});