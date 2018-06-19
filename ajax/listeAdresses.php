<?php

	require_once("../login.php");
	//print_r($_POST); 
	$id_congreg=$_POST["id_congreg"];
	$id_territoire=$_POST["id_territoire"];
	//echo $id_congreg;
	$query = "SELECT * FROM `adresse` WHERE id_territoire=$id_territoire AND id_congreg=$id_congreg ORDER BY rue, numero ASC";

	$result = $conn->query($query);
	if ($result->num_rows==0)
	{
		echo "<div class='row justify-content-md-center'>";
		echo "<div class='col-md-12>";
		echo "<h4 class='text-center' style='color:red'>Aucune adresse enregistrée pour ce territoire</h4>";
		echo "</div>";
		echo "</div>";
	}
	else
	{
		?>
		 	<div class='row justify-content-md-center'>
				<div class='col-md-1'><strong>N°</strong></div>
				<div class='col-md-6'><strong>Rue</strong></div>
				<div class='col-md-1'><strong>Interphone</strong></div>
				<div class='col-md-2'><strong>Apt</strong></div>
				<div class='col-md-2'><strong>Rmq</strong></div>
			
    			</div>
    	<?php
	}
	while($row = $result->fetch_assoc())
	{					      
		if($row['id_groupe']!==NULL)
			echo "<del>";

		echo "<div class='row justify-content-md-center'>";
		
		echo "<div class='col-md-1'>";
    	echo $row['numero']; 
    	echo "</div>";
		
		echo "<div class='col-md-6'>";
    	echo $row['rue']; 
    	echo "</div>";
		
		echo "<div class='col-md-1'>";
    	echo $row['interphone']; 
    	echo "</div>";
		
		echo "<div class='col-md-2'>";
    	echo $row['apt']; 
    	echo "</div>";
		
		echo "<div class='col-md-2'>";
		echo $row['rmq'];
    	echo "</div>";


    	echo '</div>';
    	if($row['id_groupe']!==NULL)
			echo "</del>";
	}

?>