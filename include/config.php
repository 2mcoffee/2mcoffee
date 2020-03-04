<?php

	//Add here your database connection data
	define('DB_SERVER', '');
	define('DB_USERNAME', '');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', '');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	
	//Domain for URL Shorterner
	$site = "http://domain.com/app";

?>