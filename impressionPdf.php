<?php
	require_once("fpdf/fpdf.php");
	require_once("login.php");

	$id_territoire=$_POST['id_territoire'];
	$id_congreg=$_POST['id_congreg'];
	
	$query = "SELECT nom FROM congregation WHERE id=$id_congreg";
	//echo $query;
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	$congreg = $row['nom'];
	$_POST['congreg']=$congreg;
	
	$query = "SELECT numero,cite FROM territoire WHERE id=$id_territoire";
	//echo $query;
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	$territoire = $row['numero'];
	$cite = $row['cite'];
	$_POST['territoire']=$territoire;
	$_POST['cite']=$cite;

	class PDF extends FPDF
	{
		// Page header
		function Header()
		{

			$territoire=$_POST['territoire'];
			$congreg=$_POST['congreg'];
			$cite=$_POST['cite'];
			$format=$_POST['format'];
		    // Arial bold 15
		    if($format=="A5")
		    	$ratio=1;
		    else
		    	$ratio=1.5;
		    	
		    $line_height = 7/$ratio;
		    
			$this->SetFont('Arial','B',10/$ratio);
			if($cite)
			    $this->Cell(130/$ratio,$line_height,"FICHE D'ABSENTS",1,1,'C');
			else
			    $this->Cell(130/$ratio,$line_height,"A NE PAS VISITER",1,1,'C');
			$this->Cell(60/$ratio,$line_height,"Congregation : $congreg ",1);
			$this->Cell(40/$ratio,$line_height,"Territoire : $territoire",1);
			$this->Cell(30/$ratio,$line_height,"Date : ",1,1);
			$this->Ln();
			
			/*}
			else
			{
				$ratio=1.5;
				$this->SetFont('Arial','B',8);
			    $this->Cell(44,7,"Congregation : $congreg ",1);
				$this->Cell(23,7,"Territoire : $territoire",1);
				$this->Cell(21,7,"Date : ",1);
			    $this->Ln();
			    $this->Ln();
			}*/
			   
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




	$query = "SELECT `id`, `rue`, `numero`, `apt`, `interphone`, `rmq`,  `id_groupe` FROM `adresse` WHERE id_territoire='$id_territoire' AND id_congreg='$id_congreg' ORDER BY 'rue', 'numero', 'interphone', 'apt'";
	//echo $query;
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
		else
		{
			if($nb_ligne>1)
			{
				$nb_ligne=1;
				$pdf->AddPage();
			}
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
    	if($row['id_groupe']!="" && $cite){
    		$x=$pdf->GetX();
    		$y=$pdf->GetY();
    		$pdf->SetLineWidth(0.5);
    		$pdf->SetDrawColor(96,96,96);
    		$pdf->Line($x,$y+3.3/$ratio,10+81/$ratio,$y+3.3/$ratio);
    		
    		$pdf->SetDrawColor(0,0,0);
    		$pdf->SetLineWidth(0.3);
    	}
    	$pdf->Cell(25/$ratio,7/$ratio,utf8_decode($row['rmq']),1);
    	
    	$pdf->Ln();

    	$prev_rue=$row['rue'];
		$prev_num=$row['numero'];
	}




	$pdf->Output("I",$congreg . "_" . $id_territoire . "_" . $format . ".pdf");

?>