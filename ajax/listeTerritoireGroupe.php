<?php

	require_once("../login.php");
	//print_r($_POST); 
	$id_groupe=$_POST["id_groupe"];
	//echo $id_congreg;
	$query="SELECT * FROM territoireGroupe WHERE id_groupe=$id_groupe ORDER BY numero";
	$result = $conn->query($query);
	while($row = $result->fetch_assoc())
	{					      
		echo "<option value=$row[id]>$row[numero]</option>";
	}

?>