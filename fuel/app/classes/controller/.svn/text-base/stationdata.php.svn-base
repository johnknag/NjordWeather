<?php

class Controller_Stationdata extends Controller
{	
	public function before() 
	{
		if (!Auth::check()) {
		    return Response::redirect('home/index');
		} else {
			//return Response::forge(View::forge('stationData/index'));
		}
	}


	public function action_index()
	{
		$data['type'] = "";
		if (!(isset($_GET['id']))) {
			// if user has no stations
			$data['station_id'] = 0;
		} else { 
			$data['station_id'] = $_GET['id'];
		}
		if (isset($_GET['type'])) $data['type'] = $_GET['type'];
		return Response::forge(View::forge('stationdata/index',$data));
	}
	
	public function action_stationDataGraph()
	{
	//	$this->getStationDataById($station_id);
		return Response::forge(View::forge('stationdata/stationDataGraph'));
	}


   	public function get_id($station_id) 
   	{
		//$data['station_id'] = $station_id;
		//return Response::forge(View::forge('stationdata/index', $data));
		
	}
	public function after($response) {
		return $response;
		// any post processing you need will be done here
	}
	
	
	public static function getStationDataById($station_id) {
		// return all information about the station including all weather data
	//	$user_id = Auth::get_user_id();
	//	$user_id = $user_id[1];
		
		$q = DB::select()->from('weatherdata')
					->join('stations', 'INNER')->on('weatherdata.station_id', '=', 'stations.id')
					->where_open()
						->and_where('stations.id', '=', $station_id)
					->where_close()
					->order_by('weatherdata.gpsTime','asc');

		$stationData = $q->execute()->as_array();
		
		return $stationData;
	}
	
	public static function getStationInformationById($station_id) {
		
		$q = DB::select()->from('stations')
							->where('id', $station_id);
				
		$stationData = $q->execute()->as_array();
		if (sizeof($stationData)) {
			$stationData = $stationData[0];
			$stationData['stationNumber'] = $station_id;
		} else {
			$stationData['stationNumber'] = "N/A";
			$stationData['description'] = "You have no stations, click 'Show All Stations' to see other station data";
		}
	
		return $stationData;
	}
	
	
	public static function getStationsForUser($showAll = 0) {
		if ($showAll) { 
			$q = DB::select()->from('stations')
							->order_by('created_at','asc');
		
		} else {
			$user_id = Auth::get_user_id();
			$user_id = $user_id[1];
			
			$q = DB::select()->from('stations')
							->where('user_id', $user_id)
							->order_by('created_at','asc');
		}
		
		$stationData = $q->execute()->as_array();
		
		return $stationData;
	}
	
	public static function getStationDataPointById($station_id, $datapoint) {
		// returns all data for one point 
		
		switch ($datapoint) {
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
	
	
		
		// return all information about the station including all weather data
	//	$user_id = Auth::get_user_id();
	//	$user_id = $user_id[1];
		
		$q = DB::select(array($typeData['fieldName'],'datapoint'),'gpsTime')->from('weatherdata')
					->join('stations', 'INNER')->on('weatherdata.station_id', '=', 'stations.id')
					->where_open()
						->and_where('stations.id', '=', $station_id)
					->where_close()
					->order_by('weatherdata.gpsTime','asc');

		//$stationData = $q->execute()->as_array();
		$stationData['data'] = $q->execute()->as_array();
		$stationData['axisLabel'] = $typeData['axisLabel'];
	
		
		return $stationData;
	}

}
