<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	$active_group = 'localhost';
	$query_builder = TRUE;

	$db['localhost'] = array(
		'dsn'          => '',
		'hostname'     => 'localhost',
		'username'     => 'root',
		'password'     => '',
		'database'     => 'sikms',
		'dbdriver'     => 'mysqli',
		'dbprefix'     => '',
		'pconnect'     => FALSE,
		'db_debug'     => (ENVIRONMENT !== 'production'),
		'cache_on'     => FALSE,
		'cachedir'     => '',
		'char_set'     => 'utf8',
		'dbcollat'     => 'utf8_general_ci',
		'swap_pre'     => '',
		'encrypt'      => FALSE,
		'compress'     => FALSE,
		'stricton'     => FALSE,
		'failover'     => array(),
		'save_queries' => TRUE
	);

	$db['dtech'] = array(
		'dsn'          => '',
		'hostname'     => '192.168.102.12',
		'username'     => 'geri',
		'password'     => 'coba',
		'database'     => 'sikms',
		'dbdriver'     => 'mysqli',
		'dbprefix'     => '',
		'pconnect'     => FALSE,
		'db_debug'     => (ENVIRONMENT !== 'production'),
		'cache_on'     => FALSE,
		'cachedir'     => '',
		'char_set'     => 'utf8',
		'dbcollat'     => 'utf8_general_ci',
		'swap_pre'     => '',
		'encrypt'      => FALSE,
		'compress'     => FALSE,
		'stricton'     => FALSE,
		'failover'     => array(),
		'save_queries' => TRUE
	);
?>