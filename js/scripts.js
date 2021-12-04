//libreria Jquery
$(document).ready(() => {
    $("#displayCategories").hide();
    $("#displaySup").hide();

    $("#mostrarCat").on("click", function() {
        $("#displayCategories").toggle(200);
    });

    $("#mostrarSup").on("click", function() {
        $("#displaySup").toggle(200);
    });

    $("#displaySup").mouseleave(function(){
        $("#displaySup").hide(200);
    });

    $("#displayCategories").mouseleave(function(){
        $("#displayCategories").hide(200);
    });

    $(".navbar-burger").click(function() {

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });
});