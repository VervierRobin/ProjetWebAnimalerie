<h2>Découvrez nos produits</h2>
<?php
        if ($_GET['choix'] == 1) {
            try {
                $mg = new ProduitSoinManager($db);
                $listeProduitsSoins = $mg->getListeProduitSoin();
                $nbreProduitsSoins = count($listeProduitsSoins);
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
                    <option value=1>Produits de soins</option>
                    <option value=2>Nourriture</option>
                    <option value=3>Accesoires</option>
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
                    <p>Produit soin n°<?php print $i+1?></p><br/>
                    <?php print $listeProduitsSoins[$i]->produit; ?>
                </td>
            </tr>
<?php
        }
?>
    </table>
<?php   
    }
?>