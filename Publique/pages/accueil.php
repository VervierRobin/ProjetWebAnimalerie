<h2>Bienvenue à l'animalerie Au p'tit bonheur</h2>
<?php
    //accueil.php est contenu dans l'index, qui contient une instance de db
    $accueilManager = new AccueilManager($db);
    $texte = $accueilManager->getTexteAccueil();
?>

<img src="../Admin/images/interieur.jpg" alt="Interieur" />
&nbsp;
<section id="texte_accueil" class="up txtBlue">
    <?php print $texte[0]->texte_accueil;?>
</section>
