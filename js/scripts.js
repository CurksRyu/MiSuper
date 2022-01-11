//libreria Jquery
$(document).ready(() => {
    $("#displayUser").hide();
    alertify.dialog('alert').set({transition:'fade'}); 

    $("#mostrarUsuario").on("click", function(){
        $("#displayUser").toggle(200);
    });

    $("#acerca").on("click", function() {
        alertify.alert("Acerca de Mi Super","");
    });

    $("#tiendas").on("click", function() {
        alertify.alert("Tiendas Asociadas","");
    });
    
    $("#about-us").on("click", function() {
        alertify.alert("Quienes Somos","");
    });

    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });
});