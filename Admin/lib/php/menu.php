<!--menu Admin -->

<ul class="nav nav-pills nav-stacked"> <!--style="margin-top:10px;"--> 

    <?php if (!isset($_GET['page'])) { ?>
        <h3>Administration</h3>
        <li role="presentation" class="bottomLine" > <a href="index.php?page=nvAdmin">Nouveau webmaster</a></li> 
        <li role="presentation" class="bottomLine"> <a href="index.php?page=listeCommandes">Liste des commandes</a></li>
        <li role="presentation" class="bottomLine"> <a href="index.php?page=ListeClients">Liste des clients</a></li>
        <li role="presentation" class="bottomLine"> <a href="index.php?page=nouveauPays">Ajouter pays</a></li>

        <h3>Animaux</h3>
        <li role="presentation" class="bottomLine"> <a href="index.php?page=listAnimaux">Liste</a></li>
        <li role="presentation" class="bottomLine"> <a href="index.php?page=ajouterEspece">Ajouter espèce</a></li>
        <li role="presentation" class="bottomLine"> <a href="index.php?page=ajouterAn">Ajouter animal</a></li>
        <li role="presentation" class="bottomLine"> <a href="index.php?page=modifAn">Modifier</a></li>
        <li role="presentation" class="bottomLine"> <a href="index.php?page=suppAn">Supprimer</a></li>

        <h3>Produits</h3>
        <li role="presentation" class="bottomLine"> <a href="index.php?page=nosProduits">Liste</a></li>
        <li role="presentation" class="bottomLine"> <a href="index.php?page=ajouterPro">Ajouter</a></li> 
        <li role="presentation" class="bottomLine"> <a href="index.php?page=modifPro">Modifier</a></li> 
        <li role="presentation" class="bottomLine"> <a href="index.php?page=supPro">Supprimer</a></li>

        <?php
    } else {?>
        <h3>Administration</h3> 
            <?php  ($_GET["page"] == "nvAdmin" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element 
        ?>
        <li role="presentation" class="<?php print $active; ?>" > <a href="index.php?page=nvAdmin">Nouveau admin</a></li> 
        <?php ($_GET["page"] == "listeCommandes" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element   ?>
        <li role="presentation" class="<?php print $active; ?>"> <a href="index.php?page=listeCommandes">Liste des commandes</a></li>
        <?php ($_GET["page"] == "ListeClients" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element   ?>
        <li role="presentation" class="<?php print $active; ?>"> <a href="index.php?page=ListeClients">Liste des clients</a></li>
        <?php ($_GET["page"] == "nouveauPays" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element   ?>
        <li role="presentation" class="<?php print $active; ?>"> <a href="index.php?page=nouveauPays">Ajouter pays</a></li>

        <h3>Animaux</h3>
        <?php ($_GET["page"] == "listAnimaux" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element   ?>
        <li role="presentation" class="<?php print $active; ?>"> <a href="index.php?page=listAnimaux">Liste</a></li>
        <?php ($_GET["page"] == "ajouterEspece" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element   ?>
        <li role="presentation" class="<?php print $active; ?>"> <a href="index.php?page=ajouterEspece">Ajouter espèce</a></li>
        <?php ($_GET["page"] == "ajouterAn" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element   ?>
        <li role="presentation" class="<?php print $active; ?>"> <a href="index.php?page=ajouterAn">Ajouter animal</a></li>
        <?php ($_GET["page"] == "modifAn" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element   ?>
        <li role="presentation" class="<?php print $active; ?>"> <a href="index.php?page=modifAn">Modifier</a></li>
        <?php ($_GET["page"] == "suppAn" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element   ?>
        <li role="presentation" class="<?php print $active; ?>"> <a href="index.php?page=suppAn">Supprimer</a></li>

        <h3>Produits</h3>
        <?php ($_GET["page"] == "nosProduits" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element   ?>
        <li role="presentation" class="<?php print $active; ?>"> <a href="index.php?page=nosProduits">Liste</a></li>
        <?php ($_GET["page"] == "ajouterPro" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element   ?>
        <li role="presentation" class="<?php print $active; ?>"> <a href="index.php?page=ajouterPro">Ajouter</a></li> 
        <?php ($_GET["page"] == "modifPro" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element   ?>
        <li role="presentation" class="<?php print $active; ?>"> <a href="index.php?page=modifPro">Modifier</a></li> 
        <?php ($_GET["page"] == "supPro" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element   ?>
        <li role="presentation" class="<?php print $active; ?>"> <a href="index.php?page=supPro">Supprimer</a></li>
    <?php } ?>
</ul>
