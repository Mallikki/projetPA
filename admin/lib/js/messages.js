$(document).ready(function($) {
    $.extend($.validator.messages, {
        required: "Ce champ ne peut être vide...",
        email: "Veuillez renseigner un email valide.",
        date: "Veuillez renseigner une date valide.",
        number: "Veuillez ne renseigner que des chiffres",
        maxlength: $.validator.format("Saisissez {0} caract&egrave;res maximum."),
        minlength: $.validator.format("Saisissez au minimum {0} caract&egrave;res"),
        rangelength: $.validator.format("Entr&eacute;e entre {0} and {1} caract&egrave;res."),
        range: $.validator.format("Entrez une valeur entre {0} et {1}."),
        max: $.validator.format("Valeur maximum : {0}."),
        min: $.validator.format("Valeur minimum : {0}.")
    });
});