$(document).ready(function () {

    // ### GESTION Barre du titre ###
    function reinit() {
        setTimeout(function () {
            $('#mytext').html('(Animation: du titre: LESS/CSS + jQ)').css('font-style', 'italic');
            $("#projet").find("h1")
                .removeAttr('style')
                .css('display', 'block')
                .bind('click', animeTitre());
        }, 7777);
    }

    function animeTitre() {
        $("#projet").find("H1")
            .click(function () {
                reinit(); // IMPORTANT ICI: (Pas après: Doit scoper le der élement)
                $("#projet").find("h1")
                    .unbind('click')
                    .css({'transition': 'none'})
                    .toggle(7777)
            });
    }

    animeTitre();


    // var lio = $("liste").index();
    // $('#mytext').html('Saisi n°' + lio);

    $("#liste")
        .sortable()
        .disableSelection()
        .sortable({
            connectWith: '#liste',
            // update: function (event, ui) {
            update: function () {
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
    $(".ui-state-default")
        .mousedown(function () {
            // var refIni = $(this).getItemIndex();
            // var indexIni = $(this).index();
            console.log('Choisi');
            // $('#mytext').html('Saisi ' + refIni + ' Pos°' + indexIni);
            // $("#liste .ui-state-default").css("cursor", "move");
            $(this).css({'cursor': 'move', 'background': '#0F0'});

        })
        .mouseup(function () {
            $(this).css({'cursor': 'pointer'}).removeAttr('style');
            var indexFin = $(this).index();
            console.log('Fin : ' + indexFin);
        });
    // .change(function () {
    // });

    // $(this).siblings().on("change", (function () {
    // }));


    // function displayVal() {
    //     var singleValue = $("#phase" + this.id).val();
    //     console.log('Nouvelle valeur = ' + singleValue);
    // }

    // function showEdit(editableObj) {
    //     $(editableObj).css("background", "#0F0");
    // }

//     function saveToDatabase(editableObj, column, id) {
//         $(editableObj).css("background", "#FFA500 url(tableau/loaderIcon.gif) no-repeat right");
//         var myselect = $("#phaseid option:selected").text();
//         console.log('Selected value = ' + myselect);
//         $.ajax({
//             url: "tableau/saved.php",
//             type: "POST",
//             data: 'column=' + column + '&editedval=' + myselect + '&id=' + id,
//             success: function (data) {
// //              console.log(data);
//                 $(editableObj).css("background", "#FDFDFD");
//             }
//         })
//         ;
//     }
});
