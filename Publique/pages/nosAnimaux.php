<h2>D&eacute;couvrez nos animaux</h2>
<?php
    $mg = new ClassificationManager($db);
    $liste_Class = $mg->getListeClass();
    $nbr = count($liste_Class); //Compte le nombre d'élements

    if (isset($_GET['envoi_choix'])) {
            try {
                $mg2 = new AnimalManager($db);
                $animaux = $mg2->getListeSelection($_GET['choix']);
                $nbr_animal = count($animaux);
            }
            catch(ErrorException $ex)   {
                print $ex;
            }
        }
?>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <table>
        <tr>
            <td>
                <select name="choix" id="choix"> 
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
            <td>
                <input type="submit" name="envoi_choix" value="Go" id="envoi_choix"/>                
            </td>
        </tr>
    </table>
</form>


<?php
if (isset($nbr_animal)) {
    ?>
    <table>               
        <?php
        for ($i = 0; $i < $nbr_animal; $i++) {
            ?>
            <tr>
                <td>
                    <img src="../Admin/images/animaux/<?php print $animaux[$i]->photo;?>" alt="<?php print $animaux[$i]->descphoto; ?>" />
                </td>
                <td class="up centrer">
                    <span class="txtBlue txtGras">
                        <?php
                                           
                    if ($animaux[$i]->race != '') {
                        print $animaux[$i]->espece ." : ". $animaux[$i]->race . "<br />"; 
                    }
                    ?></span><?php
                    if ($animaux[$i]->couleur != '') {
                        print "Couleur : " . $animaux[$i]->couleur. "<br />";
                    }
                    if ($animaux[$i]->taille != -1) {
                        print "Taille : " . $animaux[$i]->taille. "cm - Poids : ".$animaux[$i]->poids."kg - sexe : ".$animaux[$i]->Sexe." <br />";
                    }
                    if ($animaux[$i]->prixanimal != -1) {
                        $prixtot = $animaux[$i]->prixanimal+(($animaux[$i]->prixanimal*$animaux[$i]->tva_animal)/100);
                        print "Prix : " . $prixtot . " € <br />";
                    }
                    ?>          
                </td>
            </tr>
            <?php
        }
        ?>      

    </table>
    <?php
}
?>
