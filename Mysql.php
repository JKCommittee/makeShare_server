<?php
class Mysql{
	private static $dsn = 'mysql:dbname=make;host=localhost;charset=utf8;';
	private static $user = 'root';
	private static $password = '****';
	
	static function connect() {
		return new PDO(self::$dsn, self::$user, self::$password);
	}
}