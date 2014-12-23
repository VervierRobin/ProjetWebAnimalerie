<?php
   $mgCli = new ClientManager($db);
   $Cli = $mgCli->getClient($_SESSION['client']);
  
 print " <h1 class='txtBlue'>Bienvenue ".$Cli[0]->prenom ." ".$Cli[0]->nom."</h1>";
?> 
 <img src="../Admin/images/accCli.jpg" alt="icone Client" />