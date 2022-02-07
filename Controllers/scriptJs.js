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

    $(".sup").click(function() {
        var code = $(this).attr('id');
        let text = "Voulez-vous suprimer cet oeuvre?";
        if (confirm(text) == true) {
            //Ajout paramètre sup pour une supression
            window.location.replace("Recherche.php?sup&code=" + code)
        }
    });

    // $("#ajoutImage").click(function() {
    //     var code = $(this).attr('id');
    //     //Ajout paramètre sup pour une supression
    //     window.location.replace("ModificationOeuvre.php?ajout=true&code=" + code)
    // });

});