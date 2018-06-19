<script src="/js/jquery.js"></script>

<?php

require_once("login.php");

$id_adresse = $_GET["id_adresse"];

$query="SELECT * FROM adresse WHERE id=$id_adresse";
$result = $conn->query($query);
$row = $result->fetch_assoc()

?>
	<div class="row">
		<div class="col"><h3>Modification d'une adresse</h3></div>
	</div>
	<div class="row">				
			<form action="bdd/updateAdresse.php" method="post" class="col-md-12">
				<input type="hidden" name="id_adresse" value="<?php echo $id_adresse?>" />
				<div class="form-row">
					<div class="form-group col-md-1">
						<label for="numero">Numéro :</label>
						<input type="text" class="form-control"  name="numero" value="<?php echo $row['numero']?>">
					</div>

					<div class="form-group col-md-5">
						<label for="rue">Voie :</label>
						<input type="text" class="form-control"  name="rue" value="<?php echo $row['rue']?>">
					</div>
					<div class="form-group col-md-2">			
						<label for="apt">Interphone :</label>
						<input type="text" class="form-control"  name="interphone" value="<?php echo $row['interphone']?>">
					</div>
					<div class="form-group col-md-2">			
						<label for="apt">N° d'appartement :</label>
						<input type="text" class="form-control"  name="apt" value="<?php echo $row['apt']?>">
					</div>
					<div class="form-group col-md-2">			
						<label for="rmq">Remarque :</label>
						<input type="text" class="form-control"  name="rmq" value="<?php echo $row['rmq']?>">
					</div>
				</div>
					
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="cp">Code postal :</label>
						<input type="text" class="form-control"  name="cp"  value="<?php echo $row['cp']?>">
					</div>

					<div class="form-group col-md-6">
						<label for="ville">Ville :</label>
						<input type="text" class="form-control"  name="ville"  value="<?php echo $row['ville']?>">
					</div>
				</div>
					
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="selectGroupe">Groupe :</label>
						<select id="selectGroupe" name="id_groupe" class="form-control">
							<?php
			    			$query="SELECT * FROM groupe";
							$result = $conn->query($query);
							while($row_groupe = $result->fetch_assoc())
							{
								if($row_groupe['id']==$row['id_groupe'])
						      		echo "<option selected='true' value=$row_groupe[id]>$row_groupe[nom]</option>";
						      	else
						      		echo "<option value=$row_groupe[id]>$row_groupe[nom]</option>";
							}
			    		?>
					    </select>
					</div>
					<div class="form-group col-md-6" id="choix_territoire" >
			    		<label for="selectTerritoire">Territoire du groupe : </label>
			    		<select name="id_territoireGroupe" class="form-control" id="selectTerritoireGroupe">
			    		<?php
			    			$query="SELECT * FROM territoireGroupe WHERE id_groupe=$row[id_groupe]";
			    			echo $query;
							$result = $conn->query($query);
							while($row_terrGroupe = $result->fetch_assoc())
							{
								if($row_terrGroupe['id']==$row['id_territoireGroupe'])
						      		echo "<option selected='true' value=$row_terrGroupe[id]>$row_terrGroupe[numero]</option>";
						      	else
						      		echo "<option value=$row_terrGroupe[id]>$row_terrGroupe[numero]</option>";
							}
			    		?>
			    		</select>
			    	</div>
				</div>
				
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="selectCongreg">Congregation :</label>
						<select id="selectCongreg" name="id_congreg" class="form-control">
							<?php
			    			$query="SELECT * FROM congregation";
							$result = $conn->query($query);
							while($row_congreg = $result->fetch_assoc())
							{
								if($row_congreg['id']==$row['id_congreg'])
						      		echo "<option selected='true' value=$row_congreg[id]>$row_congreg[nom]</option>";
						      	else
						      		echo "<option value=$row_congreg[id]>$row_congreg[nom]</option>";
							}
			    		?>
					    </select>
					</div>
					<div class="form-group col-md-6" id="choix_territoire" >
			    		<label for="selectTerritoire">Territoire : </label>
			    		<select name="id_territoire" class="form-control" id="selectTerritoire">
			    		<?php
			    			$query="SELECT * FROM territoire WHERE id_congreg=$row[id_congreg]";
							$result = $conn->query($query);
							while($row_terr = $result->fetch_assoc())
							{
								if($row_terr['id']==$row['id_territoire'])
						      		echo "<option selected='true' value=$row_terr[id]>$row_terr[numero]</option>";
						      	else
						      		echo "<option value=$row_terr[id]>$row_terr[numero]</option>";
							}
			    		?>
			    		</select>
			    	</div>
				</div>
			
				<input id="btnAjouter" type="submit" value="Modifier adresse">
			</form>
	</div>
</div>

<script type="text/javascript">
	$("#selectGroupe").change(function(){
		
		$id_groupe=$(this).val();
		
		$("#choix_territoire").show();
		
		$.post("ajax/listeTerritoireGroupe.php",{id_groupe:$id_groupe},function(data){
				$("#selectTerritoireGroupe").html('<option  disabled="disabled" selected="true">Selectionner le territoire...</option>' + data);
			}
		);			
	});
	
	$("#selectCongreg").change(function(){
		
		$id_congreg=$(this).val();
		
		$.post("ajax/listeTerritoire.php",{id_congreg:$id_congreg},function(data){
				$("#selectTerritoire").html('<option  disabled="disabled" selected="true">Selectionner le territoire...</option>' + data);
			}
		);			
	});

	$("#selectTerritoireGroupe").change(function(){ 
		$("#btnAjouter").show();
	});
	
	$("#selectTerritoire").change(function(){ 
		$("#btnSubmit").show();
	});

</script>
