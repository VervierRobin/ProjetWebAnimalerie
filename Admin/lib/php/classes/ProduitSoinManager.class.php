<?php

class ProduitSoinManager extends ProduitSoin {
    private $_db;
    private $_produitSoinArray = array();
    private $_animal;
    
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
    
    public function getProduitSoinClassification($idClassification) {
        try
        {   $query="select * from classification where idclassification = :classif";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(":classif",$idClassification);
            $resultset->execute();
        }
        catch (PDOException $e) {
            print "Echec de la requ&ecirc;te ".$e->getMessage();
        }
        $data = $resultset->fetch();
        $classification = new Classification($data);
        return $classification;
    }
}
