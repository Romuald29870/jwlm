
<?php 
	require_once("header.php"); 
	require_once("login.php");
?>

<form action='impressionPdf.php' method='post'>
<div class="row">
	<div class="col">
		    <div class="form-row">
		    	<div class="form-group col-md-6">
			    	<label for="selectCongreg">Congregation :</label>
					<select name="id_congreg" class="form-control" id="selectCongreg">
					<option  disabled="disabled" selected="true">Selectionner la congrégation...</option>
					<?php
						$query="SELECT * FROM congregation";
						$result = $conn->query($query);
						while($row = $result->fetch_assoc())
							{
						      echo "<option value=$row[id]>$row[nom]</option>";
							}
					?>
					</select>
			    </div>
			    <div class="form-group col-md-6" id="choix_territoire" style="display: none">
			    	<label for="selectTerritoire">Territoire : </label>
			    	<select name="id_territoire" class="form-control" id="selectTerritoire"></select>
			    </div>
			</div>
	</div>
</div>
</form>

<div class="row">
	<div class="col" id="result">
	</div>
</div>


<script src="/js/jquery.js"></script>
<script type="text/javascript">
	$("#selectCongreg").change(function(){
		
		$id_congreg=$(this).val();

		$("#choix_territoire").show();
		
		$.post("/ajax/listeCite.php",{id_congreg:$id_congreg},function(data){
				$("#selectTerritoire").html('<option  disabled="disabled" selected="true">Selectionner le territoire...</option>' + data);
			}
		);			
	});

	$("#selectTerritoire").change(function(){ 
		
		$id_congreg=$("#selectCongreg").val();
		$id_territoire=$(this).val();

		$.post("/ajax/listeAssignAdresses.php",{id_congreg:$id_congreg,id_territoire:$id_territoire},function(data){
				$("#result").html(data);
				$("#impression").show();
			}
		);
	});
</script>