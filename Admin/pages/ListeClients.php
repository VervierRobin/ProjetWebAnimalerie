<?php
    $mgClient = new ClientManager($db);
    $listeClients = $mgClient->getListeClients();
    $nbreClients = count($listeClients);
?>

<h2>Liste des clients</h2>
<table>
<?php 
        for ( $i = 0; $i < $nbreClients; $i++ ) { 
?>
            <td><?php $listeClients[$i]->idclient ?></td>
            <td><?php $listeClients[$i]->idpays_pays ?></td>
            <td><?php $listeClients[$i]->nom ?></td>
            <td><?php $listeClients[$i]->prenom ?></td>
            <td><?php $listeClients[$i]->num ?></td>
            <td><?php $listeClients[$i]->rue ?></td>
            <td><?php $listeClients[$i]->cp ?></td>
            <td><?php $listeClients[$i]->ville ?></td>
            <td><?php $listeClients[$i]->pseudo ?></td>
            <td><?php $listeClients[$i]->mail ?></td>
<?php 
        }    
?>
</table>