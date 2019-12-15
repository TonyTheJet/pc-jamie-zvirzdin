<?php
class DBSingleton {

	/**
	 * @var PDO
	 */
	private static $db_connection;

	public static function get_db_connection(): PDO {
		if (empty(self::$db_connection)) {
			self::$db_connection = new PDO('mysql:host=' . DB_HOST . ';port=3306;dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASSWORD);
		}

		return self::$db_connection;
	}
}