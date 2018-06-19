<?php

	require_once("../login.php");
	//print_r($_POST); 
	$id_adresse=$_POST["id_adresse"];
	//echo $id_congreg;
	$query="DELETE FROM adresse WHERE id=$id_adresse";
	echo $query;
	$result = $conn->query($query);
?>