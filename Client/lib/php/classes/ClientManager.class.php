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
    
    function isClient($login,$password) {
        $retour = array();
        try {
            $query = "select verif_client(:nom_user,:password) as retour";
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
    
    public function addClient($nom,$prenom,$pays,$numeroTel,$rue,$cp,$ville,$pseudo,$mdp,$mail) {
        try 
        {   $query = "select add_client(:nom,:prenom,:pays,:numeroTel,:rue,:cp,:ville,:pseudo,:mdp,:mail) as retour";
            $sql = $this->_db->prepare($query);
            $sql->bindValue(':nom', $nom);
            $sql->bindValue(':prenom',$prenom);
            $sql->bindValue(':pays', $pays);
            $sql->bindValue(':numeroTel', $numeroTel);
            $sql->bindValue(':rue', $rue);
            $sql->bindValue(':cp', $cp);
            $sql->bindValue(':ville', $ville);
            $sql->bindValue(':pseudo', $pseudo);
            $sql->bindValue(':mdp', $mdp);
            $sql->bindValue(':mail', $mail);
            $sql->execute();
            $retour = $sql->fetchColumn(0);                     
        } 
        catch(PDOException $e) {    
            print "Echec de la requ&ecirc;te.". $e;
        }
        return $retour;
    }
    
}
