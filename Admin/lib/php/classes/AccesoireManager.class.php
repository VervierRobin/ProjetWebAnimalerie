<?php

class AccesoireManager extends Accesoire implements CRUD {
    private $_db;
    private $_accesoiresArray = array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function getListeAccesoire($nPage, $maxPage){
        try {
            $nPage = ($nPage-1)*$maxPage;
            $query="select * from accesoires limit :maxPage offset :nPage;";
            $resultset= $this->_db->prepare($query);
            $resultset->bindValue(":maxPage",$maxPage);
            $resultset->bindValue(":nPage",$nPage);
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
    
    public function getListeAccesoireTout(){
        try 
        {   $query="select * from accesoires";
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
    
    public function countAccesoire(){
        $cpt = 0;
        try 
        {   $query="select * from accesoires;";
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
