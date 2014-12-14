<?php

class AccesoireManager extends Accesoire {
    private $_db;
    private $_accesoiresArray = array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function getListeProduitSoin(){
        try {
            $query="select * from accesoires";
            $resultset= $this->_db->prepare($query);
            $resultset->execute();            
        }
        catch(PDOException $e) {
            print "Echec de la requ&ecirc;te ".$e->getMessage();
        }
    
        while($data = $resultset->fetch()){
            $_accesoiresArray[] = new Accesoire($data);
        }

        return $_accesoiresArray;
 } 
}
