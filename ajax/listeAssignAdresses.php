<?php

	require_once("../login.php");
	//print_r($_POST); 
	$id_congreg=$_POST["id_congreg"];
	$id_territoire=$_POST["id_territoire"];
	//echo $id_congreg;
	$query = "SELECT * FROM `adresse` WHERE id_territoire=$id_territoire AND id_congreg=$id_congreg ORDER BY rue, numero, interphone ASC";

	$result = $conn->query($query);
	
	
	echo "<div class='row justify-content-md-center'>";
		
		echo "<div class='col-md-1'><strong>N°</strong></div>";
		
		echo "<div class='col-md-3'><strong>Rue</strong></div>";
		
		echo "<div class='col-md-1'><strong>Inter</strong></div>";
		
		echo "<div class='col-md-1'><strong>Apt</strong></div>";
		
		echo "<div class='col-md-1'><strong>Rmq</strong></div>";
		
		echo "<div class='col-md-2'><strong>Groupe</strong></div>";
		
		echo "<div class='col-md-2'><strong>Territoire</strong></div>";

	echo '</div>';
    	
    	
	while($row = $result->fetch_assoc())
	{					      

		echo "<div class='row justify-content-md-center border'>";
		
		echo "<div class='col-md-1'>";
    	echo $row['numero']; 
    	echo "</div>";
		
		echo "<div class='col-md-3'>";
    	echo $row['rue']; 
    	echo "</div>";
		
		echo "<div class='col-md-1'>";
    	echo $row['interphone']; 
    	echo "</div>";
		
		echo "<div class='col-md-1'>";
    	echo $row['apt']; 
    	echo "</div>";
		
		echo "<div class='col-md-1'>";
		echo $row['rmq'];
    	echo "</div>";
		
		echo "<div class='col-md-2'>";
			echo "<select id='selectGroupe-$row[id]' name='id_groupe' class='form-control selectGroupe'>";
				echo '<option selected="true">Aucun</option>';
				$query="SELECT * FROM groupe";
				$result_groupe = $conn->query($query);
				while($row_groupe = $result_groupe->fetch_assoc())
				{
					if($row['id_groupe'] == $row_groupe['id'])
						echo "<option selected='true' value=$row_groupe[id]>$row_groupe[nom]</option>";
					else
					echo "<option value=$row_groupe[id]>$row_groupe[nom]</option>";
				}

			echo '</select>';
		echo "</div>";
		
		echo "<div class='col-md-2'>";
			echo "<select id='selectTerritoireGroupe-$row[id]' name='id_territoireGroupe' class='form-control selectTerritoireGroupe'>";
				echo '<option selected="true" value="NULL">Aucun</option>';
				$query="SELECT * FROM territoireGroupe WHERE id_groupe=$row[id_groupe]";
				$result_territoireGroupe = $conn->query($query);
				if($result_territoireGroupe)
					while($row_territoireGroupe = $result_territoireGroupe->fetch_assoc())
					{
						if($row['id_territoireGroupe'] == $row_territoireGroupe['id'])
							echo "<option selected='true' value=$row_territoireGroupe[id]>$row_territoireGroupe[numero]</option>";
						else
						echo "<option value=$row_territoireGroupe[id]>$row_territoireGroupe[numero]</option>";
					}

			echo '</select>';
		echo "</div>";


    	echo '</div>';
	}

?>


<script type="text/javascript">
	$(".selectGroupe").change(function(){
		id=$(this).attr('id');
		tmp=id.split("-");
		id_adresse=tmp[1];
		$("#selectTerritoireGroupe-"+id_adresse).val("NULL");
			
		id_groupe=$(this).val();
		
		$.post("ajax/assignGroupe.php",{id_groupe:id_groupe,id_adresse:id_adresse},function(data){
			//alert(data);
		});
		
		$.post("ajax/listeTerritoireGroupe.php",{id_groupe:id_groupe},function(data){
				$("#selectTerritoireGroupe-"+id_adresse).html('<option  selected="true">Aucun</option>' + data);
			}
		);
	});
	
	$(".selectTerritoireGroupe").change(function(){
	
		id_territoireGroupe=$(this).val();
		
		$.post("ajax/assignTerritoireGroupe.php",{id_territoireGroupe:id_territoireGroupe,id_adresse:id_adresse},function(data){

		});
	});
	
	
</script>