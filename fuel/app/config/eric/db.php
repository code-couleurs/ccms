<?php
/**
 * The development database settings.
 */

return array(
	'default' => array(
		'type' => 'mysqli',
		'connection'  => array(
		    'hostname'   => 'localhost',
		    'database'   => 'ccms',
			'username'   => 'root',
			'password'   => 'groumph',
		),
		'charset' => 'utf8',
		'profiling' => true
	),
);