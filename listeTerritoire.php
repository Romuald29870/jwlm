<?php

	require_once("login.php");
	//print_r($_POST); 
	$id_congreg=$_POST["id_congreg"];
	//echo $id_congreg;
	$query="SELECT * FROM territoire WHERE id_congreg=$id_congreg ORDER BY numero";
	$result = $conn->query($query);
	while($row = $result->fetch_assoc())
	{					      
		echo "<option value=$row[id]>$row[numero]</option>";
	}

?>