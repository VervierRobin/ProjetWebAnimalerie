<?php

class PaysManager extends Pays {

    private $_db;
    private $_ClassiArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListePays() {
        try {
            $query = "select * from pays";
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
    
    public function addPays($nomPays,$continent) {
       if($nomPays == "" || $continent == "-1")
           return "Champ vide";
        try 
        {   $query = "select add_pays(:nomPays,:continent) as retour";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':nomPays', $nomPays);
            $sql->bindValue(':continent',$continent);
            $sql->execute();
            $retour = $sql->fetchColumn(0);                     
        } 
        catch(PDOException $e) {    
            print "Echec de la requ&ecirc;te.". $e;
        }
        return $retour;
    }
}