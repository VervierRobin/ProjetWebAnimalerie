<!--menu Client -->

<ul class="nav nav-pills nav-stacked"> <!--style="margin-top:10px;"--> 

    <?php if (!isset($_GET['page'])) { ?>

        <li role="presentation" class="bottomLine" > <a href="index.php?page=nouvelleCommande">Nouvelle commande</a></li> 
        <li role="presentation" class="bottomLine" > <a href="index.php?page=MesCommandes">Mes commandes</a></li> 
        <li role="presentation" class="bottomLine"> <a href="index.php?page=modification_client">Modifier infos</a></li>
        <li role="presentation" class="bottomLine"> <a href="index.php?page=modification_clientMP">Modifier mot de passe</a></li>
        <li role="presentation" class="bottomLine"> <a href="index.php?page=disconnect">Deconnexion</a></li>
        <?php
    } else {

        ($_GET["page"] == "nouvelleCommande" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element   
        ?>
        <li role="presentation" class="<?php print $active; ?>"> <a href="index.php?page=nouvelleCommande">Nouvelle commande</a></li>
        <?php ($_GET["page"] == "MesCommandes" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element 
        ?>
        <li role="presentation" class="<?php print $active; ?>" > <a href="index.php?page=MesCommandes">Mes commandes</a></li>
        <?php ($_GET["page"] == "modification_client" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element 
        ?>
        <li role="presentation" class="<?php print $active; ?>" > <a href="index.php?page=modification_client">Modifier infos</a></li>
        <?php ($_GET["page"] == "modification_clientMP" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element 
        ?>
        <li role="presentation" class="<?php print $active; ?>" > <a href="index.php?page=modification_clientMP">Modifier mot de passe</a></li>
        <li role="presentation" class="bottomLine"> <a href="index.php?page=disconnect">Deconnexion</a></li>
<?php } ?>
</ul>
