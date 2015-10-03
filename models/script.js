/**
 * Created by Даниил on 03.10.2015.
 */

$(document).ready(function() {
    $('.article').mouseenter(function(){
        $(this).animate({
            height: '+=10px'
        });

        $(this).removeClass('panel-info');
        $(this).addClass('panel-primary');
    });

    $('.article').mouseleave(function(){
        $(this).animate({
            height: '-=10px'
        });

        $(this).removeClass('panel-primary');
        $(this).addClass('panel-info');
    });
});