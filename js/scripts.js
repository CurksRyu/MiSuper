//libreria Jquery
$(document).ready(() => {
    $("#displayCategories").hide();
    $("#displaySup").hide();
    $("#displayUser").hide();
    alertify.dialog('alert').set({transition:'fade'}); 

    $("#mostrarUsuario").on("click", function(){
        $("#displayUser").toggle(200);
    });

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

    $("#acerca").on("click", function() {
        alertify.alert("Acerca de Mi Super","Proyecto culiao xd");
    });

    $("#tiendas").on("click", function() {
        alertify.alert("Tiendas Asociadas","Proyecto culiao xd");
    });
    
    $("#about-us").on("click", function() {
        alertify.alert("Quienes Somos","Proyecto culiao xd");
    });

    $(".navbar-burger").click(function() {
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });
});