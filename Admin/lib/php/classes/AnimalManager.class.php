<?php

class AnimalManager extends Animal {

    private $_db;
    private $_AnimalArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeSelection($choix) {
        $cpt = 0;
        if ($choix != -1) {
            try {
                $query = "select * from vue_animal where idclassification_classification =:classification ";
                $resultset = $this->_db->prepare($query);
                $resultset->bindValue(1, $choix, PDO::PARAM_INT);
                $resultset->execute();
            } catch (PDOException $e) {
                print "Echec de la requ&ecirc;te " . $e->getMessage();
            }
            while ($data = $resultset->fetch()) {
                $cpt = $cpt + 1;
                $_AnimalArray[] = new Animal($data);
            }
            if ($cpt > 0) {
                return $_AnimalArray;
            } else {
                print "Aucun animal de cette catégorie n'est en vente pour le moment";
            }
        }
    }

    public function getListeAnimal() {
        try {
            $query = "select * from vue_animal order by espece";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }
        while ($data = $resultset->fetch()) {
            $_AnimalArray[] = new Animal($data);
        }

        return $_AnimalArray;
    }

    public function addAnimal($choixEsp, $race, $num, $couleur, $taille, $poids, $choixSex, $px, $tva, $photo, $descPhoto, $stock, $pays) {
        try 
        {   if($choixEsp == -1 && $race =='' && $num == '' && $taille == '' && $poids =='' && $px == '' && $tva =='' && $stock =='' && $pays == -1){
                $retour = 0;
            }
            else {
                $query = "select add_animal(:choixEsp,:race,:num,:couleur, :taille,:poids,:choixSex,:px, :tva,:photo, :descPhoto, :stock, :pays) as retour";
                $sql = $this->_db->prepare($query);
                $sql->bindValue(':choixEsp', $choixEsp);
                $sql->bindValue(':race', $race);
                $sql->bindValue(':num', $num);
                $sql->bindValue(':couleur', $couleur);
                $sql->bindValue(':taille', $taille);
                $sql->bindValue(':poids', $poids);
                $sql->bindValue(':choixSex', $choixSex);
                $sql->bindValue(':px', $px);
                $sql->bindValue(':tva', $tva);
                $sql->bindValue(':photo', $photo);
                $sql->bindValue(':descPhoto', $descPhoto);
                $sql->bindValue(':stock', $stock);
                $sql->bindValue(':pays', $pays);
                $sql->execute();
                $retour = $sql->fetchColumn(0);
            }
        } 
        catch(PDOException $e) {    
            print "Echec de la requ&ecirc;te.". $e;
        }
        return $retour;
    }
}
