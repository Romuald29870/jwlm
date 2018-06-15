<script src="/js/jquery.js"></script>

<?php
	require_once("login.php");
	
	$query="SELECT * FROM groupe";
	$result = $conn->query($query);

?>


<div class="row">
	<div class="col">
 		<form action="" method="post" class="col">
		    <div class="form-row">
		    	<div class="form-group col-md-6">
			    	<label for="selectGroupe">Groupe de la langue :</label>
					<select id="selectGroupe" name="id_groupe" class="form-control">
						<option  disabled="disabled" selected="true">Selectionner le groupe...</option>
							<?php 
							while($row = $result->fetch_assoc())
							{
							  if(isset($_GET['id_groupe']) && $_GET['id_groupe'] == $row[id])
							  	echo "<option value=$row[id]  selected='true'>$row[nom]</option>";
							  else
							  	echo "<option value=$row[id]>$row[nom]</option>";
							}
							?>
					    </select>
			    </div>
			</div>
	   </form>
	</div>
</div>

<?php

if(isset($_GET['id_groupe']))
{


	$id_groupe=$_GET['id_groupe'];
	$lat="48.4000000" ;
	$long="-4.4833300";
	
	$query = "SELECT nom FROM groupe WHERE id=$id_groupe";
	$result = $conn->query($query);	
	$row = $result->fetch_assoc();
	$langue = $row['nom'];
		
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

		downloadUrl('/bdd/adresses_to_xml.php?id_groupe=$id_groupe', function(data) {
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
}

?>

<script type="text/javascript">

	$("#selectGroupe").change(function(){
		$id_groupe=$(this).val();
		window.location.replace("?carte&id_groupe="+$id_groupe);			
	});
	
</script>