<?php
	require_once("fpdf/fpdf.php");

	

	class PDF extends FPDF
	{
		// Page header
		function Header()
		{

			$territoire=$_POST['territoire'];
			$congreg=$_POST['congreg'];
			$format=$_POST['format'];
		    // Arial bold 15
		    if($format=="A5"){
		    	$ratio=1;
			    $this->SetFont('Arial','B',12);
			    $this->Cell(60,10,"Congregation : $congreg ",1);
				$this->Cell(40,10,"Territoire : $territoire",1);
				$this->Cell(30,10,"Date : ",1);
			    $this->Ln();
			    $this->Ln();
			}
			else
			{
				$ratio=1.5;
				$this->SetFont('Arial','B',8);
			    $this->Cell(44,7,"Congregation : $congreg ",1);
				$this->Cell(23,7,"Territoire : $territoire",1);
				$this->Cell(21,7,"Date : ",1);
			    $this->Ln();
			    $this->Ln();
			}
			   
			$this->Cell(12/$ratio,7/$ratio,"Num",1);
			$this->Cell(69/$ratio,7/$ratio,"Rue",1);
			$this->Cell(12/$ratio,7/$ratio,"Inter",1);
			$this->Cell(12/$ratio,7/$ratio,"Porte",1);
			$this->Cell(25/$ratio,7/$ratio,"Remarque",1);
			$this->Ln();
		}

		// Page footer
		function Footer()
		{
		    // Position at 1.5 cm from bottom
		    $this->SetY(-15);
		    // Arial italic 8
		    $this->SetFont('Arial','I',8);
		    // Page number
		    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}

	}



	$format=$_POST['format'];

	if($format=="A6"){
		$t_format=array(105,148);
		$pdf = new PDF('P','mm',$t_format);
		$ratio=1.5;
		$pdf->SetFont('Arial','',8);
	}
	else{
		$pdf = new PDF('P','mm',$format);
		$pdf->SetFont('Arial','',10);
		$ratio=1;
	}

	$pdf->AliasNbPages();
	$pdf->AddPage();

	//$pdf->SetMargins(5,5,5,5);


	require_once("login.php");

	$territoire=$_POST['territoire'];
	$congreg=$_POST['congreg'];

	$query = "SELECT `id`, `rue`, `numero`, `apt`, `interphone`, `rmq`, `congregation`, `territoire`, `langue` FROM `adresse` WHERE territoire='$territoire' AND congregation='$congreg' ORDER BY 'langue'";
	$result = $conn->query($query);


	if(!$result) $pdf->Cell(60,10,"ECHEC DE LECTURE : $query $conn->error",0,1,'C');

	$prev_rue="";
	$prev_num="";
	$nb_ligne=0;

	while ($row = $result->fetch_assoc()) {

		$nb_ligne++;


		if($row['rue']==$prev_rue && $row['numero']==$prev_num){
			$rue="";
			$num="";
		}
		else{
			$rue=$row['rue'];
			$num=$row['numero'];
		}

		if($nb_ligne % 20 == 0){
			$pdf->AddPage();
			$rue=$row['rue'];
			$num=$row['numero'];
		}


    	$pdf->Cell(12/$ratio,7/$ratio,utf8_decode($num),1);
    	$pdf->Cell(69/$ratio,7/$ratio,utf8_decode($rue),1);
    	$pdf->Cell(12/$ratio,7/$ratio,utf8_decode($row['interphone']),1);
    	$pdf->Cell(12/$ratio,7/$ratio,utf8_decode($row['apt']),1);
    	$pdf->Cell(25/$ratio,7/$ratio,utf8_decode($row['rmq']),1);
    	if($row['langue']!=""){
    		$x=$pdf->GetX();
    		$y=$pdf->GetY();
    		$pdf->SetLineWidth(0.5);
    		$pdf->SetDrawColor(96,96,96);
    		$pdf->Line($x,$y+3.3/$ratio,10+81/$ratio,$y+3.3/$ratio);
    		
    		$pdf->SetDrawColor(0,0,0);
    		$pdf->SetLineWidth(0.3);
    	}
    	$pdf->Ln();

    	$prev_rue=$row['rue'];
		$prev_num=$row['numero'];
	}




	$pdf->Output("I",$congreg . "_" . $territoire . "_" . $format . ".pdf");

?>