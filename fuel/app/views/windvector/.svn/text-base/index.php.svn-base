

<?php 
	$data['showAll'] = 0;
	if ($showAll) $data['showAll'] = 1;
	echo View::forge( 'windvector/header', $data ); ?>
        
        
<?php echo View::forge( 'blocks/footer' ); ?>



<?php 
/*
//$user = \Auth::get_user_id();

$q = DB::select()->from('weatherdata')->join('stations', 'INNER')->on('weatherdata.station_id', '=', 'stations.id')->where('stations.user_id', 2);
$myStations = $q->execute()->as_array();
// id 	hum 	dew 	pres 	temp1 	temp2 	light 	windSpeed 	windDir 	rain 	power 	lat 	lon 	ownshipSpeed 	ownshipHeading 	gpsTime 	station_id 	created_at 	updated_at 	id 	user_id 	description 	isPrivate 	created_at 	updated_at

//echo ">>>".$myStations['station_id'];
foreach ($myStations as $s) {
	//echo $s->station_id.",".$s->lat.",".",".$s->lon."<BR>";
	echo $s['station_id'].",".$s['lat'].",".$s['lon']."<BR>";
	
}
*/

/*
$weatherData = Model_Weatherdatum::query()->where('station_id', 'IN', array(1))->get();
$users = Model_users::query()->where('id', 'IN', array(2))->get();

echo sizeof($users);
echo "<BR><BR>";
//foreach ($weatherData AS $w) {
 // echo $w->lat.",".$w->lon."<BR>";
//}
foreach ($users AS $u) {
	echo $u->username;
}
*/

?>