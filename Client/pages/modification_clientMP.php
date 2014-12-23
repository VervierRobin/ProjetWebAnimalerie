<?php
try {
    $mgCli = new ClientManager($db);
    $Cli = $mgCli->getClient($_SESSION['client']);

    if (isset($_POST['submit_modification_client'])) {
        //print $Cli[0]->idclient ." ". $_POST['nom'] ." ". $_POST['prenom'] ." ". $_POST['pays'] ." ". $_POST['numeroTel'] ." ". $_POST['rue'] ." ". $_POST['cp'] ." ". $_POST['ville'] ." ". $_POST['pseudo'] ." ". $_POST['mdp'] ." ". $_POST['mail'];
        $AncMP = $_POST['mdp1'];
        $NvMP1 = $_POST['mdp2'];
        $NvMP2 = $_POST['mdp3'];
        if ($AncMP != '' && $NvMP1 != '' && $NvMP2 != '') {
            $DB_MP = ''.$Cli[0]->motpass;
            $resultat = strnatcasecmp (''.$DB_MP , ''.md5($AncMP) );
            //print 'r = '.$resultat . ' motpass :  '. $DB_MP.' mon : '. md5($AncMP);
            if ($resultat == 0) {
                if ($NvMP1 == $NvMP2) {
                    $mgClient = new ClientManager($db);
                    $retour = $mgClient->updateClientMP($Cli[0]->idclient, $NvMP1);
                    //print $retour;
                    if ($retour == 1) {
                        //$_SESSION['client'] = 1;
                        $message = "Modification effectuée avec succès";
                       // header('Location: http://localhost/projects/Projet3e/Client/index.php');
                    } else {
                        $message = "Erreur";
                    }
                    //print $message;
                } else {
                    $message = "Nouveaux mots de passe ne sont pas identiques";
                }
            } else {
                $message = "Ancien mot de passe erronné";
            }
        } else {
            $message = "Champ(s) vide(s)";
        }
    }
} catch (Exception $ex) {
    print $ex;
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Modification du mot de passe</h3>
    </div>
    <div class="panel-body">
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_nvAdm">
            <table id="table-Form">
                <tr>
                    <th>Ancien mot de passe : </th>
                    <td><input type="password" id="mdp1" name="mdp1"/></td>
                </tr>
                <tr>
                    <th>Nouveau mot de passe : </th>
                    <td><input type="password" id="mdp2" name="mdp2"/></td>
                </tr>
                <tr>
                    <th>Nouveau mot de passe 2 : </th>
                    <td><input type="password" id="mdp3" name="mdp3"/></td>
                </tr>

                <tr>
                    <td colspan="2">
                        &nbsp;
                    </td>	
                </tr>

                <tr>
                    <td class="centrer" colspan="2">
                        <section id="message"><?php if (isset($message)) print $message; ?></section> <br /> 
                        <input type="submit" class="btn btn-success"  name="submit_modification_client" id="submit_modification_client" value ="Modifier" />
                    </td>	
                </tr>
            <!--<tr>
                <td align="center" colspan="2">
                    <input type="image" src="../Admin/images/valider.png" name="submit_modification_client" id="submit_modification_client"  />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="image" src="../Admin/images/annuler.png" name="annuler_modification" id="annuler_modification" />
                </td>	
            </tr>-->
            </table>	
        </form>
        </fieldset>
    </div>

