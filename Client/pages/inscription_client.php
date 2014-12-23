<?php
    $mgPays = new PaysManager($db);
    $liste_Pays = $mgPays->getListePays();
    $nbrPays = count($liste_Pays); //Compte le nombre d'élements

    if (isset($_POST['submit_nouveau_client_x'])) {
        $mgClient = new ClientManager($db);
        $retour = $mgClient->addClient($_POST['nom'], $_POST['prenom'], $_POST['pays'], $_POST['numeroTel'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['pseudo'], $_POST['mdp'], $_POST['mail']);
                
        if ($retour > 0) {
            
            $_SESSION['client'] = $retour;
            $message = "Nouveau client enregistré";
            header('Location: http://localhost/projects/Projet3e/Client/index.php');
        } 
        else {
            $message = "Données incorrectes";
        }
    }
    if (isset($_POST['annulerCl_x'])) {
        session_destroy();
        header('Location: http://localhost/projects/Projet3e/Client/index.php');
    }
?>


<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Ajout d'un client</h3>
    </div>
    <div class="panel-body">
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_nvAdm">
        <table id="table-Form">
            <tr>
                <th>Nom : </th>
                <td><input type="text" id="nom" name="nom" /></td>
            </tr>

            <tr>
                <th>Prenom : </th>
                <td><input type="text" id="prenom" name="prenom" /></td>
            </tr>

            <tr>
                <th>Pays : </th>
                <td>    
                    <select name="pays" id="pays"> 
                        <option value=-1>Faites votre choix</option>
<?php
for ($i = 0; $i < $nbrPays; $i++) {
    ?>
                            <option value="<?php print $liste_Pays[$i]->idpays; ?>"><?php print $liste_Pays[$i]->nompays; ?></option>
    <?php
}
?>
                    </select>
                </td>
            </tr>

            <tr>
                <th>Numero de téléphone : </th>
                <td><input type="text" id="numeroTel" name="numeroTel" /></td>
            </tr>  

            <tr>
                <th>Rue : </th>
                <td><input type="text" id="rue" name="rue"/></td>
            </tr>

            <tr>
                <th>Code Postal : </th>
                <td><input type="text" id="cp" name="cp"/></td>
            </tr>

            <tr>
                <th>Ville : </th>
                <td><input type="text" id="ville" name="ville"/></td>
            </tr>

            <tr>
                <th>Pseudonyme : </th>
                <td><input type="text" id="pseudo" name="pseudo"/></td>
            </tr>

            <tr>
                <th>Mot de passe : </th>
                <td><input type="password" id="mdp" name="mdp"/></td>
            </tr>

            <tr>
                <th>Mail : </th>
                <td><input type="email" id="mail" name="mail"/></td>
            </tr>

            <tr>
                <td colspan="2">
                    &nbsp;
                </td>	
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <input type="image" src="../Admin/images/valider.png" name="submit_nouveau_client" id="submit_nouveau_client"  />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="image" src="../Admin/images/annuler.png" name="annulerCl" id="annulerCl" />
                </td>	
            </tr>
        </table>	
    </form>
</fieldset>
<div id="shadow" class="popup"></div>