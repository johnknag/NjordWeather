<!DOCTYPE html >
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title><?php if (isset($title)) echo $title; ?></title>
	<?php  
	echo Asset::css('bootstrap.css'); 
	echo Asset::css('myStyles.css'); 
	echo "<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js'></script>";
	echo Asset::js('markerwithlabel.js'); 
	echo Asset::js('GM_windvector.js'); 
	
	if ($showAll)  {
		$user_id = 0; 
	} else {
		$user_id = Auth::get_user_id();
		$user_id = $user_id[1];
	}
	?>
    
    
    
    
</head>
<body onload="loadWindVectorMap('<?=$user_id?>')">
<div class="container containerTwoColumns">
    <div class="row rowTwoColumns">
        <div class="col-md-3 md3sideBar">
			<?php echo View::forge('blocks/sidebar'); ?>
        </div>
        <div id="map" class="col-md-9 md9mainBar" >   
                

