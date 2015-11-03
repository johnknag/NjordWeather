<!DOCTYPE html >
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title><?php if (isset($title)) echo $title; ?></title>
	<?php  echo Asset::css('bootstrap.css'); ?>
	<?php  echo Asset::css('myStyles.css'); ?>
    
<?php 	if (isset($googleMapsAPI)) { 
			echo "<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js'></script>";
			switch ($googleMapsAPI) {
				case 'windvector':
					echo Asset::js('GM_windvector.js'); 
					break;
			}
		} 
		if (isset($googleChartsAPI)) {
			if ($type!="") {
				echo "<script type='text/javascript' src='https://www.google.com/jsapi'></script>";
				echo Asset::js('googleCharts.js'); 
				echo Asset::js('date.js'); 
			}
		}

?>
    
    
    
</head>
<?php if (isset($googleMapsAPI)) {  ?>
	<body onload="loadWindVectorMap('<?=$user_id[1]?>')">
<?php } elseif (isset($googleChartsAPI)) {
		//if ($type!="") { 
		if ($type=="sdfsdf") { ?>
			<body onload="drawStationData(<?=$station_id?>,'<?=$type?>')">
		<?php } else { ?>
            <body>
        <?php } ?>
<?php } else { ?>
	<body>
<?php } ?>


<div class="container containerTwoColumns">
    <div class="row rowTwoColumns">
        <div class="col-md-3 md3sideBar">
			<?php echo View::forge('blocks/sidebar'); ?>
        </div>
		<?php if (isset($googleMapsAPI)) {  ?>
        		<div id="map" class="col-md-9 md9mainBar" >    
		<?php } elseif (isset($googleChartsAPI)) { ?>
        
              	<div id="dashboard_div" class="col-md-9 md9mainBar">
                    <div id="filter_div"></div>
                    <div id="chart_div"></div>
        
        <?php } ?>
        
        

