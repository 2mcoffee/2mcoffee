<?php

	define('DB_SERVER', 'SERVER');  // Database server name
	define('DB_USERNAME', 'USER'); // Database user
	define('DB_PASSWORD', 'PASSWORD'); // Password for database user
	define('DB_DATABASE', 'DATABASE_NAME'); // Database name
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	
	$site = "URL"; // Application url - Example: http://2mcoffee.com/app

?>