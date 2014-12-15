<h2>Découvrez nos produits</h2>
<?php
        try
        {   if (isset($_GET['envoi_choix'])) {
            switch ($_GET['choix']) {
            
                case 1 :    $mg = new ProduitSoinManager($db);
                            $listeProduitsSoins = $mg->getListeProduitSoin();
                            $nbreProduitsSoins = count($listeProduitsSoins);
                            break;
                
                case 2 :    $mg2 = new NourritureManager($db);
                            $listeNourriture = $mg2->getListeNourriture();
                            $nbreNourriture = count($listeNourriture);
                            break;
                
                case 3 :    $mg3 = new AccesoireManager($db);
                            $listeAccesoire = $mg3->getListeAccesoire();
                            $nbreAccesoire = count($listeAccesoire);
                            break;
                        
                case 4 :    $mg4 = new DocumentationManager($db);
                            $listeDocumentation = $mg4->getListeDocumentation();
                            $nbreDocumentation = count($listeDocumentation);
                            break;
            }
        }
        }
        catch (ErrorException $ex) {
            print $ex;
        }   
?>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <table>
        <tr>
            <td>
                <select name="choix" id="choix"> 
                    <option value=-1>Faites votre choix</option>
                    <option value=1>Produits de soins</option>
                    <option value=2>Nourriture</option>
                    <option value=3>Accesoires</option>
                    <option value="4">Documentation</option>
                </select>
            </td>
            
            <td>
                <input type="submit" name="envoi_choix" value="Go" id="envoi_choix"/>                
            </td>
        </tr>
    </table>
</form>


<?php
    if (isset($nbreProduitsSoins)) {
?>
    <table>
<?php
        for ($i = 0; $i < $nbreProduitsSoins; $i++) {
?>
            <tr>
                <td>
                   <img src="../Admin/images/produitsDeSoins/<?php print $listeProduitsSoins[$i]->photo;?>" alt="<?php print $listeProduitsSoins[$i]->descphoto; ?>" /> 
                </td>
                
                <td> 
                    <table>
                        <tr> 
                            <td colspan=2><h3>Produit soin n°<?php print $i+1?></h3></td> 
                        </tr>
                        <tr> 
                            <td>Nom du produit</td>
                            <td><?php print $listeProduitsSoins[$i]->produit; ?></td>
                        </tr>
                        <tr>
                            <td>Prix</td>
                            <td><?php print $listeProduitsSoins[$i]->prixsoin?></td>
                        </tr>
                        <tr>
                            <td>Description du produit</td>
                            <td><?php print $listeProduitsSoins[$i]->pour?></td>
                        </tr>
                        <tr>
                            <td>Destiné pour</td>
                            <td>
                                <?php 
                                    $mg = new ProduitSoinManager($db);
                                    $classification = $mg->getProduitSoinClassification($listeProduitsSoins[$i]->idclassification_typeanimal);
                                    print $classification->espece
                                ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
<?php
        }
?>
    </table>
<?php   
    }
?>


<?php
    if (isset($nbreNourriture)) {
?>
    <table>
<?php
        for ($i = 0; $i < $nbreNourriture; $i++) {
?>
            <tr>
                <td>
                   <img src="../Admin/images/nourriture/<?php print $listeNourriture[$i]->photo;?>" alt="<?php print $listeNourriture[$i]->descphoto; ?>" /> 
                </td>
                
                <td> 
                    <table>
                        <tr> 
                            <td colspan=2><h3>Produit alimentaire n°<?php print $i+1?></h3></td> 
                        </tr>
                        <tr> 
                            <td>Nom du produit</td>
                            <td><?php print $listeNourriture[$i]->description ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
<?php
        }
?>
    </table>
<?php   
    }
?>