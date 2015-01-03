<?php

    require '../lib/php/fpdf/fpdf.php';
    require '../lib/php/db_pg.php';
    require '../lib/php/classes/connexion.class.php';
    require '../lib/php/classes/CRUD.class.php';
    require '../lib/php/classes/Nourriture.class.php';
    require '../lib/php/classes/NourritureManager.class.php';
        require '../lib/php/classes/Classification.class.php';
    require '../lib/php/classes/ClassificationManager.class.php'; 
     require '../lib/php/classes/Marque.class.php'; 

    $db = Connexion::getInstance($dsn,$user,$pass);

    $mg = new NourritureManager($db);
    $data = $mg->getListeNourritureTout();

    $pdf=new FPDF('l','cm','A4');
    $pdf->SetFont('Arial','B',20);
    $pdf->AddPage();
    $pdf->SetXY(1.5,0.8);
    $pdf->cell(26.8,.7,'Animalerie "Au p\'tit bonheur',0,0,'C',0);


    //header premier
    $pdf->SetFillColor(204, 102, 0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetTextColor(255,255,255); 
    $pdf->SetXY(1.5,1.8); // coordonnées bord supérieur gauche
    $pdf->cell(26.8,.7,'Liste des nourritures',1,0,'C',1);

    $pdf->SetFont('Arial','',12);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetTextColor(0,0,0); 


    $x=1.5; $y=3;
    $pdf->SetXY($x, $y);
    $pdf->SetFont('Arial','B',12);

    //titre tableau
    $pdf->cell(1,.7,'ID',1,'C',1,1);
    $pdf->cell(5,.7,'Marque',1,'C',1,1);
    $pdf->cell(9,.7,'Intitule',1,'C',1,1);
    $pdf->cell(3,.7,'Pour',1,'C',1,1);
    $pdf->cell(3,.7,'Prix',1,'C',1,1);
    $pdf->cell(1.3,.7,'TVA',1,'C',1,1);
    $pdf->cell(3,.7,'Total',1,'C',1,1);
    $pdf->cell(1.5,.7,'Stock',1,'C',1,1);
    
    $pdf->SetFont('Arial','',11);
    $y=$y+0.7;

    for($i=0;$i<count($data);$i++) {
        $pdf->SetXY($x, $y);
        $pdf->cell(1,.7,$data[$i]->idnourriture,1,'C',1,1);
        $pdf->cell(5,.7,$mg->getNourritureMarque($data[$i]->idmarque_marque)->nommarque,1,'C',1,1);
        $pdf->cell(9,.7,$data[$i]->intitule,1,'C',1,1);
        $dataClass = $mg->getNourritureClassification($data[$i]->idclassification_typeanimal);
        $pdf->cell(3,.7,$dataClass->espece,1,'C',1,1);
        $pdf->cell(3,.7,$data[$i]->prixnourriture,1,'C',1,1); 
        $pdf->cell(1.3,.7,$data[$i]->tva_nourriture,1,'C',1,1); 
        $prixtot = $data[$i]->prixnourriture + (($data[$i]->prixnourriture * $data[$i]->tva_nourriture) / 100);            
        $pdf->cell(3,.7,$prixtot ,1,'C',1,1);  
        $pdf->cell(1.5,.7,$data[$i]->stocknourriture ,1,'C',1,1);     

        $y+=0.7;    
    }

    $pdf->output();
?>