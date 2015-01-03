<?php
    $mgClient = new ClientManager($db);
    $listeClients = $mgClient->getClientAll();
    $nbreClients = count($listeClients);
?>

<h2>Liste des clients</h2>

<table border="2">
    <th>ID Client</th>
    <th>Pays</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Numero</th>
    
    <th>Rue</th>
    <th>Code Postal</th>
    <th>Ville</th>
    <th>Pseudo</th>
    <th>Adresse mail</th>
<?php 
        for ( $i = 0; $i < $nbreClients; $i++ ) { 
?>
        <tr>
            <td><?php print $listeClients[$i]->idclient ?></td>
            <td><?php print $listeClients[$i]->idpays_pays ?></td>
            <td><?php print $listeClients[$i]->nom ?></td>
            <td><?php print $listeClients[$i]->prenom ?></td>
            <td><?php print $listeClients[$i]->num ?></td>
            <td><?php print $listeClients[$i]->rue ?></td>
            <td><?php print $listeClients[$i]->cp ?></td>
            <td><?php print $listeClients[$i]->ville ?></td>
            <td><?php print $listeClients[$i]->pseudo ?></td>
            <td><?php print $listeClients[$i]->mail ?></td>
        </tr>
<?php 
        }    
?>
</table>
