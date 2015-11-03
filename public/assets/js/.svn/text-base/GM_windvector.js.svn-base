var map;
var markersArray = [];
var arrowArray = [];
var lineSymbol = { path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW};
var earthRadius = 6371000; // metres
var distanceOfArrow = 150000; 
var fullhost = location.protocol + '//' + location.host + location.pathname;
var basePublicURL = fullhost.replace("windvector/index","");



function addMarkersToWindVectorMap(arr, zoomLevel, bounds, showAll) {
	deleteArrows();
	deleteMarkers();
	//alert('adding arrows');
	
	var i;
	//var infoWindow = new google.maps.InfoWindow;
	var currentDistanceOfArrow = getDistanceFromBounds(bounds);
	//alert(currentDistanceOfArrow);
		
	for(i = 0; i < arr.length; i++) {
		var point = new google.maps.LatLng(
		  parseFloat(arr[i].lat),
		  parseFloat(arr[i].lon));
		  
			
		var lat1 = arr[i].lat  * Math.PI / 180;
		var lng1 = arr[i].lon  * Math.PI / 180;  
		
		// convert degrees to radians
		var bearing =  arr[i].windDir  * Math.PI / 180;  
		
		if (bearing == 0) {  // no wind direction
			var lat2 = lat1;
			var lng2 = lng1;
		} else {	
			var lat2 = Math.asin( Math.sin(lat1)*Math.cos(currentDistanceOfArrow/earthRadius) +
								Math.cos(lat1)*Math.sin(currentDistanceOfArrow/earthRadius)*Math.cos(bearing) );
			var lng2 = lng1 + Math.atan2(Math.sin(bearing)*Math.sin(currentDistanceOfArrow/earthRadius)*Math.cos(lat1),
									 Math.cos(currentDistanceOfArrow/earthRadius)-Math.sin(lat1)*Math.sin(lat2));
		}
								 
		/// convert back to degrees
		lat1 = lat1 * 180 / Math.PI;
		lat2 = lat2 * 180 / Math.PI;
		lng1 = lng1 * 180 / Math.PI;
		lng2 = lng2 * 180 / Math.PI;
		
		var lineCoordinates = [
			new google.maps.LatLng(lat1, lng1),
			new google.maps.LatLng(lat2, lng2)
			];
		if (bearing == 0) { // no wind direction so don't show arrow
			var line = new google.maps.Polyline({
			path: lineCoordinates,
			map: map
			});
		} else {
			var line = new google.maps.Polyline({
			path: lineCoordinates,
			icons: [{ icon: lineSymbol, offset: '100%'}],
			map: map
			});
		}
		
		if (i == 0) {
			var markerURL = "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png";
		} else {	
			var markerURL = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
		}
		
	//	var marker = new google.maps.Marker({
	//	map: map,
	//	position: point,
	//	id: i,
	//	icon: markerURL,
	//	});
		
		
     var marker = new MarkerWithLabel({
		position: point,
		draggable: false,
		labelText: arr[i].id,
		map: map,
		id: i,
		labelClass: "customMarkerLabel", // the CSS class for the label
		labelStyle: {top: "0px", left: "-21px", opacity: 0.75},   
		labelVisible: true,
		icon: markerURL,
     });
	 
   
	 
		
		google.maps.event.addListener(marker, 'click', function() {
			showStationInformation(arr, this.id, showAll)
		});			
 
		//bindInfoWindow(marker, map, infoWindow, html);
		
		markersArray.push(marker);
		arrowArray.push(line);
			  
	}
}
	
