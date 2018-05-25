
<div class="row">
	<div class="col">
 		<form action="" method="post" class="col">
		    <div class="form-row">
		    	<div class="form-group col-md-6">
			    	<label for="langue">Langue :</label>
					<select name="langue" class="form-control" id="exampleFormControlSelect1">
						<option value="Arabe">Arabe</option>
						<option value="Espagnol">Espagnol</option>
						<option value="Mahorais">Mahorais</option>
						<option value="Malgache">Malgache</option>
						<option value="Russe">Russe</option>
					</select>
			    </div>
			</div>
	    	
			<input type="submit" value="Valider">
	   </form>
	</div>
</div>

<?php

if(isset($_POST['langue']))
{

	require_once("login.php");
	$langue=$_POST['langue'];
	$lat="48.4000000" ;
	$long="-4.4833300";
	
	echo <<<EOT
	<div class="row">
	<div class='col'><h3>Carte de la langue $langue</h3></div>
	</div>


	<div class="row">
	<div id="map" class="col-md-12" style="width:600px;height:600px">chargement de la carte...</div>
	</div>

    <script>

      function initMap() {
      	var myLatLng = {lat: $lat, lng:$long};
      	
        var infoWindow = new google.maps.InfoWindow;


        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: myLatLng
        });

		downloadUrl('/bdd/adresses_to_xml.php?langue=$langue', function(data) {
            var xml = data.responseXML;
            console.log(xml);
            var markers = xml.documentElement.getElementsByTagName('marker');
            
            Array.prototype.forEach.call(markers, function(markerElem) {
              var numero = markerElem.getAttribute('numero');
              var apt = markerElem.getAttribute('apt');
              var rue = markerElem.getAttribute('rue');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('longi'))
            );

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              if(apt!="")
              	strong.textContent = numero + " " + rue + " (apt : " + apt + ")";
              else
              	strong.textContent = numero + " " + rue;
              	
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));
              
              var marker = new google.maps.Marker({
                map: map,
                position: point
              });
              
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
              
            });
          });
        }
        
    function downloadUrl(url, callback) {
    	console.log(url);
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            
    		console.log(request);
    		console.log(request.status);
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
      
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=$mapskey&callback=initMap">
    </script>

EOT;

	require_once("login.php");
	
	$conn = new mysqli($hn, $un, $pw, $db);
	if($conn->connect_error) die($conn->connect_error);

	$query = "SELECT `id`, `rue`, `numero`, `apt`, `cp`, `ville`, `langue`, `congregation`, `territoire` FROM `adresse` WHERE langue='$langue'";
	$result = $conn->query($query);

	if(!$result) echo "<h1>ECHEC DE LECTURE : $query</h1><br>" . $conn->error . "<br><br>";

	echo "<div class='row justify-content-md-center'>";
	echo "<div class='col-md-12'><h3>Adresses de la langue $langue</h3></div>";
	echo "</div>";
	echo "<div class='row justify-content-md-center'>";

	echo "<div class='col-md-1'>";
	echo "<b>numéro</b>"; 
	echo "</div>";
	
	echo "<div class='col-md-4'>";
	echo "<b>adresse</b>"; 
	echo "</div>";
	
	echo "<div class='col-md-1'>";
	echo "<b>Apt</b>"; 
	echo "</div>";
	
	echo "<div class='col-md-3'>";
	echo "<b>code postal</b>"; 
	echo "</div>";
	
	echo "<div class='col-md-2'>";
	echo "<b>ville</b>"; 
	echo "</div>";
	
	echo "</div>";

	$result->data_seek(0);
	while ($row = $result->fetch_assoc()) {
		echo "<div class='row justify-content-md-center'>";
		
		echo "<div class='col-md-1'>";
    	echo $row['numero']; 
    	echo "</div>";
		
		echo "<div class='col-md-4'>";
    	echo $row['rue']; 
    	echo "</div>";
		
		echo "<div class='col-md-1'>";
    	echo $row['apt']; 
    	echo "</div>";
		
		echo "<div class='col-md-3'>";
    	echo $row['cp']; 
    	echo "</div>";
		
		echo "<div class='col-md-2'>";
    	echo $row['ville']; 
    	echo "</div>";
		

    	echo '</div>';
    }
}
?>