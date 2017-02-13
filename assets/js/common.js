
    $(document).ready(function () {

        // you want to enable the pointer events only on click;

        $('#map_canvas').addClass('scrolloff'); // set the pointer events to none on doc ready
        $('#canvas1').on('click', function () {
            $('#map_canvas').removeClass('scrolloff'); // set the pointer events true on click
        });

        // you want to disable pointer events when the mouse leave the canvas area;

        $("#map_canvas").mouseleave(function () {
            $('#map_canvas').addClass('scrolloff'); // set the pointer events to none when mouse leaves the map area
        });
    });
