<script src="./lib/js/fonctionsJqueryNvAdmin.js"></script>
<?php

if(isset($_POST['submit_enr'])) {
    $mg = new Login($db);
    $retour=$mg->addAdmin($_POST['login'],$_POST['password'],$_POST['password2']);
    if($retour==1) {
        $message="Nouveau administrateur enregistré";
        //header('Location: http://localhost/projects/Projet3e/Admin/index.php');
        //header('Location: ../../../Admin/index.php');
    } 
    else {
        $message="Données incorrectes";
    }
}
?>
<section id="message"><?php if(isset($message)) print $message;?></section>
<fieldset id="fieldset_enrAdmin">
    <legend>Nouveau administrateur du site</legend>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_nvAdm">
        <table>
            <tr>
                <td>Nouveau login : <?php //print " session : ".$_SESSION['admin'];?></td>
                <td><input type="text" id="login" name="login" /></td>
            </tr>
            <tr>
                <td>Nouveau mot de passe : </td>
                <td><input type="password" id="password" name="password" /></td>
            </tr>
              <tr>
                <td>Nouveau mot de passe 2 : </td>
                <td><input type="password" id="password2" name="password2" /></td>
            </tr>          
            <tr>
                <td colspan="2">
                    &nbsp;
                </td>	
            </tr>
            <tr>
                <td colspan="2">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <input type="image" src="./images/valider.png" name="submit_enr" id="submit_enr"  />
                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="image" src="./images/annuler.png" name="annuler2" id="annuler2" />
                </td>	
            </tr>
            
            
        </table>	
    </form>
</fieldset>
<div id="shadow" class="popup"></div>
