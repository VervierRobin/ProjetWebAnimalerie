<?php

class Login {

    private $_db;
    
    public function __construct($db) {
        $this->_db = $db;
    }
    
    function isAdmin($login,$password) {
        $retour = array();
        try {
            $query = "select verif_conn(:nom_user,:password) as retour";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':nom_user',$_POST['login']);
            $sql->bindValue(':password',md5($_POST['password']));  
            $sql->execute();
            $retour = $sql->fetchColumn(0);                     
        } 
        catch(PDOException $e) {    
            print "Echec de la requ&ecirc;te.". $e;
        }
        return $retour;
    }
     function addAdmin($login,$password,$password2) {
        $retour = array();
        try {
            if($password != $password2){
                throw new Exception("Les mots de passes ne sont pas identique");
            }
            $query = "select addAdmin(:log,:password) as retour";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':log',$_POST['login']);
            $sql->bindValue(':password',md5($_POST['password']));  
            $sql->execute();
            $retour = $sql->fetchColumn(0);                     
        } 
        catch(PDOException $e) {    
            print "Echec de la requ&ecirc;te.". $e;
        }
        return $retour;
    }
    
   
    function ModifAdmin($login,$password,$password2) {
        $retour = array();
        try {
            if($password != $password2){
                throw new Exception("Les mots de passes ne sont pas identique");
            }
            $query = "select addAdmin(:log,:password) as retour";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':log',$_POST['login']);
            $sql->bindValue(':password',md5($_POST['password']));  
            $sql->execute();
            $retour = $sql->fetchColumn(0);                     
        } 
        catch(PDOException $e) {    
            print "Echec de la requ&ecirc;te.". $e;
        }
        return $retour;
    }
    
    
    
}
