

<?php
	
	$station = \Controller_Stationdata::getStationInformationById($station_id);
	$myStations = \Controller_Stationdata::getStationsForUser();
	$data['googleChartsAPI'] = 1;
	if (isset($station_id)) $data['station_id'] = $station_id;
	if (isset($type)) $data['type'] = $type;
	echo View::forge( 'stationdata/header', $data); ?>
    
<?php /*
    
        <div class="row ">
          <div class="col-md-2">
						<b>Station #<?=$station['stationNumber']?></b><br><br>
						<b><?=$station['description']?></b><br /><br />
                        <b>Click attribute to view graph</b><br /><br />
          </div>
          
       </div>
	   */ ?>
<?php echo View::forge( 'blocks/footer' ); ?>

