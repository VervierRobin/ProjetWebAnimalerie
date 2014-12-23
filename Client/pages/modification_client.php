<?php
    try
    {   $mgPays = new PaysManager($db);
        $liste_Pays = $mgPays->getListePays();
        $nbrPays = count($liste_Pays);

        $mgCli = new ClientManager($db);
        $Cli = $mgCli->getClient($_SESSION['client']);

        if (isset($_POST['submit_modification_client'])) {
            //print $Cli[0]->idclient ." ". $_POST['nom'] ." ". $_POST['prenom'] ." ". $_POST['pays'] ." ". $_POST['numeroTel'] ." ". $_POST['rue'] ." ". $_POST['cp'] ." ". $_POST['ville'] ." ". $_POST['pseudo'] ." ". $_POST['mdp'] ." ". $_POST['mail'];

            $mgClient = new ClientManager($db);
            $retour = $mgClient->updateClient($Cli[0]->idclient,$_POST['nom'], $_POST['prenom'], $_POST['pays'], $_POST['numeroTel'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['pseudo'], $_POST['mail']);
            print $retour;
            if ( $retour == 1 ) {
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
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Modification de vos informations</h3>
    </div>
    <div class="panel-body">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_nvAdm">
        <table id="table-Form">
            <tr>
                <th>Nom : </th>
                <td><input type="text" id="nom" value="<?php print $Cli[0]->nom?>" name="nom" /></td>
            </tr>

            <tr>
                <th>Prenom : </th>
                <td><input type="text" value="<?php print $Cli[0]->prenom?>" id="prenom" name="prenom" /></td>
            </tr>

            <tr>
                <th>Pays : </th>
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
                <th>Numero de téléphone : </th>
                <td><input type="text" value="<?php print $Cli[0]->num ?>" id="numeroTel" name="numeroTel" /></td>
            </tr>  

            <tr>
                <th>Rue : </th>
                <td><input type="text" value="<?php print $Cli[0]->rue ?>" id="rue" name="rue"/></td>
            </tr>

            <tr>
                <th>Code Postal : </th>
                <td><input type="text" value="<?php print $Cli[0]->cp ?>" id="cp" name="cp"/></td>
            </tr>

            <tr>
                <th>Ville : </th>
                <td><input type="text" value="<?php print $Cli[0]->ville ?>" id="ville" name="ville"/></td>
            </tr>

            <tr>
                <th>Pseudonyme : </th>
                <td><input type="text" value="<?php print $Cli[0]->pseudo ?>" id="pseudo" name="pseudo"/></td>
            </tr>

            <!--
            <tr>
                <th>Mot de passe : </th>
                <td><input type="password" id="mdp" name="mdp"/></td>
            </tr>
            -->

            <tr>
                <th>Mail : </th>
                <td><input type="email" value="<?php print $Cli[0]->mail ?>" id="mail" name="mail"/></td>
            </tr>

            <tr>
                <td colspan="2">
                    &nbsp;
                </td>	
            </tr>
            
             <tr>
                   <td class="centrer" colspan="2">
                    <section id="message"><?php if(isset($message)) print $message;?></section> <br /> 
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
<div id="shadow" class="popup"></div>
