<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Découvrez nos produits</h3>
    </div>
    <div class="panel-body">
<?php
        try
        {   if (isset($_GET['envoi_choix'])) {
                
                $pageActuelle = 1;
                $maxElementsPage = 5;
                
                if(isset($_GET["numpage"])) {
                    $pageActuelle = $_GET["numpage"];
                }
                
                switch ($_GET['choix']) {
                    
                    case 1 :    $mg = new ProduitSoinManager($db);
                                $listeProduitsSoins = $mg->getListeProduitSoin($pageActuelle,$maxElementsPage);
                                $nbreProduitsSoins = count($listeProduitsSoins);
                                break;

                    case 2 :    $mg2 = new NourritureManager($db);
                                $listeNourriture = $mg2->getListeNourriture($pageActuelle,$maxElementsPage);
                                $nbreNourriture = count($listeNourriture);
                                break;

                    case 3 :    $mg3 = new AccesoireManager($db);
                                $listeAccesoire = $mg3->getListeAccesoire($pageActuelle,$maxElementsPage);
                                $nbreAccesoire = count($listeAccesoire);
                                break;

                    /*case 4 :    $mg4 = new DocumentationManager($db);
                                $listeDocumentation = $mg4->getListeDocumentation();
                                $nbreDocumentation = count($listeDocumentation);
                                break;*/
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
            <!-- <td>
                <input type="submit" name="envoi_choix" value="Go" id="envoi_choix"/>                
            </td> -->
            
            <td>
                <select name="choix" id="choix"> 
                    <option value=-1>Faites votre choix</option>
                    <option value=1>Produits de soins</option>
                    <option value=2>Nourriture</option>
                    <option value=3>Accesoires</option>
                </select>
            </td>   
        </tr>
    </table>
</form>

<?php
    if (isset($nbreProduitsSoins)) {
        
        $nbrePage = floor($mg->countProduitSoin()/$maxElementsPage)+1;
        
        echo '<h3 align="center">Page : ';
        for ( $i = 1; $i <= $nbrePage; $i++ )
        {    if( $i == $pageActuelle)   {  
                echo ' [ '.$i.' ] '; 	
             }
             else {  
                 echo ' <a href="index.php?choix=1&envoi_choix=Go&numpage='.$i.'">'.$i.'</a> ';
             }
        }
        echo '</h3>';
?>
    <table>
        <tr>
             <img src="./images/pdf.png" alt="Pdf"/>&nbsp;
             <a href="./pages/print_produit_soin.php" target="_blank">Télécharger la liste</a>
        </tr>
<?php
        for ( $i = 0; $i < $nbreProduitsSoins; $i++) {
?>
                
                <tr>
                        <td class="up centrer" width="300px">
                            <span class="txtBlue txtGras">
                                <?php
                                    print utf8_encode($listeProduitsSoins[$i]->produit). "<br/><br/>";
                                ?>
                            </span>
                                <?php
                                    print "<strong>Prix : </strong>".$listeProduitsSoins[$i]->prixsoin. " €". "<br/>";
                                    print "<strong>Description du produit</strong></br>".utf8_encode($listeProduitsSoins[$i]->pour). "<br/>";
                                    $mg = new ProduitSoinManager($db);
                                    $classification = $mg->getProduitSoinClassification($listeProduitsSoins[$i]->idclassification_typeanimal);
                                    print "<strong>Destiné pour</strong></br>".utf8_encode($classification->espece). "<br/><br/><br/><br/>";
                                ?>   
                        </td>
                        <td>
                            <img src="./images/produitsDeSoins/<?php print $listeProduitsSoins[$i]->photo;?>" alt="<?php print $listeProduitsSoins[$i]->descphoto; ?>" class="img-redim"/> 
                        </td>
                </tr>
<?php
        }
?>
    </table>
<?php   
    } //Fin du IF
?>

<?php
    if (isset($nbreNourriture)) {
        
        $nbrePage = floor($mg2->countNourriture()/$maxElementsPage)+1;
        
        echo '<h3 align="center">Page : ';
        for ( $i = 1; $i <= $nbrePage; $i++ )
        {    if( $i == $pageActuelle)   {  
                echo ' [ '.$i.' ] '; 	
             }
             else {  
                 echo ' <a href="index.php?choix=1&envoi_choix=Go&numpage='.$i.'">'.$i.'</a> ';
             }
        }
        echo '</h3>';
?>


    <table>
        <tr>
            <img src="./images/pdf.png" alt="Pdf"/>&nbsp;
            <a href="./pages/print_nourriture.php" target="_blank">Télécharger la liste</a>
        </tr>
<?php
        for ($i = 0; $i < $nbreNourriture; $i++) {
?>
                
                
                <tr>
                        <td class="up centrer" width="300px">
                            <span class="txtBlue txtGras">
                                <?php
                                    print utf8_encode($listeNourriture[$i]->intitule). "<br/>";
                                ?>
                            </span>
                                <?php
                                    print utf8_encode($listeNourriture[$i]->description). "<br/>";
                                ?>   
                        </td>
                        <td>
                            <img src="../Admin/images/nourriture/<?php print $listeNourriture[$i]->photo;?>" alt="<?php print utf8_encode($listeNourriture[$i]->descphoto); ?>" class="img-redim"/>
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
    if (isset($nbreAccesoire)) {
        
        $nbrePage = floor($mg3->countAccesoire()/$maxElementsPage)+1;
        
        echo '<h3 align="center">Page : ';
        for ( $i = 1; $i <= $nbrePage; $i++ )
        {    if( $i == $pageActuelle)   {  
                echo ' [ '.$i.' ] '; 	
             }
             else {  
                 echo ' <a href="index.php?choix=1&envoi_choix=Go&numpage='.$i.'">'.$i.'</a> ';
             }
        }
        echo '</h3>';
?>
    <table>
        <tr>
            <img src="./images/pdf.png" alt="Pdf"/>&nbsp;
            <a href="./pages/print_accesoire.php" target="_blank">Télécharger la liste</a>
        </tr>
<?php
        for ($i = 0; $i < $nbreAccesoire; $i++) {
?>
            <tr>
                <td> 
                    <img src="../Admin/images/accesoires/<?php print $listeAccesoire[$i]->photo;?>" alt="<?php print $listeAccesoire[$i]->descphoto; ?>" class="img-redim"/>
                </td>
                <td> 
                    <table>
                        <td class="up centrer" width="300px">
                            <span class="txtBlue txtGras">
                                <?php 
                                    print $listeAccesoire[$i]->descriptionaccesoire
                                ?>
                            </span> 
                        </td>
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
    </div>
</div>