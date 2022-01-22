{{-- <!DOCTYPE html>
<html>
<head>
	<title>Menampilkan Peta dengan LeafletJS</title>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
	<style type="text/css">
		#peta{
			height:100vh;
		}
	</style>
</head>
<body>
	<div id="peta"></div>

	<script type="text/javascript">
		var mapOptions = {
			center: [-3.7973471,102.2657887],
			zoom: 13
		}

		var peta = new L.map('peta', mapOptions);

		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 18,
			id: 'mapbox.streets',
			accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
		}).addTo(peta);

		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			maxZoom: 18,
			id: 'mapbox.streets',
			accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
		}).addTo(peta);

		// membuat marker
		var marker = new L.Marker([-3.7838792,102.2655473]);
		marker.addTo(peta);

	</script>
</body>
</html>

 --}}

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Belajar</title>
 	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
 	<!-- Make sure you put this AFTER Leaflet's CSS --> <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
 </head>
 <body>
 	<div id="mapid"></div>
 	<style>
 		#mapid { height: 180px; }
 	</style>

 	<style type="text/javascript">
 		var mymap = L.map('mapid').setView([51.505, -0.09], 13);
 		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', { attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a> ', maxZoom: 18, id: 'mapbox/streets-v11', tileSize: 512, zoomOffset: -1, accessToken: 'your.mapbox.access.token' }).addTo(mymap);
 		var marker = L.marker([51.5, -0.09]).addTo(mymap);
 		var circle = L.circle([51.508, -0.11], { color: 'red', fillColor: '#f03', fillOpacity: 0.5, radius: 500 }).addTo(mymap);
 		var polygon = L.polygon([ [51.509, -0.08], [51.503, -0.06], [51.51, -0.047] ]).addTo(mymap);
 		marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup(); circle.bindPopup("I am a circle."); polygon.bindPopup("I am a polygon.");

 	</style>
 
 </body>
 </html>