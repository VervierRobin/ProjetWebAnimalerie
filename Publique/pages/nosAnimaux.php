<h2>D&eacute;couvrez nos animaux</h2>
<?php
$mg = new ClassificationManager($db);
$liste_Class = $mg->getListeClass();
//nombre d'élt du tableau de resultset
$nbr = count($liste_Class);
$espec;

if (isset($_GET['envoi_choix'])) {
    $mg2 = new AnimalManager($db);
    $animaux = $mg2->getListeSelection($_GET['choix']);
    $nbr_animal = count($animaux);
}
?>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <table>
        <tr>
            <td>
                <select name="choix" id="choix"> 
                    <option value="">Faites votre choix</option>
                    <?php
                    for ($i = 0; $i < $nbr; $i++) {
                        ?>
                        <option value="<?php print $liste_Class[$i]->idclassification; ?>">
                            <?php $espec = print $liste_Class[$i]->espece; ?>
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
print "okkkkkk";
if (isset($nbr_animal)) {
    ?>
    <table>               
        <?php
        for ($i = 0; $i < $nbr_animal; $i++) {
            ?>
            <tr>
                <td>
                    <img src="../Admin/images/<?php print $animaux[$i]->photo; ?>" alt="<?php print $animaux[$i]->descphoto; ?>" />
                </td>
                <td class="up centrer">
                    <span class="txtBlue txtGras">
                        <?php
                        print $espec . "<br />";
                        ?></span><?php
                    
                    if ($animaux[$i]->race != '') {
                        print "Race : " . $animaux[$i]->race;
                    }
                    if ($animaux[$i]->couleur != '') {
                        print "Couleur : " . $animaux[$i]->couleur;
                    }
                    if ($animaux[$i]->taille != -1) {
                        print "Taille : " . $animaux[$i]->taille;
                    }
                    if ($animaux[$i]->prixanimal != -1) {
                        print "Prix : " . $animaux[$i]->prixanimal . " €";
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
