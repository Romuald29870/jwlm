<div class="row">
		<div id="map" class="col-md-12" style="width:800px;height:800px">chargement de la carte</div>
</div>

<script>

      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
        });
        
        var ctaLayer1 = new google.maps.KmlLayer({
          url: 'https://sites.google.com/site/jwlmbrest/jwlm_europe.kml',
          zoom: 1,
          map: map
        });

        var ctaLayer2 = new google.maps.KmlLayer({
          url: 'https://sites.google.com/site/jwlmbrest/jwlm_elorn.kml',
          zoom: 1,
          map: map
        });
  		
      }
      
 </script>

<?php

require_once("login.php");
echo "<script async defer src='https://maps.googleapis.com/maps/api/js?key=$mapskey&callback=initMap'></script>";
	

?>