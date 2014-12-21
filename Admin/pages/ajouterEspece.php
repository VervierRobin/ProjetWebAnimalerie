<?php
    try 
    {   if (isset($_POST['submit_nouvelle_espece_x'])) {
            $nouvelleClassification = new ClassificationManager($db);
            $result = $nouvelleClassification->addClassification($_POST['classe'],$_POST['ordre'],$_POST['famille'],$_POST['genre'],$_POST['espece']);
            if ($result == 1) {
                $message = "Nouvelle espèce enregistrée";
                header('Location: http://localhost/projects/Projet3e/Admin/index.php');
            }
            else {
                $message = "Données incorrectes";
            }
        }
        if ( isset($_POST['annuler_nouvelle_espece_x'])) {
            session_destroy();
            header('Location: http://localhost/projects/Projet3e/Admin/index.php');
        }
    }
    catch ( PDOException $ex) {
        print $ex;
    }
?>

<section id="message"><?php if (isset($message)) print $message; ?></section>
<fieldset id="fieldset_enrAnim">
    <legend>Ajout d'une espèce</legend>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_nvAdm">
        <table>
            <tr>
                <td>Classe : </td>
                <td><input type="text" id="classe" name="classe"/></td>
            </tr>
            <tr>
                <td>Ordre : </td>
                <td><input type="text" id="ordre" name="ordre"/></td>
            </tr>
            <tr>
                <td>Famille : </td>
                <td><input type="text" id="famille" name="famille"/></td>
            </tr>
            <tr>
                <td>Genre : </td>
                <td><input type="text" id="genre" name="genre"/></td>
            </tr>
            <tr>
                <td>Espece : </td>
                <td><input type="text" id="espece" name="espece"/></td>
            </tr>

            <tr>
                <td align="center" colspan="2">
                    <input type="image" src="../Admin/images/valider.png" name="submit_nouvelle_espece" id="submit_nouvelle_espece" />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="image" src="../Admin/images/annuler.png" name="annuler_nouvelle_espece" id="annuler_nouvelle_espece" />
                </td>	
            </tr>
        </table>	
    </form>
</fieldset>
<div id="shadow" class="popup"></div>