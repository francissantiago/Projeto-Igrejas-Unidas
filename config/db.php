<?php
/*
	██████  ██████       ██████  ██████  ███    ██ ███    ██ ███████  ██████ ████████ ██  ██████  ███    ██ 
	██   ██ ██   ██     ██      ██    ██ ████   ██ ████   ██ ██      ██         ██    ██ ██    ██ ████   ██ 
	██   ██ ██████      ██      ██    ██ ██ ██  ██ ██ ██  ██ █████   ██         ██    ██ ██    ██ ██ ██  ██ 
	██   ██ ██   ██     ██      ██    ██ ██  ██ ██ ██  ██ ██ ██      ██         ██    ██ ██    ██ ██  ██ ██ 
	██████  ██████       ██████  ██████  ██   ████ ██   ████ ███████  ██████    ██    ██  ██████  ██   ████ 
*/
function connectDB(){
	$app_env = "local";

	if($app_env == "production"){
		$dbhost = "PRODUCTION_IP";
		$dbport = 3306;
		$dbuser = "PRODUCTION_MYSQL_USER";
		$dbpass = "PRODUCTION_MYSQL_PASSWORD";
		$dbdatabase = "production-unidas";
	} elseif($app_env == "local") {
		$dbhost = "localhost";
		$dbport = 3306;
		$dbuser = "root";
		$dbpass = "";
		$dbdatabase = "local-unidas";
	}
	
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbdatabase, $dbport);

	return $connect;
}

?>