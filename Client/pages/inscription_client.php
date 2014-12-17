<?php
$mgPays = new PaysManager($db);
$liste_Pays = $mgPays->getListePays();
$nbrPays = count($liste_Pays); //Compte le nombre d'élements

if (isset($_POST['submit_nouveau_client_x'])) {
    $mgClient = new ClientManager($db);
    $retour = $mgClient->addClient($_POST['nom'], $_POST['prenom'], $_POST['pays'], $_POST['numeroTel'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['pseudo'], $_POST['mdp'], $_POST['mail']);
    if ($retour == 1) {
        $_SESSION['client'] = 1;
        $message = "Nouveau client enregistré";
        header('Location: http://localhost/projects/Projet3e/Client/index.php');
    } else {
        $message = "Données incorrectes";
    }
}
if (isset($_POST['annulerCl_x'])) {
    session_destroy();
    header('Location: http://localhost/projects/Projet3e/Client/index.php');
}
?>


<section id="message"><?php if (isset($message)) print $message; ?></section>
<fieldset id="fieldset_enrAnim">
    <legend>Ajout d'un client </legend>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_nvAdm">
        <table>
            <tr>
                <td>Nom : </td>
                <td><input type="text" id="nom" name="nom" /></td>
            </tr>

            <tr>
                <td>Prenom : </td>
                <td><input type="text" id="prenom" name="prenom" /></td>
            </tr>

            <tr>
                <td>Pays : </td>
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
                <td>Numero de téléphone : </td>
                <td><input type="text" id="numeroTel" name="numeroTel" /></td>
            </tr>  

            <tr>
                <td>Rue : </td>
                <td><input type="text" id="rue" name="rue"/></td>
            </tr>

            <tr>
                <td>Code Postal : </td>
                <td><input type="text" id="cp" name="cp"/></td>
            </tr>

            <tr>
                <td>Ville : </td>
                <td><input type="text" id="ville" name="ville"/></td>
            </tr>

            <tr>
                <td>Pseudonyme : </td>
                <td><input type="text" id="pseudo" name="pseudo"/></td>
            </tr>

            <tr>
                <td>Mot de passe : </td>
                <td><input type="password" id="mdp" name="mdp"/></td>
            </tr>

            <tr>
                <td>Mail : </td>
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