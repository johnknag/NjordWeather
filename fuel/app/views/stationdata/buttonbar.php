<?php 


	$showAll = 0;
 	if (Input::get('showAll')) $showAll = 1;
	
	$station_id = 0;
 	if (Input::get('id')) $station_id = Input::get('id');
	
	$type = "windDir";
 	if (Input::get('type')) $type = Input::get('type');
	
	 ?>

      <div class="btn-toolbar" role="toolbar" style="height:100%">
        <div class="btn-group-vertical btn-group-md btn-group-fill-height" style="height:100%;">
            <a href="<?=Uri::base()?>stationdata?id=<?=$station_id?>&type=windDir<?=$showAll?'&showAll=1':''?>" class="btn btn-black bottom-border <?=$type=='windDir'?'active':''?>" role="button"><strong>Wind Direction</strong></a>
            <a href="<?=Uri::base()?>stationdata?id=<?=$station_id?>&type=temp1<?=$showAll?'&showAll=1':''?>" class="btn btn-black bottom-border <?=$type=='temp1'?'active':''?>" role="button"><strong>Temp 1</strong></a>
            <a href="<?=Uri::base()?>stationdata?id=<?=$station_id?>&type=temp2<?=$showAll?'&showAll=1':''?>" class="btn btn-black bottom-border <?=$type=='temp2'?'active':''?>" role="button"><strong>Temp 2</strong></a>
            <a href="<?=Uri::base()?>stationdata?id=<?=$station_id?>&type=dew<?=$showAll?'&showAll=1':''?>" class="btn btn-black bottom-border <?=$type=='dew'?'active':''?>" role="button"><strong>Dew</strong></a>
            <a href="<?=Uri::base()?>stationdata?id=<?=$station_id?>&type=pressure<?=$showAll?'&showAll=1':''?>" class="btn btn-black bottom-border <?=$type=='pressure'?'active':''?>" role="button"><strong>Pressure</strong></a>
            <a href="<?=Uri::base()?>stationdata?id=<?=$station_id?>&type=hum<?=$showAll?'&showAll=1':''?>" class="btn btn-black bottom-border <?=$type=='hum'?'active':''?>" role="button"><strong>Humidity</strong></a>
            <a href="<?=Uri::base()?>stationdata?id=<?=$station_id?>&type=light<?=$showAll?'&showAll=1':''?>" class="btn btn-black bottom-border <?=$type=='light'?'active':''?>" role="button"><strong>Light</strong></a>
            <a href="<?=Uri::base()?>stationdata?id=<?=$station_id?>&type=windSpeed<?=$showAll?'&showAll=1':''?>" class="btn btn-black bottom-border <?=$type=='windSpeed'?'active':''?>" role="button"><strong>Wind Speed</strong></a>
            <a href="<?=Uri::base()?>stationdata?id=<?=$station_id?>&type=rain<?=$showAll?'&showAll=1':''?>" class="btn btn-black bottom-border <?=$type=='rain'?'active':''?>" role="button"><strong>Rain</strong></a>
            <a href="<?=Uri::base()?>stationdata?id=<?=$station_id?>&type=power<?=$showAll?'&showAll=1':''?>" class="btn btn-black bottom-border <?=$type=='power'?'active':''?>" role="button"><strong>Power</strong></a>
            <a href="<?=Uri::base()?>stationdata?id=<?=$station_id?>&type=lat<?=$showAll?'&showAll=1':''?>" class="btn btn-black bottom-border <?=$type=='lat'?'active':''?>" role="button"><strong>Latitude</strong></a>
            <a href="<?=Uri::base()?>stationdata?id=<?=$station_id?>&type=lon<?=$showAll?'&showAll=1':''?>" class="btn btn-black bottom-border <?=$type=='lon'?'active':''?>" role="button"><strong>Longitude</strong></a>
        
    </div>
    </div>
    
    