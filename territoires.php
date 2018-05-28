
<?php 
	require_once("header.php"); 
	require_once("login.php");
?>

<div class="row">
	<div class="col">
 		<form action="" method="post" class="col">
		    <div class="form-row">
		    	<div class="form-group col-md-6">
			    	<label for="selectCongreg">Congregation :</label>
					<select name="congreg" class="form-control" id="selectCongreg">
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
			    	<select name="territoire" class="form-control" id="selectTerritoire">
			    	</select>

			    </div>
			</div>
	    	
	   </form>
	   
	</div>
</div>
<div class="row">
	<div class="col">
		<div id="result"></div>
	</div>
</div>


<?php

if(isset($_POST['territoire']))
{
	$territoire=$_POST['territoire'];
	$congreg=$_POST['congreg'];

	
	$conn = new mysqli($hn, $un, $pw, $db);
	$conn->set_charset("utf8");

	if($conn->connect_error) die($conn->connect_error);

	$query = "SELECT `id`, `rue`, `numero`, `apt`, `interphone`, `rmq`, `congregation`, `territoire`, `langue` FROM `adresse` WHERE territoire='$territoire' AND congregation='$congreg' ORDER BY 'langue'";
	$result = $conn->query($query);

	if(!$result) echo "<h1>ECHEC DE LECTURE : $query</h1><br>" . $conn->error . "<br><br>";

	echo "<div class='row justify-content-md-center'>";
	echo "<div class='col-md-6'><h1>Territoire $congreg $territoire</h1></div>";
	echo "<div class='col-md-6'>";
		echo "<form action='impressionPdf.php' method='post'>";
		echo "<input type='hidden' name='congreg' value='$congreg' />";
		echo "<input type='hidden' name='territoire' value='$territoire' />";
		echo "format: ";
		echo "<input id='rd_A5' type='radio' name='format' value='A5' checked/>A5";
		echo "<input id='rd_A6' type='radio' name='format' value='A6'/>A6";
		echo "<input type=submit value='Impression PDF'/></form>";

	echo "</div>";
	echo "</div>";
	echo "<div class='row justify-content-md-center'>";

		echo "<div class='col-md-1'>";
    	echo "<b>numéro</b>"; 
    	echo "</div>";
		
		echo "<div class='col-md-6'>";
    	echo "<b>Rue</b>"; 
    	echo "</div>";
		
		echo "<div class='col-md-1'>";
    	echo "<b>Interphone</b>"; 
    	echo "</div>";
		
		echo "<div class='col-md-2'>";
    	echo "<b>Appartement</b>"; 
    	echo "</div>";
		
		echo "<div class='col-md-2'>";
    	echo "<b>Remarque</b>"; 
    	echo "</div>";
	echo "</div>";


	//$result->data_seek(0);
	while ($row = $result->fetch_assoc()) {
		if($row['langue']!=="")
			echo "<del>";

		echo "<div class='row justify-content-md-center'>";
		
		echo "<div class='col-md-1'>";
    	echo $row['numero']; 
    	echo "</div>";
		
		echo "<div class='col-md-6'>";
    	echo $row['rue']; 
    	echo "</div>";
		
		echo "<div class='col-md-1'>";
    	echo $row['interphone']; 
    	echo "</div>";
		
		echo "<div class='col-md-2'>";
    	echo $row['apt']; 
    	echo "</div>";
		
		echo "<div class='col-md-2'>";
		echo $row['rmq'];
    	echo "</div>";


    	echo '</div>';
    	if($row['langue']!=="")
			echo "</del>";
    }

}

?>


<script src="/js/jquery.js"></script>
<script type="text/javascript">
	$("#selectCongreg").change(function(){
		
		$id_congreg=$(this).val();

		$("#choix_territoire").show();
		
		$.post("listeTerritoire.php",{id_congreg:$id_congreg},function(data){
				$("#selectTerritoire").html('<option  disabled="disabled" selected="true">Selectionner le territoire...</option>' + data);

			}
		);			
	});

	$("#selectTerritoire").change(function(){ 
		
		$id_congreg=$("#selectCongreg").val();
		$id_territoire=$(this).val();

		$.post("listeAdresses.php",{id_congreg:$id_congreg,id_territoire:$id_territoire},function(data){
				$("#result").html(data);
			}
		);
	});
</script>