<?php

class ClassificationManager extends Classification {

    private $_db;
    private $_ClassiArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeClass() {
        try {
            $query = "select * from classification";
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
}