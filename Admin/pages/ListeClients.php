<?php
    $mgClient = new ClientManager($db);
    $listeClients = $mgClient->getClientAll();
    $nbreClients = count($listeClients);
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Liste des clients</h3>
    </div>
    <div class="panel-body">
<table border="2">
    <th width="50" ><div class="centrer"> ID </div></th>
    <th width="100"><div class="centrer">Client </div></th>
    <th width="100"><div class="centrer">Téléphone </div></th>
    <th width="200"><div class="centrer">Adresse </div></th>
    
    <th  width="250"><div class="centrer">Adresse mail </div></th>
<?php 
        for ( $i = 0; $i < $nbreClients; $i++ ) { 
?>
        <tr>
            <td align="center"><?php print $listeClients[$i]->idclient ?></td>
            <td align="center">
                <?php print $listeClients[$i]->nom ?>    <br />
                <?php print $listeClients[$i]->prenom ?> <br />
                <?php print $listeClients[$i]->pseudo ?>
            </td>
            <td align="center"><?php print $listeClients[$i]->num ?></td>
            <?php $pays=$mgClient->getPays($listeClients[$i]->idpays_pays)?>
            <td align="center">
                <?php print $listeClients[$i]->rue ?><br />
                <?php print $listeClients[$i]->cp ?> 
                <?php print $listeClients[$i]->ville ?> <br />
                (<?php print $pays->nompays ?>)
            </td>
            
            <td align="center"><?php print $listeClients[$i]->mail ?></td>
        </tr>
<?php 
        }    
?>
</table>
  </div>
      </div>