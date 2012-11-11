<?php
$dsn = getenv('DATABASE_URL');
$regexp = '/(?P<driver>[a-z]*):\/\/(?P<username>[a-zA-Z0-9]*):(?P<password>[a-zA-Z0-9\-_]*)@(?P<host>[a-zA-Z0-9\-\.]*):[0-9]*\/(?P<database>[a-zA-Z0-9]*)/';

$matches = array();
preg_match($regexp, $dsn, $matches);

define('HEROKU_DB_HOST', $matches['host']);
define('HEROKU_DB_USER', $matches['username']);
define('HEROKU_DB_PASS', $matches['password']);
define('HEROKU_DB_NAME', $matches['database']);
define('HEROKU_DB_DRIVER', 'Database/Postgres');


class DATABASE_CONFIG {

	public $default = array(
		'datasource' => HEROKU_DB_DRIVER,
		'persistent' => false,
		'host' => HEROKU_DB_HOST,
		'login' => HEROKU_DB_USER,
		'password' => HEROKU_DB_PASS,
		'database' => HEROKU_DB_NAME,
		'prefix' => '',
		//'encoding' => 'utf8',
	);

	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'user',
		'password' => 'password',
		'database' => 'test_database_name',
		'prefix' => '',
		//'encoding' => 'utf8',
	);
}

Configure::write('Security.salt', getenv('salt'));
Configure::write('Security.cipherSeed', getenv('cipherSeed'));