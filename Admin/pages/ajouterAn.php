<?php
$mg = new ClassificationManager($db);
$liste_Class = $mg->getListeClass();
$nbr = count($liste_Class); //Compte le nombre d'élements

$mgPays = new PaysManager($db);
$liste_Pays = $mgPays->getListePays();
$nbrPays = count($liste_Pays); //Compte le nombre d'élements


if (isset($_POST['submit_enrAn_x'])) {
    $mgA = new AnimalManager($db);
    $retour = $mgA->addAnimal($_POST['choixEsp'], $_POST['race'], $_POST['num'],$_POST['couleur'], $_POST['taille'], $_POST['poids'],$_POST['choixSex'], $_POST['px'], $_POST['tva'],$_POST['photo'], $_POST['descPhoto'], $_POST['stock'],$_POST['pays']);
    if ($retour == 1) {
      $message = "Nouveau animal enregistré";
        //header('Location: http://localhost/projects/Projet3e/Admin/index.php');
        //header('Location: ../../../Admin/index.php');
    } else {
        $message = "Données incorrectes";
    }
}

?>


<section id="message"><?php if (isset($message)) print $message; ?></section>
<fieldset id="fieldset_enrAnim">
    <legend>Ajout d'un animal </legend>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_nvAdm">
        <table>
            <tr>
                <td>Espèce : <?php //print " session : ".$_SESSION['admin'];  ?></td>
                <td>
                    <select name="choixEsp" id="choixEsp"> 
                        <option value=-1>Faites votre choix</option>
                        <?php
                        for ($i = 0; $i < $nbr; $i++) {
                            ?>
                            <option value="<?php print $liste_Class[$i]->idclassification; ?>">
                            <?php print $liste_Class[$i]->espece;
                            ?>
                            </option>
                                <?php
                            }
                            ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Race : </td>
                <td><input type="text" id="race" name="race" /></td>
            </tr>
            <tr>
                <td>Numéro d'identification : </td>
                <td><input type="text" id="num" name="num" /></td>
            </tr>
            <tr>
                <td>Couleur : </td>
                <td><input type="color" id="couleur" name="couleur" /></td>
            </tr>
            <tr>
                <td>Taille : (cm)</td>
                <td><input type="number" id="taille" name="taille" /></td>
            </tr>  
            <tr>
                <td>Poids : (g)</td>
                <td><input type="number" id="poids" name="poids" /></td>
            </tr>
            <tr>
                <td>Sexe : </td>
                <td>    
                    <select name="choixSex" id="choixSex"> 
                        <option value="-"> - </option>
                        <option value="m"> ♂ </option>
                        <option value="f"> ♀ </option>      

                    </select>
                </td>
            </tr>
            <tr>
                <td>Pays : </td>
                
                <td>    
                    <select name="pays" id="pays"> 
                            <option value=-1>Faites votre choix</option>
                    <?php
                            for ($i = 0; $i < $nbrPays; $i++) {
                    ?>
                                <option value="<?php print $liste_Pays[$i]->idpays; ?>"><?php print $liste_Pays[$i]->nompays;?></option>
                    <?php
                            }
                    ?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>Prix HTVA : (€)</td>
                <td><input type="text" id="px" name="px" /></td>
            </tr>          
            
            <tr>
                <td>TVA : (%)</td>
                <td><input type="text" id="tva" name="tva" /></td>
            </tr>
            
            <tr>
                <td>Nom photo : </td>
                <td><input type="text" id="photo" name="photo" /></td>
            </tr>
            
            <tr>
                <td>Description photo : </td>
                <td><input type="text" id="descPhoto" name="descPhoto" /></td>
            </tr>
            
            <tr>
                <td>Stock : </td>
                <td><input type="number" id="stock" name="stock" /></td>
            </tr>            
            
            <tr>
                <td colspan="2">
                    &nbsp;
                </td>	
            </tr>
            
            <tr>
                <td align="center" colspan="2">
                    <input type="image" src="./images/valider.png" name="submit_enrAn" id="submit_enrAn"  />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="image" src="./images/annuler.png" name="annulerAn" id="annulerAn" />
                </td>	
            </tr>


        </table>	
    </form>
</fieldset>
<div id="shadow" class="popup"></div>
