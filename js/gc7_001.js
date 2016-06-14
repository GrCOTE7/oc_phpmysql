$(document).ready(function () {

    // console.log('Lionel');
    $("p:first").css("background", "orange");
    $("#container h1, #cachemoi").hide(500);


    $('.parag').hover(function () {
        $(this).siblings('.parag').toggle();
    });

    $("#p1").hide();
    $("#p2").css("color", "red");

    $('#macase').click(function () {
        $("#macase p").toggle(500);
    });


    // $(this).siblings()


    // $("#container").css("color", "red");


    $('.choix').hide();

// var htmle = ["Essai"];
    $('.dynopt').hover(function () {
        // this.css("color", "red");
        $('.moncas').toggle(500);
        $('.choix').toggle(250);
    });
// $('.dynopt').mouseout(function () {
//     // this.css("color", "red");
//     $('.moncas').show(500);
//     $('.choix').hide(250);
// });
// // $('#container #cas').mouseover(function () {
//     console.log(html);
//     this.css("color", "red");
// });

    $(document).ready(function () {
        $("#example-section30 button[id='btn303']").click(function () {
            $("#example-section30 div").toggle();
        });

        $("#example-section30 button[id='btn304']").click(function () {
            $("#example-section30 div").toggle("slow");
        });
    });


});
