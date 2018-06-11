<?php
	require_once("../login.php");

	$rue=get_post($conn, 'rue');
	$numero = get_post($conn, 'numero');
	$apt =get_post($conn, 'apt');
	$interphone =get_post($conn, 'interphone');
	$rmq =get_post($conn, 'rmq');
	$cp = get_post($conn, 'cp');
	$ville =get_post($conn, 'ville');
	$id_territoire =get_post($conn, 'id_territoire');
	$id_congreg =get_post($conn, 'id_congreg');
	$id_groupe =get_post($conn, 'id_groupe');
	$id_territoireGroupe =get_post($conn, 'id_territoireGroupe');
	$lat =get_post($conn, 'lat');
	$long =get_post($conn, 'long');
	
	$query = "INSERT INTO adresse (rue, numero, apt, interphone, rmq, cp, ville,lat,longi,id_groupe,id_congreg,id_territoire,id_territoireGroupe) VALUES ('$rue','$numero','$apt','$interphone','$rmq','$cp','$ville','$lat','$long','$id_groupe','$id_congreg','$id_territoire','$id_territoireGroupe')";
	$result = $conn->query($query);
	
	if(!$result) echo "<h1>ECHEC DE L'INSERTION : $query</h1><br>" . $conn->error . "<br><br>";
	else
		header('location:../index.php?ajoutAdresse');
		

function get_post($conn, $var)
{
	return $conn->real_escape_string($_POST[$var]);
}

?>