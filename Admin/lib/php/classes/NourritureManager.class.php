<?php

class NourritureManager extends Nourriture implements CRUD {
    private $_db;
    private $_nourritureArray = array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function getListeNourriture($nPage, $maxPage){
        try {
            $nPage = ($nPage-1) * $maxPage;
            $query="select * from nourriture limit :maxPage offset :nPage;";
            $resultset= $this->_db->prepare($query);
            $resultset->bindValue(":maxPage",$maxPage);
            $resultset->bindValue(":nPage",$nPage);
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
 
 public function countNourriture() {
        $cpt = 0;
        try 
        {   $query="select * from nourriture;";
            $resultset= $this->_db->prepare($query);
            $resultset->execute();            
        }
        catch(PDOException $e) {
            print "Echec de la requ&ecirc;te ".$e->getMessage();
        }
        while($data = $resultset->fetch())  {
            $cpt++;
        }
        return $cpt;
    }

   

}
