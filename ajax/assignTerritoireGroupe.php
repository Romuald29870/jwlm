<?php
	require_once("../login.php");
	//print_r($_POST); 
	$id_adresse=$_POST["id_adresse"]; 
	$id_territoireGroupe=$_POST["id_territoireGroupe"];
	//echo $id_congreg;
	$query="UPDATE adresse SET id_territoireGroupe=$id_territoireGroupe WHERE id=$id_adresse";
	echo $query;
	$result = $conn->query($query);
	
?>