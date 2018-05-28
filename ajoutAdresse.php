
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
	$rmq = get_post($conn, 'cp');
	$ville =get_post($conn, 'ville');
	$langue =get_post($conn, 'langue');

	$url="https://maps.googleapis.com/maps/api/geocode/json?address=$numero+$rue+$cp+$ville&key=$mapskey";
	$address=urlencode($numero." ".$rue." ".$cp." ".$ville);
	$api="https://maps.googleapis.com/maps/api/geocode/json?address=$address&sensor=false&key=$mapskey";
	//echo $api;

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
          url: 'https://sites.google.com/site/jwlmbrest/jwlm.kml',
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
	    <form action="" method="post" class="col-md-6">
	    <div class="form-row">
		    <div class="form-group col-md-6">
		    	<label for="congreg">Congregation :</label>
				<select name="congreg" class="form-control" id="exampleFormControlSelect1">
EOT;
							while($row = $result->fetch_assoc())
							{
						      echo "<option value=$row[nom]>$row[nom]</option>";
							}
echo <<<EOT
				</select>
		    </div>
		 </div>
		 <div class="form-row">
		    <div class="form-group col-md-6">
		    	<label for="territoire">Territoire : </label>
		    	<input type="text" class="form-control" name="territoire">
		    </div>
	    	
	    	<input type="hidden" name="rue" value="$rue">
			<input type="hidden" name="numero" value="$numero">
			<input type="hidden" name="apt" value="$apt">
			<input type="hidden" name="interphone" value="$interphone">
			<input type="hidden" name="rmq" value="$rmq">
	     	<input type="hidden" name="cp" value="$cp">
	        <input type="hidden" name="ville" value="$ville">
	        <input type="hidden" name="lat" value="$lat">
	        <input type="hidden" name="long" value="$long">
	        <input type="hidden" name="langue" value="$langue">
		</div>
			<input type="submit" value="Valider">
	    </form>
	</div>
EOT;

}
elseif(isset($_POST['territoire']))
{
	echo "ENREGISTREMENT";
	$rue=get_post($conn, 'rue');
	$numero = get_post($conn, 'numero');
	$apt =get_post($conn, 'apt');
	$interphone =get_post($conn, 'interphone');
	$rmq =get_post($conn, 'rmq');
	$cp = get_post($conn, 'cp');
	$ville =get_post($conn, 'ville');
	$territoire =get_post($conn, 'territoire');
	$congreg =get_post($conn, 'congreg');
	$langue =get_post($conn, 'langue');
	$lat =get_post($conn, 'lat');
	$long =get_post($conn, 'long');

	$query = "INSERT INTO adresse (rue, numero, apt, interphone, rmq, cp, ville,lat,longi,langue,congregation,territoire) VALUES ('$rue','$numero','$apt','$interphone','$rmq','$cp','$ville','$lat','$long','$langue','$congreg','$territoire')";
	$result = $conn->query($query);

	if(!$result) echo "<h1>ECHEC DE L'INSERTION : $query</h1><br>" . $conn->error . "<br><br>";
	else
		header('location:index.php?ajoutAdresse');

}
else
{
	$query="SELECT * FROM langue";
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
						<label for="rue">Rue :</label>
						<input type="text" class="form-control"  name="rue">
					</div>
					<div class="form-group col-md-2">			
						<label for="apt">Interphone :</label>
						<input type="text" class="form-control"  name="interphone">
					</div>
					<div class="form-group col-md-2">			
						<label for="apt">Numéro d'appartement :</label>
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
						<label for="langue">Langue parlée:</label>
						<select name="langue" class="form-control" id="exampleFormControlSelect1">
EOT;
							while($row = $result->fetch_assoc())
							{
						      echo "<option value=$row[nom]>$row[nom]</option>";
							}
echo <<<EOT

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