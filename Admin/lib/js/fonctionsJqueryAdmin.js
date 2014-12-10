/* Jquery pour Admin */
$(document).ready(function(){
    
    $('section#login_form').css('display','none');
    $('section#login_form').fadeIn(4000);
    $('#login').focus();
    
    
    //traitement du formumulaire
    $('input#submit_login').on('click',function(event){
        event.preventDefault();
        //alert("clic");
        var login =$('input#login').val();
        var password =$('input#password').val();
        //alert(login+''+password);
        if($.trim(login)!='' && $.trim(password)!=''){
            //form_auth : <form ids="form_auth" ... >
            var data_form = $('form#form_auth').serialize();
            //alert("data_form");
            $.ajax({
                
                type:'POST',
                data: data_form,
                dataType : 'json',//format de retour
                url:'./lib/php/ajax/ajaxLogin.php',
                //en cas de succès
                //data_du_php données reçues du php
                success: function(data_du_php){
                    //=== egalité stricte
                    if(data_du_php.retour === 1){
                        $('login_form').remove();
                        window.location.href = './index.php' ; 
                    }
                    else {
                    $('section#message').html('Donnée incorrectes');
                }
                },
                fail : function(){
                    //quoi faire en cas d'échec dee l'envoi des data
                }
                
            });
        }
        else {
            $('#message').html("Remplissez les champs");
        }
        
        //return false;
    });
    
});


