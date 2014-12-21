<?php

class ClassificationManager extends Classification {

    private $_db;
    private $_ClassiArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeClass() {
        try {
            $query = "select * from classification";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } 
        catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_ClassiArray[] = new Classification($data);
        }
        return $_ClassiArray;
    }
    
    public function addClassification ($classe, $ordre, $famille, $genre, $espece) {
        try 
        {   $query = "select add_classification(:classe,:ordre,:famille,:genre,:espece) as retour";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':classe', $classe);
            $sql->bindValue(':ordre',$ordre);
            $sql->bindValue(':famille', $famille);
            $sql->bindValue(':genre', $genre);
            $sql->bindValue(':espece', $espece);
            $sql->execute();
            $retour = $sql->fetchColumn(0);                     
        } 
        catch(PDOException $e) {    
            print "Echec de la requ&ecirc;te.". $e;
        }
        return $retour;  
    }
}