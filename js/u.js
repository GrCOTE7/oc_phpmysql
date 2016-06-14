/**
 * Created by cote on 14/06/16.
 */
$(document).ready(function () {

    // $("#projet").hide(); // Fait par CSS - ### GESTION Barre du titre ###
    $("#projet h1").css("background-color", "orange").css("padding", "3px 5px").css("border-radius", "7px");
    $('#projet h1').click(function () {
        $("#projet h1").toggle(7000);
    });


    $("#liste").sortable();
    $("#liste").disableSelection();
    $("#liste .ui-state-default").mousedown(function () {
        console.log('Choisi');
        $("#liste .ui-state-default").css("cursor", "move");
    });
    $('#liste').sortable({
        connectWith: '#liste',
        update: function (event, ui) {
            var changedList = this.id;
            var order = $(this).sortable('toArray');
            var positions = order.join(';');

            $("h1").html("Série: " + changedList + " - " + positions);

            console.log({
                id: changedList,
                positions: positions
            });
        }
    });
});
