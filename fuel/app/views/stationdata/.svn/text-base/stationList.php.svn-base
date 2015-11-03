

<?php
	
	
	$showAll = 0;
 	if (Input::get('showAll')) $showAll = 1;
	
	$station_id = 0;
 	if (Input::get('id')) $station_id = Input::get('id');
	
	$type = "windDir";
 	if (Input::get('type')) $type = Input::get('type');
	
	$station = \Controller_Stationdata::getStationInformationById($station_id);
	$myStations = \Controller_Stationdata::getStationsForUser($showAll);
	?>
    <script>
		var divHeader = document.getElementById('stationHeaderSideBar');
		divHeader.innerHTML = "<h4><strong>Station #<?=$station['stationNumber']?></strong></h4>" + 
							"<h5><?=$station['description']?></h5>" +
							"<h5>Click Attribute to the right to view graph</h5>";
	</script>
    <div class="row">
        <br>
        <b>Select station to view data</b>
        <br /><br />
        <?php $cnt = 0;
        	foreach ($myStations as $s) { 
        	$cnt++; ?>
        		<a class="whiteLink<?=$s['id'] == $station_id?'Selected':''?>" href="<?=Uri::base()?>stationdata?id=<?=$s['id']?><?=$showAll?'&showAll=1':''?>"><?=$s['description']?> (#<?=$cnt?>)</a><br />
        <?php } ?>
        <br>
    </div>



