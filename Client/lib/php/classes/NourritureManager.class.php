<?php

class NourritureManager extends Nourriture {
    private $_db;
    private $_nourritureArray = array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function getListeNourriture(){
        try {
            $query="select * from nourriture";
            $resultset= $this->_db->prepare($query);
            $resultset->execute();            
        }
        catch(PDOException $e) {
            print "Echec de la requ&ecirc;te ".$e->getMessage();
        }
    
        while($data = $resultset->fetch()){
            $_nourritureArray[] = new Nourriture($data);
        }

        return $_nourritureArray;
 } 
}
