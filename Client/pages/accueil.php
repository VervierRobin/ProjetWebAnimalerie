<?php
   $mgCli = new ClientManager($db);
   $Cli = $mgCli->getClient($_SESSION['client']);
  
 print " <h1>Bienvenue ".$Cli[0]->prenom ." ".$Cli[0]->nom."</h1>";