<?php
session_start();
header('Content-Type: application/json');
require './liste_include_ajax.php';
require '../classes/connexion.class.php';
require '../classes/login.class.php';

$db = Connexion::getInstance($dsn,$user,$pass);

try{
    print "ok";
    $mg = new Login($db);
    //login et password sont dans data_form
    $retour = $mg->isAdmin($_POST['login'],$_POST['password']);
    if($retour==1) {
        $_SESSION['admin']=1;
        $_SESSION['page']="accueil";
    }
    //ira initialiser la variable data_du_php
    print json_encode(array('retour'=> $retour));
}
 catch (PDOException $e){
     
 }
?>