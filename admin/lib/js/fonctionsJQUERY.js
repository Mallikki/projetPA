$('document').ready(function(){
           // Sélectionner tous les liens ayant l'attribut rel valant tooltip
        $('a[rel=tooltip]').mouseover(function(e) {
 
        // Récupérer la valeur de l'attribut title et l'assigner à une variable
        var tip ="Attention, cliquer ici supprimera votre réservation!";   
        // Insérer notre infobulle avec son texte dans la page
        $(this).append('<div id="tooltip"><div class="tipHeader"></div><div class="tipBody">' + tip + '</div><div class="tipFooter"></div></div>');    
 
        // Ajuster les coordonnées de l'infobulle
        $('#tooltip').css('top', e.pageY -200 );
        $('#tooltip').css('left', e.pageX - 300 );
 
        // Faire apparaitre l'infobulle avec un effet fadeIn
        $('#tooltip').fadeIn('500');
        $('#tooltip').fadeTo('10',0.8);
 
    }).mousemove(function(e) {
 
        // Ajuster la position de l'infobulle au déplacement de la souris
        $('#tooltip').css('top', e.pageY -200 );
        $('#tooltip').css('left', e.pageX - 300 );
 
    }).mouseout(function() {
 
        // Réaffecter la valeur de l'attribut title
        $(this).attr('title',$('.tipBody').html());
 
        // Supprimer notre infobulle
        $(this).children('div#tooltip').remove();
 
    });
    
    $('a[rel=tooltip2]').mouseover(function(e) {
 
        // Récupérer la valeur de l'attribut title et l'assigner à une variable
        var tip ="Cliquez ici pour modifier votre réservation";   
        // Insérer notre infobulle avec son texte dans la page
        $(this).append('<div id="tooltip2"><div class="tipHeader"></div><div class="tipBody">' + tip + '</div><div class="tipFooter"></div></div>');    
 
        // Ajuster les coordonnées de l'infobulle
        $('#tooltip2').css('top', e.pageY -200 );
        $('#tooltip2').css('left', e.pageX - 300 );
 
        // Faire apparaitre l'infobulle avec un effet fadeIn
        $('#tooltip2').fadeIn('500');
        $('#tooltip2').fadeTo('10',0.8);
 
    }).mousemove(function(e) {
 
        // Ajuster la position de l'infobulle au déplacement de la souris
        $('#tooltip2').css('top', e.pageY -200 );
        $('#tooltip2').css('left', e.pageX - 300 );
 
    }).mouseout(function() {
 
        // Réaffecter la valeur de l'attribut title
        $(this).attr('title',$('.tipBody').html());
 
        // Supprimer notre infobulle
        $(this).children('div#tooltip2').remove();
 
    }); 
    
    $("#id_client").blur(function () {
        var id = $("#id_client").val();
            recherche = "id_client=" + id;
            $.ajax({

                type: "GET",
                data: recherche,
                dataType: "json",
                url: './admin/lib/php/ajax/AjaxGetClient.php',
                success: function (data) {
                    $("#nom").val(data[0].nom);
                    $("#prenom").val(data[0].prenom);
                    $("#email").val(data[0].email);
                    $("#pseudo").val(data[0].pseudo);
                    console.log(data[0].id_client);
                }

            });
        
    });

});



