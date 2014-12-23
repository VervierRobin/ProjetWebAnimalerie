<?php
    try 
    {   if (isset($_POST['submit_nouvelle_espece'])) {
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
       /* if ( isset($_POST['annuler_nouvelle_espece_x'])) {
            session_destroy();
            header('Location: http://localhost/projects/Projet3e/Admin/index.php');
        }*/
    }
    catch ( PDOException $ex) {
        print $ex;
    }
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Ajout d'une espèce</h3>
    </div>
    <div class="panel-body">
        
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_nvAdm">
        <table id="table-Form">
            <tr>
                <th>Classe : </th>
                <td><input type="text" id="classe" name="classe"/></td>
            </tr>
            <tr>
                <th>Ordre : </th>
                <td><input type="text" id="ordre" name="ordre"/></td>
            </tr>
            <tr>
                <th>Famille : </th>
                <td><input type="text" id="famille" name="famille"/></td>
            </tr>
            <tr>
                <th>Genre : </th>
                <td><input type="text" id="genre" name="genre"/></td>
            </tr>
            <tr>
                <th>Espece : </th>
                <td><input type="text" id="espece" name="espece"/></td>
            </tr>

            <tr>
               <tr>
                   <td class="centrer" colspan="2">
                    <section id="message"><?php if(isset($message)) print $message;?></section> <br /> 
                    <input type="submit" class="btn btn-success"  name="submit_nouvelle_espece" id="submit_nouvelle_espece" value ="Enregistrer" />
                    </td>	
                </tr>
                
                <!--<td align="center" colspan="2">
                    <input type="image" src="../Admin/images/valider.png" name="submit_nouvelle_espece" id="submit_nouvelle_espece" />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="image" src="../Admin/images/annuler.png" name="annuler_nouvelle_espece" id="annuler_nouvelle_espece" />
                </td>	-->
            </tr>
        </table>	
    </form>
 </div>
</div>
