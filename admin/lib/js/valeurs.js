$(document).ready(function(){

    //pour pouvoir utiliser regex
    $.validator.addMethod("regex", function (value, element, regexpr) {
        return regexpr.test(value);
    }, "Format non valide.");
    
    
    $("#form_inscription").validate({
        rules: {
             email:
                    { required:true,
                      email:true,
                      regex:/^[A-Za-z0-9._ -]+@[A-Za-z0-9.-]+[.][A-Za-z]+$/
            },
            nom:
                    { required:true,
                        regex:/^[A-Z][A-Za-z -]{1,30}$/
            },
            prenom:
                    { required:true,
                        regex:/^[A-Z][A-Za-z -]{1,30}$/
            },
            pseudo: { 
                required:true,
                regex:/^[A-Z][A-Za-z0-9 ]{1,30}$/
            },
            mdp: "required",
            submitHandler: function(form) {
                form.submit();
            }
        }
    });
    
    $("#form_res").validate({
        rules: {
             enfant:
                    { required:true,
                range: [0, 20],
                number:true
                      
            },
            adulte:
                    { required:true,
                range: [0, 20],
                number:true
            },
            etudiant:
                    { required:true,
                range: [0, 20],
                number:true
            },
            submitHandler: function(form) {
                form.submit();
            }
        }
    });
    
    $("#form_seance").validate({
        rules: {
            chxfilm:"required",
            chxsalle:"required",
            chxheure:"required",
            datefilm:
                    { required:true,
                date:true
            },
            submitHandler: function(form) {
                form.submit();
            }
        }
    });
    
    
    $("#form_auth").validate({
        rules: {
            login:
            { required:true,
                        regex:/^[A-Z][A-Za-z0-9 ]{1,30}$/
                    },
            mdp:"required",
            submitHandler: function(form) {
                form.submit();
            }
        }
    });
    
    $("#form_modifInfo").validate({
        rules: {
             email:
                    { required:true,
                      email:true,
                      regex:/^[A-Za-z0-9._ -]+@[A-Za-z0-9.-]+[.][A-Za-z]+$/
            },
            nom:
                    { required:true,
                        regex:/^[A-Z][A-Za-z -]{1,30}$/
            },
            prenom:
                    { required:true,
                        regex:/^[A-Z][A-Za-z -]{1,30}$/
            },
            pseudo: { 
                required:true,
                regex:/^[A-Z][A-Za-z0-9 ]{1,30}$/
            },
            submitHandler: function(form) {
                form.submit();
            }
        }
    });
    
});
