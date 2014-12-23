<!--menu publique -->
<ul class="nav nav-pills nav-stacked">
    <?php if (!isset($_GET['page'])) { ?>
        <li role="presentation" class="bottomLine"><a href="index.php?page=accueil">Accueil</a></li>
        <li role="presentation" class="bottomLine"> <a href="index.php?page=nosAnimaux">Nos animaux</a></li>
        <li role="presentation" class="bottomLine"> <a href="index.php?page=nosProduits">Nos produits</a></li>
        <li role="presentation" class="bottomLine"> <a href="../Client/index.php">Espace client</a></li>
        <li role="presentation" class="bottomLine"> <a href="../Admin/index.php">Espace administrateur</a></li>

        <?php } else {
        ?>
        
        <?php ($_GET["page"] == "accueil" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element 
        ?>
        <li role="presentation" class="<?php print $active; ?>"><a href="index.php?page=accueil">Accueil</a></li>
        
            <?php ($_GET["page"] == "nosAnimaux" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element 
        ?>
        <li role="presentation" class="<?php print $active; ?>"> <a href="index.php?page=nosAnimaux">Nos animaux</a></li>
        <?php ($_GET["page"] == "nosProduits" ? $active = "bottomLine active" : $active = "bottomLine");  //ajouter le active dans la class de l'element 
        ?>
        <li role="presentation" class="<?php print $active; ?>"> <a href="index.php?page=nosProduits">Nos produits</a></li>
        <li role="presentation" class="bottomLine"> <a href="../Client/index.php">Espace client</a></li>
        <li role="presentation" class="bottomLine"> <a href="../Admin/index.php">Espace administrateur</a></li>
        
     <?php  } ?>
</ul>
         