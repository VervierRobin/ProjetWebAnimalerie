<script src="./lib/js/fonctionsJqueryNvAdmin.js"></script>
<?php
if (isset($_POST['submit_enr'])) {
    $mg = new Login($db);
    $retour = $mg->addAdmin($_POST['login'], $_POST['password'], $_POST['password2']);
    if ($retour == 1) {
        $message = "Nouveau administrateur enregistré";
        //header('Location: http://localhost/projects/Projet3e/Admin/index.php');
        //header('Location: ../../../Admin/index.php');
    } else {
        $message = "Données incorrectes";
    }
}
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Nouveau administrateur du site</h3>
    </div>

    <div class="panel-body">
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_nvAdm">
            <table id="table-Form">
                <tr>
                    <th>Nouveau login : <?php //print " session : ".$_SESSION['admin']; ?></th>
                    <td><input type="text" id="login" name="login" /></td>
                </tr>
                <tr>
                    <th>Nouveau mot de passe : </th>
                    <td><input type="password" id="password" name="password" /></td>
                </tr>
                <tr>
                    <th>Nouveau mot de passe 2 : </th>
                    <td><input type="password" id="password2" name="password2" /></td>
                </tr>  
                <tr>
                    <td class="centrer" colspan="2"><br /> 
                        <section id="message"><?php if (isset($message)) print $message; ?></section> <br />
                        <input type="submit" class="btn btn-success"  name="submit_enr" id="submit_enr"  value ="Enregistrer" />
                    </td>	
                </tr>
            </table>
        </form>
    </div>