<script src="/js/jquery.js"></script>

<?php

require_once("login.php");


if(isset($_POST['rue']) & !isset($_POST['territoire'])) 
{
	$enregistrement = true;
	$rue=get_post($conn, 'rue');
	$numero = get_post($conn, 'numero');
	$apt =get_post($conn, 'apt');
	$interphone =get_post($conn, 'interphone');
	$cp = get_post($conn, 'cp');
	$rmq = get_post($conn, 'rmq');
	$ville =get_post($conn, 'ville');
	$id_groupe =get_post($conn, 'id_groupe');
	$id_territoireGroupe =get_post($conn, 'id_territoireGroupe');

	//$url="https://maps.googleapis.com/maps/api/geocode/json?address=$numero+$rue+$cp+$ville&key=$mapskey";
	$address=urlencode($numero." ".$rue." ".$cp." ".$ville);
	$api="https://maps.googleapis.com/maps/api/geocode/json?address=$address&sensor=false&key=$mapskey";
	//echo $url;

	$arrContextOptions=array(
	    "ssl"=>array(
	        "verify_peer"=>false,
	        "verify_peer_name"=>false,
	    ),
	);
	$jsondata = get_object_vars(json_decode(file_get_contents($api,false,stream_context_create($arrContextOptions))));
	$lat = $jsondata['results'][0]->geometry->location->lat;
	$long = $jsondata['results'][0]->geometry->location->lng;

	$query="SELECT * FROM congregation";
	$result = $conn->query($query);

echo <<<EOT


	<div class="row">
	<div class='col'><h3>Choix du territoire</h3> latitude : $lat longitude : $long </div>
	</div>


	<div class="row">
		<div id="map" class="col-md-6" style="width:400px;height:400px">chargement de la carte</div>


    <script>

      function initMap() {
      	var myLatLng = {lat: $lat, lng:$long};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 1,
          center: myLatLng
        });

        var ctaLayer = new google.maps.KmlLayer({
          url: 'https://sites.google.com/site/jwlmbrest/jwlm3.kml',
          zoom: 1,
          map: map
        });

        var marker = new google.maps.Marker({
    	position: myLatLng,
    	zoom: 1,
    	map: map,
    	title: 'Adresse'
  		});

      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=$mapskey&callback=initMap">
    </script>
	
	<form action="bdd/saveAddress.php" method="post" class="col-md-6">
	    <div class="form-row">
		    <div class="form-group col-md-6">
			    	<label for="selectCongreg">Congregation :</label>
					<select name="id_congreg" class="form-control" id="selectCongreg">
					<option  disabled="disabled" selected="true">Selectionner la congrégation...</option>
EOT;
						$query="SELECT * FROM congregation";
						$result = $conn->query($query);
						while($row = $result->fetch_assoc())
							{
						      echo "<option value=$row[id]>$row[nom]</option>";
							}
echo <<<EOT
					</select>
			    </div>
			</div>
		<div class="form-row">
			<div class="form-group col-md-6" id="choix_territoire" style="display: none">
			    <label for="selectTerritoire">Territoire : </label>
			    <select name="id_territoire" class="form-control" id="selectTerritoire">
			    </select>
			</div>
		</div>
		    
		 <div class="form-row">
	
	    	<input type="hidden" name="rue" value="$rue">
			<input type="hidden" name="numero" value="$numero">
			<input type="hidden" name="apt" value="$apt">
			<input type="hidden" name="interphone" value="$interphone">
			<input type="hidden" name="rmq" value="$rmq">
	     	<input type="hidden" name="cp" value="$cp">
	        <input type="hidden" name="ville" value="$ville">
	        <input type="hidden" name="lat" value="$lat">
	        <input type="hidden" name="long" value="$long">
	        <input type="hidden" name="id_groupe" value="$id_groupe">
	        <input type="hidden" name="id_territoireGroupe" value="$id_territoireGroupe">
			<input type="submit" value="Valider" id="btnSubmit" style="display: none">
		</div>
	    </form>
	</div>
EOT;

}
else
{
	$query="SELECT * FROM groupe";
	$result = $conn->query($query);

	echo <<<EOT
	<div class="row">
		<div class="col"><h3>Création d'une adresse</h3></div>
	</div>
	<div class="row">				
			<form action=" " method="post" class="col-md-12">
				<div class="form-row">
					<div class="form-group col-md-1">
						<label for="numero">Numéro :</label>
						<input type="text" class="form-control"  name="numero">
					</div>

					<div class="form-group col-md-5">
						<label for="rue">Voie :</label>
						<input type="text" class="form-control"  name="rue">
					</div>
					<div class="form-group col-md-2">			
						<label for="apt">Interphone :</label>
						<input type="text" class="form-control"  name="interphone">
					</div>
					<div class="form-group col-md-2">			
						<label for="apt">N° d'appartement :</label>
						<input type="text" class="form-control"  name="apt">
					</div>
					<div class="form-group col-md-2">			
						<label for="rmq">Remarque :</label>
						<input type="text" class="form-control"  name="rmq">
					</div>
				</div>
					
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="cp">Code postal :</label>
						<input type="text" class="form-control"  name="cp" value="29200">
					</div>

					<div class="form-group col-md-6">
						<label for="ville">Ville :</label>
						<input type="text" class="form-control"  name="ville" value="Brest">
					</div>
				</div>
					
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="groupe">Groupe :</label>
						<select id="selectGroupe" name="id_groupe" class="form-control" id="exampleFormControlSelect1">
						<option  disabled="disabled" selected="true">Selectionner le groupe...</option>
EOT;
							while($row = $result->fetch_assoc())
							{
						      echo "<option value=$row[id]>$row[nom]</option>";
							}
echo <<<EOT

					    </select>
					</div>
					<div class="form-group col-md-6" id="choix_territoire" style="display: none">
			    		<label for="selectTerritoire">Territoire du groupe : </label>
			    		<select name="id_territoireGroupe" class="form-control" id="selectTerritoireGroupe">
			    	</select>

			    </div>
				</div>
			
				<input type="submit" value="Ajouter adresse">
			</form>
	</div>
</div>


EOT;
}

function get_post($conn, $var)
{
	return $conn->real_escape_string($_POST[$var]);
}

?>

<script type="text/javascript">
	$("#selectGroupe").change(function(){
		
		$id_groupe=$(this).val();
		
		$("#choix_territoire").show();
		
		$.post("listeTerritoireGroupe.php",{id_groupe:$id_groupe},function(data){
				$("#selectTerritoireGroupe").html('<option  disabled="disabled" selected="true">Selectionner le territoire...</option>' + data);
			}
		);			
	});
	
	$("#selectCongreg").change(function(){
		
		$id_congreg=$(this).val();

		$("#choix_territoire").show();
		
		$.post("listeTerritoire.php",{id_congreg:$id_congreg},function(data){
				$("#selectTerritoire").html('<option  disabled="disabled" selected="true">Selectionner le territoire...</option>' + data);
			}
		);			
	});

	$("#selectTerritoire").change(function(){ 
		$("#btnSubmit").show();
	});

</script>