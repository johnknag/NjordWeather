<?php
class Controller_Charts extends Controller_Rest
{
    public function get_stationData()
    {
		$user_id = Auth::get_user_id();
		$user_id = $user_id[1];
		$station_id = Input::get('station_id');
		$type = Input::get('type');
		
		$stationData = \Controller_Stationdata::getStationDataPointById($station_id, $type);		
		return $this->response($stationData);
    }
}

?>