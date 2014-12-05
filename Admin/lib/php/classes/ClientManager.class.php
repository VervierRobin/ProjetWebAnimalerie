<?php

class ClientManager extends Client {
    private $_db;
    private $_clientArray = array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function getListeSelection($choix){
        try {
            $query="select * from client where idclient =:idclient";
            $resultset= $this->_db->prepare($query);
            $resultset->bindValue(1,$choix,PDO::PARAM_INT);
            $resultset->execute();            
        }catch(PDOException $e) {
            print "Echec de la requ&ecirc;te ".$e->getMessage();
        }
    
        while($data = $resultset->fetch()){
            $_clientArray[] = new Client($data);
        }

        return $_clientArray;
 } 
}
