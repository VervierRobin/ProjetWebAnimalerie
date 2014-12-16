/* jquery pour nv admin */
$(document).ready(function () {
    $('input#annuler2').on('click', function (event) {
        window.location.href = "../Admin/index.php";
        return false;
    });
    $('input#submit_enr').on('click', function (event) {
        login = $("#login").val();
        password = $("#password").val();
        password2 = $("#password2").val();

        if ($.trim(login) != '' && $.trim(password) != '' && $.trim(password2) != '') {
            if ($.trim(password) !== $.trim(password2)) {
                $('#message').html("--> Les mots de passe ne sont pas identiques");
            }
            else {
                //alert("ok")
                var data_form = $('form#form_nvAdm').serialize();
                //alert(data_form);
                $.ajax({
                    type: 'POST',
                    data: data_form, // si sérialisé
                    dataType: "json",
                    url: './lib/php/ajax/AjaxNvAdmin.php',
                    success: function (data_du_php) {
                        if (data_du_php.retour == 1) {
                            $('#message').html("--> Administrateur enregistré");
                        }
                        else {
                            // alert(data_du_php.retour);
                            $('#message').html("--> Données incorrectes");

                        }
                    },
                    fail: function () {
                        alert('Raté');
                    }
                });
            }
        }
        else {
            $('#message').html("--> Remplissez les champs");
        }
        return false;
    });
});


