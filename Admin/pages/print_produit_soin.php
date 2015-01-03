<?php
    require '../lib/php/fpdf/fpdf.php';
    require '../lib/php/db_pg.php';
    require '../lib/php/classes/connexion.class.php';
    require '../lib/php/classes/CRUD.class.php';
    require '../lib/php/classes/ProduitSoin.class.php';
    require '../lib/php/classes/ProduitSoinManager.class.php';
    require '../lib/php/classes/Classification.class.php';
    require '../lib/php/classes/ClassificationManager.class.php'; 
     require '../lib/php/classes/Marque.class.php'; 
    $db = Connexion::getInstance($dsn,$user,$pass);


    $mg = new ProduitSoinManager($db);
    $data = $mg->getListeProduitSoinTotal();
   

    $pdf=new FPDF('l','cm','A4');
    $pdf->SetFont('Arial','B',20);
    $pdf->AddPage();
    $pdf->SetXY(1.5,0.8);
    $pdf->cell(26.8,.7,'Animalerie "Au p\'tit bonheur',0,0,'C',0);

    //header premier
    $pdf->SetFillColor(70, 130, 180);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetTextColor(255,255,255); 
    $pdf->SetXY(1.5,1.8); // coordonnées bord supérieur gauche
    $pdf->cell(26.8,.7,'Liste des produit soin',1,0,'C',1);

    $pdf->SetFont('Arial','',12);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetTextColor(0,0,0); 


    $x=1.5; $y=3;
    $pdf->SetXY($x, $y);
    $pdf->SetFont('Arial','B',12);

    //titre tableau
    $pdf->cell(1,.7,'ID',1,'C',1,1);
    $pdf->cell(4,.7,'Marque',1,'C',1,1);
    $pdf->cell(9,.7,'Produit',1,'C',1,1);
    $pdf->cell(4,.7,utf8_decode('Destiné pour'),1,'C',1,1);
    $pdf->cell(3,.7,'Prix',1,'C',1,1);
    $pdf->cell(1.3,.7,'TVA',1,'C',1,1);
    $pdf->cell(3,.7,'Total',1,'C',1,1);
    $pdf->cell(1.5,.7,'Stock',1,'C',1,1);
    $pdf->SetFont('Arial','',11);
    $y=$y+0.7;

    for($i=0;$i<count($data);$i++) {
        $pdf->SetXY($x, $y);
        $pdf->cell(1,.7,$data[$i]->idsoin,1,'C',1,1);
        $pdf->cell(4,.7,$mg->getProduitSoinMarque($data[$i]->idmarque_marque)->nommarque,1,'C',1,1);
        $pdf->cell(9,.7,$data[$i]->produit,1,'C',1,1);
        $dataClass = $mg->getProduitSoinClassification($data[$i]->idclassification_typeanimal);
        $pdf->cell(4,.7,$dataClass->espece,1,'C',1,1);
        $pdf->cell(3,.7,$data[$i]->prixsoin,1,'C',1,1);
        $pdf->cell(1.3,.7,$data[$i]->tva_soin,1,'C',1,1);  
        $prixtot = $data[$i]->prixsoin + (($data[$i]->prixsoin * $data[$i]->tva_soin) / 100);            
        $pdf->cell(3,.7,$prixtot ,1,'C',1,1);  
        $pdf->cell(1.5,.7,$data[$i]->stockproduit,1,'C',1,1);
        $y+=0.7;    
    }

    $pdf->output();
?>