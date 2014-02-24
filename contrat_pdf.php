<?php
session_start();
if(isset($_SESSION['connected']) && $_SESSION['connected']=='TRUE' && isset($_SESSION['admin']) && $_SESSION['admin']=='FALSE')
{
	require('include/lib/fpdf/fpdf.php');
	require('include/lib/functions.php');

	class PDF extends FPDF
	{


	function Header()
	{
	    // En-tête
	    global $titre;
	    global $pseudo;
	    global $exp;
	    global $pos;
	    global $tcode;
	    global $school;
	    $this->Image('ressources/enseaventure.jpg',175,20,25,25);
	    $this->Image('ressources/xch.jpg',10,20,40,20);

	    $this->SetFont('Arial','B',27);
	    $w = $this->GetStringWidth($titre)+6;
	    $this->SetX((210-$w)/2);
	    $this->SetFillColor(250,250,250);
	    $this->SetLineWidth(1);
	    $this->Cell($w,12,$titre,1,1,'C',true);
	    $this->Ln(10);
	    $this->Image('ressources/1/'.$tcode.'.jpg',10,43,85,100);


	    $this->SetFont('Arial','B',12);
	    $this->setX(125);
	    $this->Cell(125,70,'Pseudo : '.$pseudo);
	    $this->Ln(10);
	    $this->setX(125);
	    $this->Cell(125,70,'Ecole : '.$school);
	    $this->Ln(10);
	    $this->setX(125);
	    $this->Cell(125,70,'Date d\'expiration : '.$exp);
	    $this->Ln(10);
	    $this->setX(125);
	    $this->Cell(125,70,'Positions : '.$pos);
	}

	function Footer()
	{
		global $tcode;
	    // Pied de page
	    $this->SetY(-30);
	    $this->SetFont('Arial','I',8);
	    $this->SetTextColor(220,50,50);
	    $this->Cell(0,10,'Ce document est strictement confidentiel',0,0,'C');
	    $this->Image('ressources/map.jpg',10,145,190);
	}


	}

	$cno=$_GET['cno'];
	$bdd=db_init();
	$req=$bdd->query("SELECT * FROM XCH14_contracts WHERE `contract_no`='".$cno."'");
	$data=$req->fetch();
	
	$exp=$data['exp_date'];
	$pseudo=$_GET['pseudo'];
	$tcode= substr($data['target_no'], 3,3);
	$cno=$data['contract_no'];
	$pos=$data['position'];
	$school=$data['school'];





	$pdf = new PDF();
	$pdf->SetTopMargin(20);
	$titre = 'Contrat : '.$cno;
	//'.$_POST['imgno'].'
		    $pdf->SetFont('Arial','B',16);
			$pdf->Cell(70,10,'Titre');

	$pdf->SetTitle($titre);
	$pdf->SetAuthor('XCH2014');
	$pdf->Output();
}
else{
	echo 'Access Denied !';
	echo '<meta http-equiv="refresh" content="0; url=.">'; 
}
?>