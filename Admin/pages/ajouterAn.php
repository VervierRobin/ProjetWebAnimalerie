<?php
$mg = new ClassificationManager($db);
$liste_Class = $mg->getListeClass();
$nbr = count($liste_Class); //Compte le nombre d'élements

$mgPays = new PaysManager($db);
$liste_Pays = $mgPays->getListePays();
$nbrPays = count($liste_Pays); //Compte le nombre d'élements


if (isset($_POST['submit_enrAn'])) {
    $mgA = new AnimalManager($db);
    $retour = $mgA->addAnimal($_POST['choixEsp'], $_POST['race'], $_POST['num'], $_POST['couleur'], $_POST['taille'], $_POST['poids'], $_POST['choixSex'], $_POST['px'], $_POST['tva'], $_POST['photo'], $_POST['descPhoto'], $_POST['stock'], $_POST['pays']);
    if ($retour == 1) {
        $message = "Nouveau animal enregistré";
        header('Location: http://localhost/projects/Projet3e/Admin/index.php');
        //header('Location: ../../../Admin/index.php');
    } else {
        $message = "Données incorrectes";
    }
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Ajout d'un animal</h3>
    </div>
    <div class="panel-body">
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_nvAdm">
            <table id="table-Form" >
                <tr>
                    <th>Espèce : </th>
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
                    <th>Race : </th>
                    <td><input type="text" id="race" name="race" /></td>
                </tr>
                <tr>
                    <th>Numéro d'identification : </th>
                    <td><input type="text" id="num" name="num" /></td>
                </tr>
                <tr>
                    <th>Couleur : </th>
                    <td><input type="color" id="couleur" name="couleur" /></td>
                </tr>
                <tr>
                    <th>Taille : </th>
                    <td><input type="number" id="taille" name="taille" placeholder="cm"/></td>
                </tr>  
                <tr>
                    <th>Poids : </th>
                    <td><input type="number" id="poids" name="poids" placeholder="gramme"/></td>
                </tr>
                <tr>
                    <th>Sexe : </th>
                    <td>    
                        <select name="choixSex" id="choixSex"> 
                            <option value="-"> - </option>
                            <option value="m"> ♂ </option>
                            <option value="f"> ♀ </option>      

                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Pays : </th>
                    <td>    
                        <select name="pays" id="pays"> 
                            <option value=-1>Faites votre choix</option>
                            <?php
                            for ($i = 0; $i < $nbrPays; $i++) {
                                ?>
                                <option value="<?php print $liste_Pays[$i]->idpays; ?>">
                                    <?php print $liste_Pays[$i]->nompays;
                                    ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Prix HTVA :</th>
                    <td><input type="text" id="px" name="px" placeholder="€"  /></td>
                </tr>          
                <tr>
                    <th>Taux TVA (%) : </th>
                    <td><input type="text" id="tva" name="tva" value="21" /></td>
                </tr>
                <tr>
                    <th>Nom photo : </th>
                    <td><input type="text" id="photo" name="photo" placeholder="maphoto.jpg" /></td>
                </tr>
                <tr>
                    <th>Description photo : </th>
                    <td><input type="text" id="descPhoto" name="descPhoto" placeholder="Ma photo" /></td>
                </tr>  
                <tr>
                    <th>Stock : </th>
                    <td><input type="number" id="stock" name="stock" min ="0" value="0"/></td>
                </tr>            
                <tr>
                    <td colspan="2">
                        &nbsp;
                    </td>	
                </tr>
                <tr>
                   <td class="centrer" colspan="2">
                    <section id="message"><?php if(isset($message)) print $message;?></section> <br /> 
                    <input type="submit" class="btn btn-success"  name="submit_enrAn" id="submit_enrAn" value ="Enregistrer" />
                    </td>	
                </tr>


            </table>	
        </form>
    </div>
</div>
