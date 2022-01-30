$(document).ready(function() {

    //Clique sur image va le mettre en affiche
    $("img").click(function() {
        //Attribut source de l'image sur laquelle on clique
        var imgSrc = $(this).attr('src');
        //L'affiche est cachée, cela provoquera une apparition au ralenti (fadeIn)
        $("#main").hide();
        //L'échange est ensuite faite, l'affiche devient l'image du click
        $("#main").attr('src', imgSrc);
        $('#main').fadeIn(500);
    });

});