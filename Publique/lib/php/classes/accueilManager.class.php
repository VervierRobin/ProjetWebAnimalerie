<?php

class AccueilManager extends Accueil {
    private $_db;
    private $_accueilArray = array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function getTexteAccueil(){
        try {
            $query="select texte_accueil from animalerie";
            $resultset= $this->_db->prepare($query);
            $resultset->execute();            
        }catch(PDOException $e) {
            print "Echec de la requ&ecirc;te ".$e->getMessage();
        }
    
        while($data = $resultset->fetch()){
            $_accueilArray[] = new Accueil($data);
        }
        
        return $_accueilArray;
 } 
}
