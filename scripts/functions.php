<?php
if(!defined('RESTRICTED')){
    if(session_status() != PHP_SESSION_NONE){
        $emailSession = $_SESSION['email'];
        header("location: dashboard");
        exit('No direct script access allowed! Path: '.dirname(__FILE__));
    }
}

/*
    ██   ██ ███████  █████  ██████  ███████ ██████  ███████ 
    ██   ██ ██      ██   ██ ██   ██ ██      ██   ██ ██      
    ███████ █████   ███████ ██   ██ █████   ██████  ███████ 
    ██   ██ ██      ██   ██ ██   ██ ██      ██   ██      ██ 
    ██   ██ ███████ ██   ██ ██████  ███████ ██   ██ ███████ 
*/

$path = $_SERVER['DOCUMENT_ROOT'];

header('Content-Type: text/html; charset=utf-8');

$datetime = new DateTime();
$timezone = new DateTimeZone('America/New_York');
$datetime->setTimezone($timezone);

error_reporting(E_ERROR | E_PARSE | E_ALL);

require_once ($path.'/config/variables.php');
require_once ($path.'/config/db.php');

if(connectDB() === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

mysqli_set_charset(connectDB(),"utf8");

?>