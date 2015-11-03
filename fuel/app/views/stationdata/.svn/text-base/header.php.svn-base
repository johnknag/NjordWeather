<!DOCTYPE html >
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title><?php if (isset($title)) echo $title; ?></title>
	<?php  
	echo Asset::css('bootstrap.css');
	echo Asset::css('myStyles.css');
	echo "<script type='text/javascript' src='https://www.google.com/jsapi'></script>";
	echo Asset::js('googleCharts.js'); 
	echo Asset::js('date.js'); 
		 ?>
    
    
    
</head>

<body>

<div class="container containerTwoColumns">
    <div class="row rowTwoColumns">
        <div class="col-md-3 md3sideBar">
			<?php echo View::forge('blocks/sidebar'); ?>
        </div>
        
        <div class="col-md-1 md1ButtonBar">
			<?php echo View::forge('stationdata/buttonbar'); ?>
        </div>
        
        
        <div id="dashboard_div" class="col-md-8 md8mainBar">
                    
            <div class="row" style="height:60%">
                <div class="col-xs-12">
                    <div id="chart_div" style="width: 100%; position:absolute;"></div>
                </div>
            </div>
                    
            <div class="row">
                <div class="col-xs-12">
           		 	<div id="filter_div"></div>
                </div>
            </div>
        
        

