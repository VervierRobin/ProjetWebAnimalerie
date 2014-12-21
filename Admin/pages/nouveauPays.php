<?php
    try
    {    if (isset($_POST['submit_add_pays_x'])) {
            $nouveauPays = new PaysManager($db);
            $retour = $nouveauPays->addPays($_POST['nomPays'],$_POST['continent']);
            if ( $retour = 1 ) {
                $message = "Ajout effectuée avec succès";
                header('Location: http://localhost/projects/Projet3e/Admin/index.php');
            } 
            else {
                $message = "Erreur";
            }
        }
        if (isset($_POST['annuler_add_pays_x'])) {
            session_destroy();
            header('Location: http://localhost/projects/Projet3e/Admin/index.php');
        }
    }
    catch ( Exception $ex )
    {
        print $ex;
    }
?>


<section id="message"><?php if (isset($message)) print $message; ?></section>
<fieldset id="fieldset_enrAnim">
    <legend align="center">Ajout d'un nouveau pays</legend>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_nvAdm">
        <table align="center">
            <tr>
                <td>Nom du pays : </td>
                <td><input type="text" id="nomPays" name="nomPays" /></td>
            </tr>

            <tr>
                <td>Continent</td>
                <td>
                    <select name="continent" id="continent"> 
                        <option value=-1>Faites votre choix</option>
                        <option value="Europe">Europe</option>
                        <option value="Afrique">Afrique</option>
                        <option value="Asie">Asie</option>
                        <option value="Amerique">Amérique</option>
                        <option value="Oceanie">Océanie</option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td align="center" colspan="2">
                    <input type="image" src="../Admin/images/valider.png" name="submit_add_pays" id="submit_add_pays"  />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="image" src="../Admin/images/annuler.png" name="annuler_add_pays" id="annuler_add_pays" />
                </td>	
            </tr>
            
        </table>	
    </form>
</fieldset>
<div id="shadow" class="popup"></div>