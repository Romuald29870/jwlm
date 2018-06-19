
<?php 
	require_once("header.php"); 
	require_once("login.php");
	
	$id_groupe=NULL;
	$id_territoireGroupe=NULL;
	
	if(isset($_GET['id_groupe']))
		$id_groupe=$_GET['id_groupe'];
	if(isset($_GET['id_territoireGroupe']))
		$id_territoireGroupe=$_GET['id_territoireGroupe'];
	
?>

<form action='impressionPdf.php' method='post'>
<div class="row">
	<div class="col">
		<h2>Modifier / Supprimer une adresse</h2>
	</div>
</div>
<div class="row">
	<div class="col">
		    <div class="form-row">
		    	<div class="form-group col-md-6">
			    	<label for="selectGroupe">Groupe :</label>
					<select name="id_groupe" class="form-control" id="selectGroupe">
					<option  disabled="disabled" selected="true">Selectionner le groupe...</option>
					<?php
						$query="SELECT * FROM groupe";
						$result = $conn->query($query);
						while($row = $result->fetch_assoc())
							{
								if($id_groupe == $row['id'])
						      		echo "<option selected='true' value=$row[id]>$row[nom]</option>";
						      	else
						      		echo "<option value=$row[id]>$row[nom]</option>";
							}
					?>
					</select>
			    </div>
			    <div class="form-group col-md-6" id="choix_territoireGroupe" style="display: none">
			    	<label for="selectTerritoireGroupe">Territoire du groupe : </label>
			    	<select name="id_territoireGroupe" class="form-control" id="selectTerritoireGroupe"></select>
			    </div>
			</div>
	</div>
</div>
<div class="row">
	<div class="col" id="result" style="display: none">
	</div>
</div>
</form>

<div class="row">
	<div class="col" id="result">
	</div>
</div>

<script src="/js/jquery.js"></script>

<script type="text/javascript">

$(document).ready(getListeTerritoire);
$(document).ready(getListeAdresse);



function getListeTerritoire()
{
	$("#result").hide();
	id_groupe=$("#selectGroupe").val();
	id_territoireGroupe=null;
	
	
	if(id_groupe!=null)
	{
		$("#choix_territoireGroupe").show();
		
		$.post("ajax/listeTerritoireGroupe.php",{id_groupe:id_groupe},function(data){
				$("#selectTerritoireGroupe").html('<option  disabled="disabled" selected="true">Selectionner le territoire...</option>' + data);
				<?php 
				if(isset($_GET['id_territoireGroupe']))
					echo "$('#selectTerritoireGroupe').val('$_GET[id_territoireGroupe]');";
					echo "getListeAdresse();";
				?>
				
			}
		);
			
		
		
	}
	
}

function getListeAdresse()
{
	id_groupe=$("#selectGroupe").val();
	id_territoireGroupe=$("#selectTerritoireGroupe").val();
	
	if(id_territoireGroupe!=null)
	{	
		$.post("/ajax/listeAdressesGroupe.php",{id_groupe:id_groupe,id_territoireGroupe:id_territoireGroupe},function(data){
				$("#result").show();
				$("#result").html(data);
			}
		);
	}
	
}


$("#selectGroupe").change(getListeTerritoire);

$("#selectTerritoireGroupe").change(getListeAdresse);
	
	
</script>

