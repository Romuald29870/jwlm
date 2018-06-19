<?php

	require_once("../login.php");
	//print_r($_POST); 
	$id_groupe=$_POST["id_groupe"];
	$id_territoireGroupe=$_POST["id_territoireGroupe"];
	//echo $id_congreg;
	$query = "SELECT * FROM `adresse` WHERE id_territoireGroupe=$id_territoireGroupe AND id_groupe=$id_groupe ORDER BY rue, numero ASC";

	$result = $conn->query($query);
	while($row = $result->fetch_assoc())
	{
echo "	      
		<div class='row justify-content-md-center'>
		
			<div class='col-md-1'>
			$row[numero]
			</div>
		
			<div class='col-md-5'>
			$row[rue]
			</div>
		
			<div class='col-md-1'>
			$row[interphone]
			</div>
		
			<div class='col-md-2'>
			$row[apt]
			</div>
		
			<div class='col-md-1'>
			$row[rmq]
			</div>
		
			<div class='col-md-1'>
					<div class='row justify-content-md-center'>
						<div class='col-md-6'>
							<a href='?editAdresse&id_adresse=$row[id]'>
							<img src='img/editer.png' height='20' width='20'>
							</a>
						</div>
						<div class='col-md-6'>
							<a href='$row[id]' class='cSuppr' >
							<img src='img/suppr.png' height='20' width='20'>
							</a>
						</div>
					</div>
			</div>


    	</div>
";
	}

?>
<script>
$(".cSuppr").click(function(event){
	event.preventDefault();
	if(confirm("Etes-vous certain de vouloir supprimer cette enregistrement ?"))
	{
			$id_adresse=$(this).attr('href');
			$.post("ajax/supprAdresse.php",{id_adresse:$id_adresse},function(data){
				//alert(data);
				alert("suppression effectuée");
				
				$id_groupe=$("#selectGroupe").val();
				$id_territoireGroupe=$("#selectTerritoireGroupe").val();
				
				$.post("/ajax/listeAdressesGroupe.php",{id_groupe:$id_groupe,id_territoireGroupe:$id_territoireGroupe},function(data){
					$("#result").html(data);
				});
			});
		
	}
});
</script>
