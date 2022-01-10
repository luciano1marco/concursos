$(document).ready(function() {
    $('.group_bgcolor').colorpicker();

    $('.group_bgcolor').on('colorpickerChange', function(event) {
        $('.group_bgcolor .fa-square').css('color', event.color.toString());
    });

});