<?php
	require_once("../login.php");
	//print_r($_POST); 
	$id_adresse=$_POST["id_adresse"]; 
	$id_groupe=$_POST["id_groupe"];
	//echo $id_congreg;
	$query="UPDATE adresse SET id_groupe=$id_groupe WHERE id=$id_adresse";
	echo $query;
	$result = $conn->query($query);
?>