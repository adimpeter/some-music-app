$(document).ready(function(){
    var swiper = new Swiper('.swiper-container', {
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
        },
    });
    
    var wavesurfer = WaveSurfer.create({
            container: '#waveform',
            barWidth: '3',
            progressColor: '#483D3F',
            // waveColor: 'violet',
            // progressColor: 'purple'
        });
    var isAudioLoaded = false;
    var lastAudioSrc = '';

    // wavesurfer.on('audioprocess', function () {
    //     // if song is done
    //     // loop back to begining
    //     console.log({"duration" : wavesurfer.getDuration(), "current time" : (Math.round((wavesurfer.getCurrentTime() + Number.EPSILON) * 100) / 100)});
    //     if(wavesurfer.getDuration() == (Math.round((wavesurfer.getCurrentTime() + Number.EPSILON) * 100) / 100)){
    //         wavesurfer.play();
    //         console.log('play');
    //     }
    // });

    // if(wavesurfer.getDuration() == getCurrentTime()){

    // }

    // handle players on homepage
    $('.music-card').on('click','.play-btn', function(){
        // create waveform player on homepage
        

        var audio = $(this).siblings('audio');
        var audioVolume = 0.5;
        //console.log(audio.attr('src'));

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

            console.log({"paused" : audio[0].paused , "duration" : audio[0].duration});

            audio[0].volume = audioVolume;
            if(!wavesurfer.isPlaying()){
                $(this).html('<i class="far fa-pause-circle"></i>');
                if(lastAudioSrc == audio.attr('src')){
                    isAudioLoaded = true;
                }
                else{
                    lastAudioSrc = audio.attr('src');
                    isAudioLoaded = false;
                }

                if(!isAudioLoaded){
                    wavesurfer.load(audio.attr('src'));
                    isAudioLoaded = true;
                }
                setTimeout(
                function() 
                {
                    wavesurfer.play();
                }, 3000);
            
            }
            else{
                wavesurfer.pause();
                $(this).html('<i class="far fa-play-circle"></i>');
            }
        }
        else{
            if(audio[0].paused){
                audio[0].play();
                
                $(this).html('<i class="far fa-pause-circle"></i>');
            }
            else{
                audio[0].pause();
                //wavesurfer.destroy(audio.attr('src'));
                $(this).html('<i class="far fa-play-circle"></i>');
            }
        }

        
        
        //wavesurfer.playPause();

        // wavesurfer.on('audioprocess', function () {
        //     wavesurfer.playPause();
        //     console.log({'is playing' : wavesurfer.isPlaying()});
        //     // if(wavesurfer.isPlaying()){
        //     //     wavesurfer.pause();
        //     // }
        //     // else{
        //     //     wavesurfer.play();
        //     // }
        // });
        console.log({'after is playing' : wavesurfer.isPlaying()});

        

        // handle play pause sequence
        
    })

    // handle volume controle for music player
    $('.slidecontainer').on('input', 'input', function(){
        var audioVolume = ($(this).val() !== 0)? $(this).val() / 10 : $(this).val();
        var audio = $(this).parents('.music-card').children('audio');

        audio[0].volume = audioVolume;
    })

    // admin side menues
    
});