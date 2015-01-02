<?php
    require '../lib/php/fpdf/fpdf.php';
    require '../lib/php/db_pg.php';
    require '../lib/php/classes/connexion.class.php';
    require '../lib/php/classes/CRUD.class.php';
    require '../lib/php/classes/Accesoire.class.php';
    require '../lib/php/classes/AccesoireManager.class.php';

    $db = Connexion::getInstance($dsn,$user,$pass);

    $mg = new AccesoireManager($db);
    $data = $mg->getListeAccesoireTout();

    $pdf=new FPDF('l','cm','A4');
    $pdf->SetFont('Arial','B',20);
    $pdf->AddPage();
    $pdf->SetXY(1.5,0.8);
    $pdf->cell(26.8,.7,'Animalerie "Au petit bonheur"',0,0,'C',0);


    //header premier
    $pdf->SetFillColor(123,220,72);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetTextColor(255,255,255); 
    $pdf->SetXY(1.5,1.8); // coordonnées bord supérieur gauche
    $pdf->cell(26.8,.7,'Liste des accesoires',1,0,'C',1);

    $pdf->SetFont('Arial','',12);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetTextColor(0,0,0); 


    $x=1.5; $y=3;
    $pdf->SetXY($x, $y);
    $pdf->SetFont('Arial','B',12);

    //titre tableau
    $pdf->cell(4,.7,'ID',1,'C',1,1);
    $pdf->cell(5,.7,'Destine pour',1,'C',1,1);
    $pdf->cell(3,.7,'Marque',1,'C',1,1);
    $pdf->cell(8,.7,'Description',1,'C',1,1);
    $pdf->cell(3,.7,'Prix',1,'C',1,1);
    $pdf->cell(1.5,.7,'Stock',1,'C',1,1);
    $pdf->SetFont('Arial','',11);
    $y=$y+0.7;

    for($i=0;$i<count($data);$i++) {
        $pdf->SetXY($x, $y);
        $pdf->cell(4,.7,$data[$i]->idaccesoire,1,'C',1,1);
        $pdf->cell(5,.7,$data[$i]->idclassification_typeanimal,1,'C',1,1);
        $pdf->cell(3,.7,$data[$i]->idmarque_marque,1,'C',1,1);
        $pdf->cell(8,.7,$data[$i]->descriptionaccesoire,1,'C',1,1);  
        $pdf->cell(3,.7,$data[$i]->prixaccesoire,1,'C',1,1); 
        $pdf->cell(1.5,.7,$data[$i]->stockaccesoire,1,'C',1,1);     

        $y+=0.7;    
    }

    $pdf->output();
?>