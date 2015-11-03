
var fullhost = location.protocol + '//' + location.host + location.pathname;
var basePublicURL = fullhost.replace("stationdata","");
var station_id = getUrlVars()["id"];
var type = getUrlVars()["type"];
if (type == undefined) type = "windDir";
	
// Load the Visualization API and the controls package.
google.load('visualization', '1.0', {'packages':['controls']});

// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(drawStationData);


function drawStationData() {
		
		var xmlhttp = new XMLHttpRequest();
		var url = basePublicURL + "charts/stationData.json?station_id="+station_id+"&type="+type;
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				var myArr = JSON.parse(xmlhttp.responseText);
				if (myArr.data.length) {
					var data = new google.visualization.DataTable();
					data.addColumn('date', 'Date');
					data.addColumn('number', myArr.axisLabel);
									
					var i;
					for(i = 0; i < myArr.data.length; i++) {
						gpsTime = getDateFromFormat(myArr.data[i].gpsTime,"yyyy-MM-dd HH:mm:ss");// convert string time to millisec
						var gpsTimejs = new Date(gpsTime); // convert millis sec to js date obj
						dataPoint = parseFloat(myArr.data[i].datapoint);
						
						if (type == 'windDir' && dataPoint == 0) {
							// don't add
						} else {
							data.addRow([gpsTimejs,dataPoint]);
						}
					}
					
					
					// Create a dashboard.
					var dashboard = new google.visualization.Dashboard(document.getElementById('dashboard_div'));
					
					
					// Create a range slider, passing some options
					var dateRangeSlider = new google.visualization.ControlWrapper({
					  'controlType': 'DateRangeFilter',
					  'containerId': 'filter_div',
					  'options': {
						'filterColumnLabel': 'Date'
					  }
					});
					
					
					// Create line chart, passing some options
					var lineChart = new google.visualization.ChartWrapper({
					  'chartType': 'LineChart',
					  'containerId': 'chart_div',
					  'options': {
						'title': myArr.axisLabel,
						'height': 600,
						'chartArea': { left: 50, top:30 },
						'legend': {position: 'none'},
						'backgroundColor': { fill:'rgba(255,255,255,0.8)' }
					  }
					});
					
					// Establish dependencies, declaring that 'filter' drives 'pieChart',
					// so that the pie chart will only display entries that are let through
					// given the chosen slider range.
					dashboard.bind(dateRangeSlider, lineChart);
					
					// Draw the dashboard.
					dashboard.draw(data);
				} else { // no data
					
				}
		
			}
		}
		
		xmlhttp.open("GET", url, true);
		xmlhttp.send();
		
		return;
}


function getUrlVars() {
	var vars = {};
	var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
	vars[key] = value;
	});
	return vars;
}