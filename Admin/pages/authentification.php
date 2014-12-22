<?php
if (isset($_POST['submit_login_x'])) {
    $mg = new Login($db);
    $retour = $mg->isAdmin($_POST['login'], $_POST['password']);
    if ($retour == 1) {
        $_SESSION['admin'] = 1;
        $message = "Authentifié!";
        //header('Location: http://localhost/projects/Projet3e/Admin/index.php');
        header('Location: ../../../Admin/index.php');
    } else {
        $message = "Données incorrectes";
    }
}
?>







<fieldset id="fieldset_login">
    <legend class="legende">Authentification</legend>

    
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_auth">
 
        <table class="tablLogin">
            <tr>
                <td rowspan="6"> <img src="./images/login.png" alt="login" />
                </td>
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
                <td >
                    &nbsp;
                </td>	
            </tr>
            <tr>
                <td align="center">
                    <input type="image" src="./images/valider.png" name="submit_login" id="submit_login"  />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="image" src="./images/annuler.png" name="annuler" id="annuler" />
                </td>	
            </tr>
        </table>	
    </form> 
    <br />
    <section id="message"><?php if (isset($message)) print $message; ?></section>

</fieldset>
<div id="shadow" class="popup"></div>

