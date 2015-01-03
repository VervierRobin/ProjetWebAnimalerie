<?php
$mg = new ClassificationManager($db);
$liste_Class = $mg->getListeClass();
$nbr = count($liste_Class); //Compte le nombre d'élements

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">D&eacute;couvrez nos animaux</h3>
    </div>
    <div class="panel-body">
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
                                    <?php print utf8_encode($liste_Class[$i]->espece);
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



        <table class="table">               
           
            <tr >
            <th>
            <?php
            if (isset($_GET['envoi_choix'])) {
                try {
                    $mg2 = new AnimalManager($db);
                    $animaux = $mg2->getListeSelection($_GET['choix']);
                    $nbr_animal = count($animaux);
                } catch (ErrorException $ex) {
                    print $ex;
                }
            }
            ?>
            </th>
            
            </tr>
            <?php
              if (isset($nbr_animal)) {

                for ($i = 0; $i < $nbr_animal; $i++) {
                    ?>

                    <tr>
                        <td class="up centrer" width="300px">
                            <span class="txtBlue txtGras">

                                <?php
                                if ($animaux[$i]->race != '') {
                                    print utf8_encode($animaux[$i]->espece) . " : " . utf8_encode($animaux[$i]->race) . "<br />";
                                }
                                ?></span>

                            <?php
                            if ($animaux[$i]->couleur != '') {
                                print "Couleur : ";
                                ?> 
                                <span style="background:<?php print $animaux[$i]->couleur ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                                <?php
                                print "<br />";
                            }
                            $sex = ' - ';
                            if ($animaux[$i]->sexe === 'm') {
                                $sex = '♂';
                            } elseif ($animaux[$i]->sexe === 'f') {
                                $sex = '♀';
                            }
                            print "Taille : " . $animaux[$i]->taille . "cm <br />";
                            print "Poids : " . $animaux[$i]->poids . "g <br />";
                            print "Sexe : " . $sex . " <br />";
                            if ($animaux[$i]->prixanimal != -1) {
                                $prixtot = $animaux[$i]->prixanimal + (($animaux[$i]->prixanimal * $animaux[$i]->tva_animal) / 100);
                                print "Prix : " . $prixtot . " € <br />";
                            }
                            ?>   

                        </td>
                        <td>
                            <img src="../Admin/images/animaux/<?php print $animaux[$i]->photo; ?>" alt="<?php print utf8_encode($animaux[$i]->descphoto); ?>" class="img-redim" />
                        </td>

                    </tr>
                    <?php
            } //fin du for
           } //fin du if
            ?>      
            </table>
    </div>
</div>