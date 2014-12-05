$(document).ready(function(){
    $('input#envoi_choix').hide();
    $('select#choix').change(function(){
        var selection=$(this).attr('name');
        var valeur_selection = $(this).val();
       // alert(valeur_selection);     
       var refresh = 'index.php?'+selection+'=' + valeur_selection + '&envoi_choix=Go';
       //alert(refresh);
       window.location.href=refresh;
    });
    
   
});

