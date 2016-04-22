/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
                $('#maximage').maximage({
                        cycleOptions: {
                                fx: 'fade',
                                speed: 1000, // Has to match the speed for CSS transitions in jQuery.maximage.css (lines 30 - 33)
                                timeout: 5000,
                                prev: '#arrow_left',
                                next: '#arrow_right',
                                pause: 0,
                                before: function(last,current){
                                        if(!$.browser.msie){
                                                // Start HTML5 video when you arrive
                                                if($(current).find('video').length > 0) $(current).find('video')[0].play();
                                        }
                                },
                                after: function(last,current){
                                        if(!$.browser.msie){
                                                // Pauses HTML5 video when you leave it
                                                if($(last).find('video').length > 0) $(last).find('video')[0].pause();
                                        }
                                }
                        },
                        onFirstImageLoaded: function(){
                                jQuery('#cycle-loader').hide();
                                jQuery('#maximage').fadeIn('fast');
                        }
                });

                // Helper function to Fill and Center the HTML5 Video
                jQuery('video,object').maximage('maxcover');

        });

