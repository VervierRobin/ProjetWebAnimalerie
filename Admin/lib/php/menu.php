<!--menu Admin -->
<ul class="nav nav-pills nav-stacked" style="margin-top:20px;">
    <li role="presentation" class="bottomLine"> <a href="index.php?page=nvAdmin">Nouveau admin</a></li> 
    <li role="presentation" class="bottomLine"> <a href="index.php?page=listeCommandes">Liste des commandes</a></li>
    <li role="presentation" class="bottomLine"> <a href="index.php?page=ListeClients">Liste des clients</a></li>
    <li role="presentation" class="bottomLine"> <a href="index.php?page=nouveauPays">Ajouter pays</a></li>
  
    <h3>Animaux</h3>
    <li role="presentation" class="bottomLine"> <a href="index.php?page=listAnimaux">Liste</a></li>
    <li role="presentation" class="bottomLine"> <a href="index.php?page=ajouterEspece">Ajouter espèce</a></li>
    <li role="presentation" class="bottomLine"> <a href="index.php?page=ajouterAn">Ajouter animal</a></li>
    <?php 
        /*
        if($_GET["page"] == "ajouterAn"){//ajouter le active dans la class de l'element <li>
            echo '<li role="presentation" class="bottomLine active"> <a href="index.php?page=ajouterAn">Ajouter animal</a></li>';
        }else{
            echo '<li role="presentation" class="bottomLine"> <a href="index.php?page=ajouterAn">Ajouter animal</a></li>';
        }
        */
    ?>
    <li role="presentation" class="bottomLine"> <a href="index.php?page=modifAn">Modifier</a></li>
    <li role="presentation" class="bottomLine"> <a href="index.php?page=suppAn">Supprimer</a></li>
    
    <h3>Produits</h3>
    <li role="presentation" class="bottomLine"> <a href="index.php?page=nosProduits">Liste</a></li>
    <li role="presentation" class="bottomLine"> <a href="index.php?page=ajouterPro">Ajouter</a></li> 
    <li role="presentation" class="bottomLine"> <a href="index.php?page=modifPro">Modifier</a></li> 
    <li role="presentation" class="bottomLine"> <a href="index.php?page=supPro">Supprimer</a></li>
</ul>
