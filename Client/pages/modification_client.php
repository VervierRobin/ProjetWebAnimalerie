<?php
    try
    {   $mgPays = new PaysManager($db);
        $liste_Pays = $mgPays->getListePays();
        $nbrPays = count($liste_Pays);

        $mgCli = new ClientManager($db);
        $Cli = $mgCli->getClient($_SESSION['client']);

        if (isset($_POST['submit_modification_client_x'])) {
            //print $Cli[0]->idclient ." ". $_POST['nom'] ." ". $_POST['prenom'] ." ". $_POST['pays'] ." ". $_POST['numeroTel'] ." ". $_POST['rue'] ." ". $_POST['cp'] ." ". $_POST['ville'] ." ". $_POST['pseudo'] ." ". $_POST['mdp'] ." ". $_POST['mail'];

            $mgClient = new ClientManager($db);
            $retour = $mgClient->updateClient($Cli[0]->idclient,$_POST['nom'], $_POST['prenom'], $_POST['pays'], $_POST['numeroTel'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['pseudo'], $_POST['mdp'], $_POST['mail']);
            print $retour;
            if ( $retour = 1 ) {
                //$_SESSION['client'] = 1;
                $message = "Modification effectuée avec succès";
                header('Location: http://localhost/projects/Projet3e/Client/index.php');
            } 
            else {
                $message = "Erreur";
            }
            print $message;
        }
        if (isset($_POST['annuler_modification_x'])) {
            session_destroy();
            header('Location: http://localhost/projects/Projet3e/Client/index.php');
        }
    }
    catch ( Exception $ex )
    {
        print $ex;
    }
?>


<section id="message"><?php if (isset($message)) print $message; ?></section>
<fieldset id="fieldset_enrAnim">
    <legend align="center">Modification de vos informations </legend>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_nvAdm">
        <table align="center">
            <tr>
                <td>Nom : </td>
                <td><input type="text" id="nom" value="<?php print $Cli[0]->nom?>" name="nom" /></td>
            </tr>

            <tr>
                <td>Prenom : </td>
                <td><input type="text" value="<?php print $Cli[0]->prenom?>" id="prenom" name="prenom" /></td>
            </tr>

            <tr>
                <td>Pays : </td>
                <td>    
                    <select name="pays" id="pays"> 
                        <option value=-1>Faites votre choix</option>
<?php
                            for ($i = 0; $i < $nbrPays; $i++) {
?>
                                <option value="<?php print $liste_Pays[$i]->idpays; ?>" 
                                    <?php if ($Cli[0]->idpays_pays == $liste_Pays[$i]->idpays) print "selected"?>> 
                                    <?php print $liste_Pays[$i]->nompays;?>
                                </option>
<?php
                            }
?>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Numero de téléphone : </td>
                <td><input type="text" value="<?php print $Cli[0]->num ?>" id="numeroTel" name="numeroTel" /></td>
            </tr>  

            <tr>
                <td>Rue : </td>
                <td><input type="text" value="<?php print $Cli[0]->rue ?>" id="rue" name="rue"/></td>
            </tr>

            <tr>
                <td>Code Postal : </td>
                <td><input type="text" value="<?php print $Cli[0]->cp ?>" id="cp" name="cp"/></td>
            </tr>

            <tr>
                <td>Ville : </td>
                <td><input type="text" value="<?php print $Cli[0]->ville ?>" id="ville" name="ville"/></td>
            </tr>

            <tr>
                <td>Pseudonyme : </td>
                <td><input type="text" value="<?php print $Cli[0]->pseudo ?>" id="pseudo" name="pseudo"/></td>
            </tr>

            <tr>
                <td>Mot de passe : </td>
                <td><input type="password" value="<?php print $Cli[0]->motpass ?>" id="mdp" name="mdp"/></td>
            </tr>

            <tr>
                <td>Mail : </td>
                <td><input type="email" value="<?php print $Cli[0]->mail ?>" id="mail" name="mail"/></td>
            </tr>

            <tr>
                <td colspan="2">
                    &nbsp;
                </td>	
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="image" src="../Admin/images/valider.png" name="submit_modification_client" id="submit_modification_client"  />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="image" src="../Admin/images/annuler.png" name="annuler_modification" id="annuler_modification" />
                </td>	
            </tr>
        </table>	
    </form>
</fieldset>
<div id="shadow" class="popup"></div>
