<?php

class AnimalManager extends Animal {

    private $_db;
    private $_AnimalArray = array();

    public function __construct($db) {
        $this->_db = $db;
    }

    public function getListeSelection($choix) {
        try {
            $query = "select * from animal where idanimal =:idanimal ";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(1, $choix, PDO::PARAM_INT);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_AnimalArray[] = new Animal($data);
        }

        return $_AnimalArray;
    }

    public function getListeAnimal() {
        try {
            $query = "select * from animal";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
        } catch (PDOException $e) {
            print "Echec de la requ&ecirc;te " . $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            $_AnimalArray[] = new Animal($data);
        }

        return $_AnimalArray;
    }

}
