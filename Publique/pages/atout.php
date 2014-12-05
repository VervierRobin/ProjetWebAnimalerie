<h2>D&eacute;couvrez nos atouts</h2>
<?php
$mg = new ConfortManager($db);
$liste_der = $mg->getListeConfort();
//nombre d'élt du tableau de resultset
$nbr = count($liste_der);

if (isset($_GET['envoi_choix'])) {
    $mg2 = new ChenilManager($db);
    $atouts = $mg2->getListeSelection($_GET['choix']);
    $nbr_at = count($atouts);
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
                        <option value="<?php print $liste_der[$i]->id_confort; ?>">
                            <?php print $liste_der[$i]->nom; ?>
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
if (isset($nbr_at)) {
    ?>
    <table>
        <?php
        for ($i = 0; $i < $nbr_at; $i++) {
            ?>
            <tr>
                <td>
                    <img src="../admin/images/<?php print $atouts[$i]->image; ?>" alt="<?php print $atouts[$i]->denomination; ?>" />
                </td>
                <td class="up centrer">
                    <span class="txtBlue txtGras">
        <?php
        print $atouts[$i]->denomination . "<br />";
        ?></span><?php
                        if ($atouts[$i]->type_animal != '') {
                            print "<span class='txtGras'>Convient pour </span>";
                            print $atouts[$i]->type_animal;
                        }
                        if ($atouts[$i]->hauteur != -1) {
                            print "Hauteur : " . $atouts[$i]->hauteur;
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
