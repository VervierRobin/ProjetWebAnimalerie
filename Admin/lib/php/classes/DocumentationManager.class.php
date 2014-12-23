<?php

class DocumentationManager extends Documentation implements CRUD {
    private $_db;
    private $_documentationArray = array();
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    public function getListeDocumentation() {
        try {
            $query="select * from doc";
            $resultset= $this->_db->prepare($query);
            $resultset->execute();            
        }
        catch(PDOException $e) {
            print "Echec de la requ&ecirc;te ".$e->getMessage();
        }
    
        while($data = $resultset->fetch()){
            $_documentationArray[] = new Documentation($data);
        }
        return $_documentationArray;
    }

   

}
