/**
 * Created by cote on 14/06/16.
 */
$(document).ready(function () {

    // $("#projet").hide();

    $("#projet h1").css("background-color", "orange").css("padding", "3px 5px").css("border-radius", "7px");

    $('#projet h1').click(function () {
        $("#projet h1").toggle(500);
    });

    $("#sortable").sortable();
    $("#sortable").disableSelection();
    $("#sortable .ui-state-default").mousedown(function () {
        console.log('Choisi');
        $("#sortable .ui-state-default").css("cursor", "move");
    });
    $("#sortable li").on("sortstop", function () {
        $("h1").html("Ok");
    });
    // console.log('Fin');
});
