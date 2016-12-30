$('document').ready(function () {
    $("#id_client").blur(function () {
            recherche = "id_client=" + id_client;
            $.ajax({

                type: "GET",
                data: recherche,
                dataType: "json",
                url: './admin/lib/php/ajax/AjaxGetClient.php',
                success: function (data) {
                    $("#nom").val(data[0].nom);
                    $("#prenom").val(data[0].prenom);
                    $("#pseudo").val(data[0].pseudo);
                    $("#email").val(data[0].email);
                    console.log(data[0].id_client);
                }

            });
        });
});