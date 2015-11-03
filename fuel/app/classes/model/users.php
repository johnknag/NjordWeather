<?php

class Model_users extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'profile_fields',
		'group',
		'last_login',
		'login_hash',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'users';

	
	public static function get_id_by_username($username) {
		return self::query()->select('id')->where('username', $username)->get_one()->id;
	}
}
