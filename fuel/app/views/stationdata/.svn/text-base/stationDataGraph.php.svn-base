<?php

	Package::load('Pchart');
	$station_id = $_GET['id'];
	$type = $_GET['type'];
	/* Create and populate the pData object */
	
	$stationData = \Controller_Stationdata::getStationDataById($station_id);
	
	$dataPointArray = array();
	$labelArray = array();
	
	switch ($type) {
		case 'hum':
			$typeData = array('fieldName'=>'hum', 'axisLabel'=>'Humidity');
			break;
		case 'windDir':
			$typeData = array('fieldName'=>'windDir', 'axisLabel'=>'Wind Direction');
			break;
		case 'temp1':
			$typeData = array('fieldName'=>'temp1', 'axisLabel'=>'Temperature 1');
			break;
		case 'temp2':
			$typeData = array('fieldName'=>'temp2', 'axisLabel'=>'Temperature 2');
			break;
		case 'dew':
			$typeData = array('fieldName'=>'dew', 'axisLabel'=>'Dew');
			break;
		case 'pressure':
			$typeData = array('fieldName'=>'pres', 'axisLabel'=>'Pressure');
			break;
		case 'light':
			$typeData = array('fieldName'=>'light', 'axisLabel'=>'Light');
			break;
		case 'windSpeed':
			$typeData = array('fieldName'=>'windSpeed', 'axisLabel'=>'Wind Speed');
			break;
		case 'rain':
			$typeData = array('fieldName'=>'rain', 'axisLabel'=>'Rain');
			break;
		case 'power':
			$typeData = array('fieldName'=>'power', 'axisLabel'=>'Power');
			break;
		case 'lat':
			$typeData = array('fieldName'=>'lat', 'axisLabel'=>'Latitude');
			break;
		case 'lon':
			$typeData = array('fieldName'=>'lon', 'axisLabel'=>'Longitude');
			break;
			
		default:
			exit();
			break;	
		
		
	}
	$cnt = 0;
	foreach ($stationData as $s) {
		if ( ($s[$typeData['fieldName']]) && ($s['gpsTime']) )  {
			$dataPointArray[] = $s[$typeData['fieldName']];
			$labelArray[] = date("m-d-Y", strtotime($s['gpsTime']));
			$cnt++;
		} 
	}
	
	$MyData = new pData();  
	$MyData->addPoints($dataPointArray,"Station #1");	
	$MyData->setAxisName(0,$typeData['axisLabel']);
	$MyData->addPoints($labelArray,"Labels");
	$MyData->setAbscissa("Labels");
	
	
	/* Create the pChart object */
	$myPicture = new pImage(600,400,$MyData);
	
	/* Turn of Antialiasing */
	$myPicture->Antialias = FALSE;
	
	/* Add a border to the picture */
	$myPicture->drawRectangle(0,0,599,399,array("R"=>0,"G"=>0,"B"=>0));
	
	/* Write the chart title */ 
	$myPicture->setFontProperties(array("FontName"=>"../fonts/Forgotte.ttf","FontSize"=>8));
	$myPicture->drawText(200,35,$typeData['axisLabel']." Over Time",array("FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
	
	/* Set the default font */
	$myPicture->setFontProperties(array("FontName"=>"../fonts/pf_arma_five.ttf","FontSize"=>6));
	
	/* Define the chart area */
	$myPicture->setGraphArea(60,40,600,350);
	
	$maxXLabels = 10; // How many labels on-screen?
	$labelSkip = floor( $cnt / $maxXLabels ); // how many should we skip?
	/* Draw the scale */
	$scaleSettings = array("GridR"=>200,"GridG"=>200,"GridB"=>200,
								"CycleBackground"=>TRUE,"LabelSkip"=>$labelSkip,"LabelRotation"=>15);
	$myPicture->drawScale($scaleSettings);
	
	
	
	/* Turn on Antialiasing */
	$myPicture->Antialias = TRUE;
	
	/* Draw the line chart */
	$myPicture->drawLineChart();
	
	/* Write the chart legend */
	$myPicture->drawLegend(540,20,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL));
	
	/* Render the picture (choose the best way) */
	$myPicture->stroke();

?>


<?php

/*

Array ( [0] => Array ( [id] => 1 [hum] => 50 [dew] => 50 [pres] => 50 [temp1] => 50 [temp2] => 50 [light] => 50 [windSpeed] => 50 [windDir] => 100 [rain] => 0 [power] => 3.3 [lat] => 41.59999800 [lon] => -72.69999700 [ownshipSpeed] => 0 [ownshipHeading] => 0 [gpsTime] => 2015-06-13 09:43:39 [station_id] => 1 [created_at] => 2015-06-18 08:34:24 [updated_at] => [user_id] => 2 [description] => Jason's Test Station [isPrivate] => 1 ) 

*/

?>