<?php
class Controller_Maps extends Controller_Rest
{
    public function get_windVector()
    {
		$user_id = Input::get('user_id');
		
		// first we need to get the latest row in the weatherdata table for each of the users stations
		// EFFECTIVE QUERY:
			/* 	
				SELECT w.station_id,
					(SELECT w2.id as weatherdata_id 
						FROM weatherdata w2
						WHERE w2.station_id = w.station_id
						ORDER BY w2.gpsTime DESC LIMIT 1) as last_id
			 	FROM weatherdata w
					INNER JOIN stations s ON w.station_id = s.id
				WHERE s.user_id =2
				GROUP BY w.station_id
			 	ORDER BY s.created_at ASC 
			*/
					
						
		if ($user_id) { //$user_id = 0 = show all
			$mainQuery = DB::select('w.station_id')
						->from(array('weatherdata','w'))
						->join(array('stations','s'), 'INNER')->on('w.station_id', '=', 's.id')
						->where('s.user_id', $user_id)
						->group_by('w.station_id')
						->order_by('s.created_at','asc');
		} else {
			$mainQuery = DB::select('w.station_id')
						->from(array('weatherdata','w'))
						->join(array('stations','s'), 'INNER')->on('w.station_id', '=', 's.id')
						->group_by('w.station_id')
						->order_by('s.created_at','asc');
		}
					
						
		$latestDataFromUsersStations = $mainQuery->execute()->as_array();
		
		$idList = array();
		$myStations = array();
		
		//var_dump($latestDataFromUsersStations);
		//die();
		
		if (sizeof($latestDataFromUsersStations)) { 
			foreach ($latestDataFromUsersStations as $s) {
				
				$q = DB::select('w2.id')
						->from(array('weatherdata','w2'))
						->where('w2.station_id', $s['station_id'])
						->order_by('w2.gpsTime','desc')
						->limit(1);
				$last_id = $q->execute()->as_array();
						
				$idList[] = $last_id[0];
			}	
			
			$q = DB::select()->from('weatherdata')->join('stations', 'INNER')->on('weatherdata.station_id', '=', 'stations.id')->where('weatherdata.id', 'in', $idList)->order_by('stations.created_at','asc');
			
			$myStations = $q->execute()->as_array();
			$myStations[0]['data'] = 1;
		} else {
			// for some reason when no data is returned by rest control it just breaks
			$myStations[0]['data'] = 0;
		}
		
		
		
		return $this->response($myStations);
    }
}

?>