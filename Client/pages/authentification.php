<?php
if(isset($_POST['submit_login_x'])) {
    $mg = new ClientManager($db);
    $retour=$mg->isClient($_POST['login'],$_POST['password']);
    
    if($retour==1) {    
        $_SESSION['client']=1;
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
    
    $_SESSION['client']=2;
    header('Location: http://localhost/projects/Projet3e/Client/index.php');
}

?>
<section id="message"><?php if(isset($message)) print $message;?></section>
<fieldset id="fieldset_login">
    <legend>Authentifiez-vous</legend>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_auth">
        <table>
            <tr>
                <td align="center" colspan="2">
                    <input type="image" value="Inscription" src="../Admin/images/bouton_inscription.png" id="inscription" name="inscription"/>
                </td>	
            </tr>
            
            <tr>
                <td colspan="2">
                    &nbsp;
                </td>	
            </tr>
            
            <tr>
                <td>Login : <?php //print " session : ".$_SESSION['admin'];?></td>
                <td><input type="text" id="login" name="login" /></td>
            </tr>
            
            <tr>
                <td>Password : </td>
                <td><input type="password" id="password" name="password" /></td>
            </tr>
            
            <tr>
                <td colspan="2">
                    &nbsp;
                </td>	
            </tr>
            <tr>
                <td colspan="2">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="image" src="../Admin/images/valider.png" name="submit_login" id="submit_login"  />
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="image" src="../Admin/images/annuler.png" name="annuler" id="annuler" />
                </td>	
            </tr>
            
            
        </table>	
    </form>
</fieldset>
<div id="shadow" class="popup"></div>