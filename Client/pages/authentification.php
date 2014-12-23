<?php
if(isset($_POST['submit_login_x'])) {
    $mg = new ClientManager($db);
    $retour=$mg->isClient($_POST['login'],$_POST['password']);
    
    if($retour > 0) {    
        $_SESSION['client']=$retour;
        $message="Authentifié!";
        header('Location: http://localhost/projects/Projet3e/Client/index.php');
    } 
    else {
        $message="Données incorrectes";
    }
    
}
if ( isset($_POST['annuler_x']) ) {
        header('Location: http://localhost/projects/Projet3e/Publique/index.php');
}

if ( isset($_POST['inscription_x'])) {
    
    $_SESSION['client']=-2;
    header('Location: http://localhost/projects/Projet3e/Client/index.php');
}

?>

<fieldset id="fieldset_login">
    <legend>Espace client</legend>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_auth">
        <table class="tablLogin">
            <tr>
                <td class="centrer" colspan="3">
                    <input type="image" value="Inscription" src="../Admin/images/bouton_inscription.png" id="inscription" name="inscription"/>
                    
                </td>	
            </tr>
            <tr>
                <td rowspan="7"> <img src="../Admin/images/login.png" alt="login" />
                </td>
            </tr> 
            <tr>
                <td> &nbsp;   </td>
            </tr>  
            
           <tr> 
                <td class="MaformLogin glyphicon glyphicon-user">
                    <input type="text" id="login" name="login" placeholder="Login" /> 
                </td>
             </tr> 
             <tr>
                <td> &nbsp;   </td>
            </tr>   
            <tr>
                <td class="MaformLogin glyphicon glyphicon-lock" >
                    <input type="password" id="password" name="password" placeholder="Password" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    &nbsp;
                </td>	
            </tr>
            <tr>
                <td class="centrer" colspan="2">
                    <input type="image" src="../Admin/images/valider.png" name="submit_login" id="submit_login"  />
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="image" src="../Admin/images/annuler.png" name="annuler" id="annuler" />
                </td>	
            </tr>
            
            
        </table>	
    </form>
    <section id="message"><?php if(isset($message)) print $message;?></section>
</fieldset>
