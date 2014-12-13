<?php

class ProduitSoinManager extends Client {
    private $_db;
    private $_produitSoinArray = array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function getListeProduitSoin(){
        try {
            $query="select * from produitsoin";
            $resultset= $this->_db->prepare($query);
            $resultset->execute();            
        }
        catch(PDOException $e) {
            print "Echec de la requ&ecirc;te ".$e->getMessage();
        }
    
        while($data = $resultset->fetch()){
            $_produitSoinArray[] = new ProduitSoin($data);
        }

        return $_produitSoinArray;
 } 
}