function loadWindVectorMap(user_id) {
	
	if (user_id == 0) { 
		showAll = 1;
	} else {
		showAll = 0;
	}
	
	var xmlhttp = new XMLHttpRequest();
	var url = basePublicURL + "maps/windVector.json?user_id="+user_id;
			
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var myArr = JSON.parse(xmlhttp.responseText);
			
			if (myArr[0]['data'] == 1) {
				var mapLat = myArr[0].lat;
				var mapLon = myArr[0].lon;
			} else {
				var mapLat = '41.603221'; // default to CT ?
				var mapLon = '-73.087749'; 
				
			}
			map = new google.maps.Map(document.getElementById("map"), {
				center: new google.maps.LatLng(mapLat,mapLon),
				zoom: 5,
				mapTypeId: 'roadmap'
			});
			
			google.maps.event.addListener(map, 'bounds_changed', function() {
				var zoomLevel = map.getZoom();
				var bounds = map.getBounds();
				addMarkersToWindVectorMap(myArr, zoomLevel, bounds, showAll);
			});
			
			if (myArr[0]['data'] == 1) showStationInformation(myArr, 0, showAll);
			
			//deleteArrows();
			//addMarkersToWindVectorMap(myArr, 5);
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
	
	return;
}

//function bindInfoWindow(marker, map, infoWindow, html) {
 // google.maps.event.addListener(marker, 'click', function() {
//	infoWindow.setContent(html);
//	infoWindow.open(map, marker);
 // });
//}


function doNothing() {}


function deleteMarkers() {
  for (var i = 0; i < markersArray.length; i++ ) {
    markersArray[i].setMap(null);
  }
  markersArray.length = 0;
}


function deleteArrows() {
	//alert('deleting arrows');
  for (var i = 0; i < arrowArray.length; i++ ) {
    arrowArray[i].setMap(null);
  }
  arrowArray.length = 0;
}

function showStationInformation(stations, index, showAll) {
	// reset icons
	for (var i = 0; i < markersArray.length; i++ ) {
		if (i == index) {
			var markerURL = "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png";
		} else {
			var markerURL = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";
		}
		
		markersArray[i].setIcon(markerURL);
	}
	
			//this
	var divHeader = document.getElementById('stationHeaderSideBar');
	divHeader.innerHTML = "<h4><strong>Station #" + (index+1) + "</strong></h4>" + 
						"<h5>" + stations[index].description + "</h5>";
	
	
   	var divInfo = document.getElementById('stationInformationSideBar');
	divInfo.innerHTML = "<br/> Wind Direction: " + stations[index].windDir + " &deg; True" +
						"<br/> Temp1: " + stations[index].temp1 + " &deg;F" +
						"<br/> Temp2: " + stations[index].temp2 + " &deg;F" +
						"<br/> Dew: " + stations[index].dew + " &deg;F" +
						"<br/> Pressure: " + stations[index].pres + " inHg" + 
						"<br/> Hum: " + stations[index].hum + " %" + 
						"<br/> Light: " + stations[index].light + " lm" + 
						"<br/> Wind Speed: " + stations[index].windSpeed + " ft/s" + 
						"<br/> Rain: " + stations[index].rain + " in" + 
						"<br/> Power: " + stations[index].power + " V" + 
						"<br/> latitude: " + stations[index].lat + "&deg;" +
						"<br/> longitude: " + stations[index].lon + "&deg;<br><br><br>" +
						"Last Reading: " + stations[index].gpsTime + "<br><br><br>";
						
	var url = basePublicURL+"stationdata?id="+stations[index].id;
	if (showAll) url = url + "&showAll=1";
						
	var divStationLink = document.getElementById('stationLink');
	divStationLink.href=url;
	
}


function getDistanceFromBounds(bounds) {
	// this is used to calculate the lengths of the arrows
	
	var center = bounds.getCenter();
	var ne = bounds.getNorthEast();
	
	// r = radius of the earth in statute miles
	
	
	// Convert lat or lng from decimal degrees into radians (divide by 57.2958)
	var lat1 = center.lat() / 57.2958; 
	var lon1 = center.lng() / 57.2958;
	var lat2 = ne.lat() / 57.2958;
	var lon2 = ne.lng() / 57.2958;
	
	// distance = circle radius from center to Northeast corner of bounds
	var dis = earthRadius * Math.acos(Math.sin(lat1) * Math.sin(lat2) + 
	  Math.cos(lat1) * Math.cos(lat2) * Math.cos(lon2 - lon1));	
	
	dis = dis/8;
	return dis;
}


