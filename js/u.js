/**
 * Created by cote on 14/06/16.
 */
$(document).ready(function () {

    function reinit() {
        var reinit = setTimeout(function () {
            $('#mytext').html('(Anim CSS + jQ)').css('font-style', 'italic');
            $("#projet").find("h1").removeAttr('style');
            $("#projet").find("h1").css('display', 'block');
        }, 7777);
    };

    // ### GESTION Barre du titre ###
    $("#projet").find("H1")
        .css({})
        .click(function () {
            reinit(); // IMPORTANT ICI: (Pas après: Doit scoper le der &lement)
            $("#projet").find("h1")
                .css({'transition': 'none'})
                .toggle(7777)
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


    function displayVal() {
        var singleValue = $("#phase" + this.id).val();
        console.log('Nouvelle valeur = ' + singleValue);
    }

    function showEdit(editableObj) {
        $(editableObj).css("background", "#0F0");
    }

    function saveToDatabase(editableObj, column, id) {
        $(editableObj).css("background", "#FFA500 url(tableau/loaderIcon.gif) no-repeat right");
        var myselect = $("#phaseid option:selected").text();
        console.log('Selected value = ' + myselect);
        $.ajax({
            url: "tableau/saved.php",
            type: "POST",
            data: 'column=' + column + '&editedval=' + myselect + '&id=' + id,
            success: function (data) {
//              console.log(data);
                $(editableObj).css("background", "#FDFDFD");
            }
        })
        ;
    }
})
;
